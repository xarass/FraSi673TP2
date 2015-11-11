<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Flash', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function beforeFilter() {
        parent::beforeFilter();
        // Permet aux utilisateurs de s'enregistrer et de se déconnecter
        $this->Auth->allow('logout', 'login', 'register', 'activate');
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                //if ($this->User->Find() == 1) {
                    return $this->redirect(array('controller' => 'shipments', 'action' => 'index'));
                //} else {
                //    $this->Flash->error(__("User is not activated"));
                //}
            } else {
                $this->Flash->error(__("Invalid username or password"));
            }
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            if ($this->data['User']['password'] == $this->data['User']['password_confirm']) {
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $d = $this->request->data;
                    $this->send_mail($d['User']['email'], $d['User']['username'], $this->User->getInsertID(), $d['User']['password']);
                    $this->Session->setFlash(__('The user has been saved'), 'flash/success');
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
                }
            } else {
                $this->Session->setFlash(__('The password do not match. Please, try again.'), 'flash/error');
            }
        }
    }

    public function register() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($this->data['User']['password'] == $this->data['User']['password_confirm']) {
                $this->request->data['User']['role'] = 'super-user';
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $d = $this->request->data;
                    $this->send_mail($d['User']['email'], $d['User']['username'], $this->User->getInsertID(), $d['User']['password']);
                    $this->Session->setFlash(__('The user has been saved'), 'flash/success');
                    $this->redirect(array('action' => 'login'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
                }
            } else {
                $this->Session->setFlash(__('The password do not match. Please, try again.'), 'flash/error');
            }
        }
    }

    public function activate($link) {
        $linkA = explode('-', $link);
        $user = $this->User->find('first', array('conditions' => array('id' => $linkA[0], 'active' => 0)));
        if (!empty($user)) {
            $this->User->id = $user['User']['id'];
            $this->User->saveField('active', 1);
            $this->Session->setFlash('Account Active');
            $this->redirect(array('action' => 'login'));
        } else {
            $this->Session->setFlash('Error, user do not exist');
            $this->redirect('/');
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    public function isAuthorized($user) {
        // The owner of a post can edit and delete it
        if (in_array($this->action, array('view'))) {
            $viewId = (int) $this->request->params['pass'][0];
            if ($this->Session->read('Auth.User.id') == $viewId) {
                return true;
            }
        }


        return parent::isAuthorized($user);
    }

    public function send_mail($recipient = null, $username = null, $id = null, $password = null) {
        $link = array('controller' => 'users', 'action' => 'activate', $id . '-' . $password);
        App::uses('CakeEmail', 'Network/Email');
        $mail = new CakeEmail('gmail');
        $mail->from('noreply@localhost.com')->to($recipient)->subject('Mail Confirm');
        $mail->emailFormat('html')->template('activate')->viewVars(array('username' => $username, 'link' => $link));
        $mail->send();
    }

}

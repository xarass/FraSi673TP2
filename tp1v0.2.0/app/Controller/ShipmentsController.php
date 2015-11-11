<?php

App::uses('AppController', 'Controller');

/**
 * Shipments Controller
 *
 * @property Shipment $Shipment
 * @property PaginatorComponent $Paginator
 */
class ShipmentsController extends AppController {

    public $helpers = array('Js');
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
        $this->Shipment->recursive = 1;
        $this->set('shipments', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Shipment->exists($id)) {
            throw new NotFoundException(__('Invalid shipment'));
        }
        $options = array('conditions' => array('Shipment.' . $this->Shipment->primaryKey => $id));
        $this->set('shipment', $this->Shipment->find('first', $options));
        $shipment = $this->Shipment->find('first', $options);
        $this->set('shipment', $shipment);
        $this->set('category',$this->Shipment->Subcategory->Category->find('first', array('conditions' => array('id' => $shipment['Subcategory']['category_id']))));
    }

        
    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Shipment->create();
            $this->request->data['Shipment']['user_id'] = $this->Auth->user('id');
            if ($this->Shipment->save($this->request->data)) {
                $this->Session->setFlash(__('The shipment has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The shipment could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $harbors = $this->Shipment->Harbor->find('list');
        $products = $this->Shipment->Product->find('list');
                
        $categories = $this->Shipment->Subcategory->Category->find('list');
        $subcategories = $this->Shipment->Subcategory->find('list', array('conditions' => array('category_id' => 1)));
        $this->set(compact('harbors', 'products', 'categories', 'subcategories'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Shipment->id = $id;
        if (!$this->Shipment->exists($id)) {
            throw new NotFoundException(__('Invalid shipment'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Shipment->save($this->request->data)) {
                $this->Session->setFlash(__('The shipment has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The shipment could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Shipment.' . $this->Shipment->primaryKey => $id));
            $this->request->data = $this->Shipment->find('first', $options);
        }
        $harbors = $this->Shipment->Harbor->find('list');
        $products = $this->Shipment->Product->find('list');
        
        $categories = $this->Shipment->Subcategory->Category->find('list');
        $this->request->data['Shipment']['category_id'] = $this->request->data['Subcategory']['category_id'];
        if (isset($this->request->data['Subcategory']['category_id'])) {
            $subcategories = $this->Shipment->Subcategory->find('list', array('conditions' => array('category_id' => $this->request->data['Subcategory']['category_id'])));
        } else {
            $subcategories = $this->Shipment->Subcategory->find('list', array('conditions' => array('category_id' => 1)));
        }
        $this->set(compact('harbors', 'products', 'categories', 'subcategories'));
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
        $this->Shipment->id = $id;
        if (!$this->Shipment->exists()) {
            throw new NotFoundException(__('Invalid shipment'));
        }
        if ($this->Shipment->delete()) {
            $this->Session->setFlash(__('Shipment deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Shipment was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    public function isAuthorized($user) {
        // All registered users can add posts
        if (isset($user['role']) && $user['role'] === 'super-user') {
            
            if ($this->action === 'add') {
                return true;
            }

            // The owner of a post can edit and delete it
            if (in_array($this->action, array('edit'))) {
                $postId = (int) $this->request->params['pass'][0];
                if ($this->Shipment->isOwnedBy($postId, $user['id'])) {
                    return true;
                }
            }
        }

        return parent::isAuthorized($user);
    }
    
    public function beforeFilter() {
        $this->Auth->allow('index', 'view');
    }

}

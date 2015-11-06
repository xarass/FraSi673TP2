<?php
App::uses('AppController', 'Controller');
/**
 * Messages Controller
 *
 * @property Message $Message
 * @property PaginatorComponent $Paginator
 */
class MessagesController extends AppController {

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
		$this->Message->recursive = 1;
		$this->set('messages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Message->exists($id)) {
			throw new NotFoundException(__('Invalid message'));
		}
		$options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
		$this->set('message', $this->Message->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Message->create();
                        $this->request->data['Shipment']['user_id'] = $this->Auth->user('id');
			if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash(__('The message has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The message could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$shipments = $this->Message->Shipment->find('list');
		$this->set(compact('shipments'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Message->id = $id;
		if (!$this->Message->exists($id)) {
			throw new NotFoundException(__('Invalid message'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash(__('The message has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The message could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
			$this->request->data = $this->Message->find('first', $options);
		}
		$shipments = $this->Message->Shipment->find('list');
		$this->set(compact('shipments'));
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
		$this->Message->id = $id;
		if (!$this->Message->exists()) {
			throw new NotFoundException(__('Invalid message'));
		}
		if ($this->Message->delete()) {
			$this->Session->setFlash(__('Message deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Message was not deleted'), 'flash/error');
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
                if ($this->Message->isOwnedBy($postId, $user['id'])) {
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

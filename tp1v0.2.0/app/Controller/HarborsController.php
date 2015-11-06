<?php
App::uses('AppController', 'Controller');
/**
 * Harbors Controller
 *
 * @property Harbor $Harbor
 * @property PaginatorComponent $Paginator
 */
class HarborsController extends AppController {

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
		$this->Harbor->recursive = 1;
		$this->set('harbors', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Harbor->exists($id)) {
			throw new NotFoundException(__('Invalid harbor'));
		}
		$options = array('conditions' => array('Harbor.' . $this->Harbor->primaryKey => $id));
		$this->set('harbor', $this->Harbor->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Harbor->create();
                        $this->request->data['Shipment']['user_id'] = $this->Auth->user('id');
			if ($this->Harbor->save($this->request->data)) {
				$this->Session->setFlash(__('The harbor has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The harbor could not be saved. Please, try again.'), 'flash/error');
			}
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
        $this->Harbor->id = $id;
		if (!$this->Harbor->exists($id)) {
			throw new NotFoundException(__('Invalid harbor'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Harbor->save($this->request->data)) {
				$this->Session->setFlash(__('The harbor has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The harbor could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Harbor.' . $this->Harbor->primaryKey => $id));
			$this->request->data = $this->Harbor->find('first', $options);
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
		$this->Harbor->id = $id;
		if (!$this->Harbor->exists()) {
			throw new NotFoundException(__('Invalid harbor'));
		}
		if ($this->Harbor->delete()) {
			$this->Session->setFlash(__('Harbor deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Harbor was not deleted'), 'flash/error');
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
                if ($this->Harbor->isOwnedBy($postId, $user['id'])) {
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

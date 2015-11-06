<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 */
class ProductsController extends AppController {

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
		$this->Product->recursive = 1;
		$this->set('products', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$this->set('product', $this->Product->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Product->create();
                        $this->request->data['Shipment']['user_id'] = $this->Auth->user('id');
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$shipments = $this->Product->Shipment->find('list');
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
        $this->Product->id = $id;
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
		}
		$shipments = $this->Product->Shipment->find('list');
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
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('Product deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Product was not deleted'), 'flash/error');
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
                if ($this->Product->isOwnedBy($postId, $user['id'])) {
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

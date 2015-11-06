<?php
App::uses('AppController', 'Controller');
/**
 * ShipmentsProducts Controller
 *
 * @property ShipmentsProduct $ShipmentsProduct
 * @property PaginatorComponent $Paginator
 */
class ShipmentsProductsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ShipmentsProduct->recursive = 0;
		$this->set('shipmentsProducts', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ShipmentsProduct->exists($id)) {
			throw new NotFoundException(__('Invalid shipments product'));
		}
		$options = array('conditions' => array('ShipmentsProduct.' . $this->ShipmentsProduct->primaryKey => $id));
		$this->set('shipmentsProduct', $this->ShipmentsProduct->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ShipmentsProduct->create();
			if ($this->ShipmentsProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The shipments product has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shipments product could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$shipments = $this->ShipmentsProduct->Shipment->find('list');
		$products = $this->ShipmentsProduct->Product->find('list');
		$this->set(compact('shipments', 'products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->ShipmentsProduct->id = $id;
		if (!$this->ShipmentsProduct->exists($id)) {
			throw new NotFoundException(__('Invalid shipments product'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ShipmentsProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The shipments product has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shipments product could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('ShipmentsProduct.' . $this->ShipmentsProduct->primaryKey => $id));
			$this->request->data = $this->ShipmentsProduct->find('first', $options);
		}
		$shipments = $this->ShipmentsProduct->Shipment->find('list');
		$products = $this->ShipmentsProduct->Product->find('list');
		$this->set(compact('shipments', 'products'));
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
		$this->ShipmentsProduct->id = $id;
		if (!$this->ShipmentsProduct->exists()) {
			throw new NotFoundException(__('Invalid shipments product'));
		}
		if ($this->ShipmentsProduct->delete()) {
			$this->Session->setFlash(__('Shipments product deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Shipments product was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}

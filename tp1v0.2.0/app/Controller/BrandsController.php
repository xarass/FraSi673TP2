<?php
  class BrandsController extends AppController {

    public $layout = 'default';

    public $components = array('RequestHandler');

    public function index() {
      if ($this->request->is('ajax')) {
        $term = $this->request->query('term');
        $brandNames = $this->Brand->getBrandNames($term);
        $this->set(compact('brandNames'));
        $this->set('_serialize', 'brandNames');
      }
    }
  }
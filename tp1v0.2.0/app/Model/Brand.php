<?php
  class Brand extends AppModel {

    public function getBrandNames ($term = null) {
      if(!empty($term)) {
        $brands = $this->find('list', array(
          'conditions' => array(
            'name LIKE' => trim($term) . '%'
          )
        ));
        return $brands;
      }
      return false;
    }
  }
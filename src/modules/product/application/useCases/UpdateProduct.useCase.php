<?php
require_once plugin_dir_path(__FILE__) . '../../infra/repositories/index.php';

class UpdateProductsUseCase {
  function __construct() {
    $this->repository = new ProductRepository();
  }

  function execute($request) {
    $schema = $this->repository->getSchema();

    $updateData = array();
    foreach ($schema as $value) {
      if(!$request[$value]) continue;

      $updateData[$value] = $request[$value];
    }
  
    return $this->repository->update($request['id'], $updateData);
  }
}
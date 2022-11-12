<?php
  require_once plugin_dir_path(__FILE__) . '../../infra/repositories/index.php';

  class ShowProductsUseCase {
    function __construct() {
      $this->repository = new ProductRepository();
    }

    function execute($id) {
      return $this->repository->show($id);
    }
  }
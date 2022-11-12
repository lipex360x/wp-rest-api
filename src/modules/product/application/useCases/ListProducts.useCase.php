<?php
  require_once plugin_dir_path(__FILE__) . '../../infra/repositories/index.php';

  class ListProductsUseCase {
    function __construct() {
      $this->repository = new ProductRepository();
    }

    function execute() {    
      return ['products' => $this->repository->list()];
    }
  }
<?php 
require_once plugin_dir_path(__FILE__) . '../../../../core/helpers/index.php';
require_once plugin_dir_path(__FILE__) . '../useCases/index.php';

class CreateProductController {
  function __construct() {
    $this->route = '/plugin';
    $this->auth = new Authenticate();
    $this->useCase = new CreateProductUseCase();

    add_action('rest_api_init', array($this, 'registerRoute'));
  }

  function execute($request) {
    // return $this->auth->getHeaders();

    if(!$this->auth->checkUser()) {
      return new WP_Error('permission', 'user not allowed', array('status' => 401));
    }
    
    $data['created_by'] = sanitize_text_field($request['created_by']);
    $data['name'] = sanitize_text_field($request['name']);
    $data['description'] = sanitize_text_field($request['description']);

    $useCaseResponse = $this->useCase->execute($data);
    return rest_ensure_response($useCaseResponse);
  }

  // Route
  function registerRoute() {
    $rest_params = array(
      'methods'   => WP_REST_Server::CREATABLE,
      'callback'  => array($this, 'execute'),
    );
    register_rest_route('api', $this->route, array($rest_params));
  }
}

$registerController = new CreateProductController();

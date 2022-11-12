<?php
require_once plugin_dir_path(__FILE__) . '../entities/index.php';

class ProductRepository {
  function __construct() {
    $this->entity = new Product();
    $this->tableName = $this->entity->tableName();
  }
  
  function create($data) {
    // $wpdb->show_errors();
    global $wpdb;

    $data['id'] = wp_generate_uuid4();
    $wpdb->insert($this->tableName, $data);

    $query = "SELECT * FROM {$this->tableName} ORDER BY created_at DESC";
    return $wpdb->get_row($query);
  }

  function list() {
    global $wpdb;

    return $wpdb->get_results("SELECT * FROM {$this->tableName}");
  }

  function show($id) {
    global $wpdb;

    $query = "SELECT * FROM {$this->tableName} WHERE id = '{$id}'";
    
    return $wpdb->get_row($query);
  }

  function delete($id) {
    global $wpdb;

    $query = "SELECT * FROM {$this->tableName} WHERE id = '{$id}'";
    $deletedRow = $wpdb->get_row($query);

    $wpdb->delete($this->tableName, array('id' => $id));

    return $deletedRow;
  }

  function update($id, $updateData) {
    global $wpdb;

    $wpdb->update($this->tableName, $updateData, array( 'id' => $id ));
    return $this->show($id);
  }

  function getSchema() {
    global $wpdb;

    $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '{$this->tableName}'";
    $data = $wpdb->get_results($query);
    
    $schema = array();
    foreach ($data as $key => $value) {
      if (
        $value->COLUMN_NAME === 'id' || 
        $value->COLUMN_NAME === 'created_by' ||
        $value->COLUMN_NAME === 'created_at' ||
        $value->COLUMN_NAME === 'updated_at' ||
        $value->COLUMN_NAME === 'deleted_at'
      ) continue;

      array_push($schema, $value->COLUMN_NAME);
    }

    return $schema;
  }
}
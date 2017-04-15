<?php   
  $this->output->set_header('Access-Control-Allow-Origin: *');
  $this->output->set_header('Content-Type: application/json; charset=utf-8');
  echo json_encode($detail);
?>
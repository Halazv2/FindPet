<?php
  class Controller {
    public function model($model){
      require_once '../app/models/' . $model . '.php';
      return new $model();
    }

    public function json($data)
    {
      header("content-type:application/json");
      echo json_encode($data);
    }
  }
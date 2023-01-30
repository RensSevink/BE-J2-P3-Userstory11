<?php

// De parent controllerclass laad de model en de view
class Controller
{
  public function model($model)
  {
    require_once '../app/models/' . $model . ".php";

    return new $model();
  }

  public function View($view, $data = [])
  {

    if (file_exists('../app/views/' . $view . ".php")) {
      require_once('../app/views/' . $view . ".php");
    } else {
      die('Views bestaat niet');
    }
  }
}
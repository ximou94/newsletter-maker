<?php

/**
 *
 */

class IndexController extends Atomik\Controller\Controller {
  public $newsletters;

  public function index(){
        $json= file_get_contents(Atomik::get('base_dir').'/app/models/magazines.json');
        $this->newsletters = json_decode($json,true);
  }

}

<?php
namespace Issues;
use BlocsController;
use Atomik;
/**
 *
 */
class OrthophileController extends IssuesController{

  private $_sections = array();

  public function index(){
    $this->setIssue('orthophile');
    parent::index();
  }


  public function produits($url){
    if ($this->count === 0) {
      BlocsController::section('produits');
    }
    BlocsController::article($url,'blocs/article');
     $this->count++;
  }
}

 ?>

<?php
namespace Issues;
use BlocsController;
use Atomik;
/**
 *
 */
class DentaireController extends IssuesController{

  private $_sections = array();

  public function index(){
    $this->setIssue('dentaire');
    parent::index();
  }

  public function Cabinet_du_mois($url){
    if ($this->count === 0) {
      BlocsController::section('Cabinet du mois');
    }
    BlocsController::article($url,'blocs/article');
     $this->count++;
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

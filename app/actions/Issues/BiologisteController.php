<?php
namespace Issues;
use BlocsController;
use Atomik;
/**
 *
 */
class BiologisteController extends IssuesController{


  public function index(){
    $this->setIssue('biologiste');
    parent::index();
  }
  
  public function clinique($url){
    if ($this->count === 0) {
      BlocsController::section('clinique');
    }
    BlocsController::article($url,'blocs/article');
     $this->count++;
  }
  
  public function produits($url){
    if ($this->count === 0) {
      BlocsController::section('informations produits');
    }
    BlocsController::article($url,'blocs/article');
     $this->count++;
  }

  public function publireportages($url){
    if ($this->count === 0) {
      BlocsController::section('publireportages');
    }
    BlocsController::article($url,'blocs/article');
     $this->count++;
  }

  public function video($url){
    if ($this->count === 0) {
      BlocsController::section('vidéo');
    }
    BlocsController::article($url,'blocs/article');
     $this->count++;
  }

}

 ?>

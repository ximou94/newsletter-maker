<?php
namespace Issues;
use BlocsController;
use Atomik;
/**
 *
 */
class NutritionController extends IssuesController{


  public function index(){
    $this->setIssue('nutrition');
    parent::index();
  }

  public function breves($url){
    if ($this->count === 0) {
      BlocsController::section('brèves');
    }
    BlocsController::article($url,'blocs/breve');
     $this->count++;
  }

  public function produits($url){
    if ($this->count === 0) {
      BlocsController::section('produits');
    }
    BlocsController::article($url,'blocs/article');
     $this->count++;
  }

  public function recettes($url){
    if ($this->count === 0) {
      BlocsController::section('recettes');
    }
    BlocsController::recettes($url,'blocs/recette');
     $this->count++;
  }
}

 ?>

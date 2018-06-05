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

  public function actualites($url){
    if ($this->count === 0) {
      BlocsController::section('actualités');
    }
    BlocsController::article($url,'blocs/dentaire/article',$this->subtitle);
    $this->count++;
  }
  
  public function Cabinet_du_mois($url){
    if ($this->count === 0) {
      BlocsController::section('Cabinet du mois');
    }
    BlocsController::article($url,'blocs/dentaire/article');
    $this->count++;
  }

  public function produits($url){
    if ($this->count === 0) {
      BlocsController::section('produits');
    }
    BlocsController::article($url,'blocs/dentaire/article');
    $this->count++;
  }
  public function focus($url){
    if ($this->count === 0) {
      BlocsController::section('focus');
    }
    BlocsController::article($url,'blocs/breve');
    $this->count++;
  }

}

?>

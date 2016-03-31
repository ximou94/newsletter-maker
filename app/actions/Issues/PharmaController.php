<?php
namespace Issues;
use BlocsController;
use Atomik;
/**
 *
 */
class PharmaController extends IssuesController{

  private $_sections = array();

  public function index(){
    $this->setIssue('pharma');
    parent::index();
    $this->pharma();
  }

  public function equipement($url){
    if ($this->count === 0) {
      BlocsController::section('équipement');
    }
    BlocsController::article($url,'blocs/article');
     $this->count++;
  }

  public function orthopedie($url)  {
    if ($this->count === 0) {
      BlocsController::section('orthopédie');
    }
    BlocsController::article($url,'blocs/article');
     $this->count++;
  }

  public function pharma(){
    BlocsController::section('Et à lire aussi dans votre magazine Profession Pharmacien de janvier');
  $this->viewOutput = Atomik::render('blocs/pharma');
    echo $this->viewOutput;
  }
}

 ?>

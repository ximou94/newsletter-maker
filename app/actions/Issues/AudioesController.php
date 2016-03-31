<?php
namespace Issues;
use BlocsController;
use Atomik;
/**
 *
 */
class AudioesController extends IssuesController{

  public function index(){
    Atomik\Translations::set('es');
    $this->setIssue('audioenportada');
    parent::index();
  }

public function actualites($url){
    if ($this->count === 0) {
      BlocsController::section('actualités');
    }
    BlocsController::article($url,'blocs/article',$this->subtitle = true);
    $this->count++;
  }}

 ?>

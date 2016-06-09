<?php
namespace Issues;
use BlocsController;
use Atomik;
/**
 *
 */
class AudiobrController extends IssuesController{

  public function index(){
    Atomik\Translations::set('br');
    $this->setLocale('pt-BR');
    $this->setIssue('audiologyBR');
    parent::index();
  }

  public function focus($url){
    if ($this->count === 0) {
      BlocsController::section('focus');
    }
    BlocsController::article($url,'blocs/article');
     $this->count++;
  }

}

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

}

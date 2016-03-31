<?php
namespace Issues;
use BlocsController;
use Atomik;
/**
 *
 */
class AudioitController extends IssuesController{



  public function index(){
    Atomik\Translations::set('it');
    $this->setLocale('it-IT');
    $this->setIssue('audiologyIT');
    parent::index();
  }

}

 ?>

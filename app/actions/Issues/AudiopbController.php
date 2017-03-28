<?php
namespace Issues;
use BlocsController;
use Atomik;
/**
 *
 */
class AudiopbController extends IssuesController{



  public function index(){
    Atomik\Translations::set('pb');
    $this->setLocale('nl-nl');
    $this->setIssue('audiologyPB');
    parent::index();
  }

}

 ?>

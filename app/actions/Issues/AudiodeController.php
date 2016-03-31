<?php
namespace Issues;
use BlocsController;
use Atomik;
/**
 *
 */
class AudiodeController extends IssuesController{

  public function index(){
    Atomik\Translations::set('de');
    $this->setLocale('de-DE');
    $this->setIssue('audiologyDE');
    parent::index();
  }

}

 ?>

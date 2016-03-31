<?php
namespace Issues;
use BlocsController;
use Atomik;
/**
 *
 */
class AuditionController extends IssuesController{

  private $_sections = array();

  public function index(){
    $this->setIssue('audition');
    parent::index();
  }

}

 ?>

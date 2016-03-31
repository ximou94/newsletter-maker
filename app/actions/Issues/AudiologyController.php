<?php
namespace Issues;
use BlocsController;
use Atomik;
/**
 *
 */
class AudiologyController extends IssuesController{

  private $_sections = array();

  public function index(){
    Atomik::set('backgroundColor', '#FFEBEE');
    $this->setIssue('audiology');
    parent::index();
  }

}

 ?>

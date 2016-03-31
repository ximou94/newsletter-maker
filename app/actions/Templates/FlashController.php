<?php
namespace Templates;
use Atomik;
/**
 *
 */
class FlashController extends DefaultController{

  private $_issue;

  public function __construct(){

  }

  public function index(){
    $issue = Atomik::get('request.issue');
  //  $issue = substr($issue,0,strpos($issue,'-'));
    return array('issue'=>$issue);
  }
}

 ?>

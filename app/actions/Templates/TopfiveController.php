<?php
namespace Templates;
use Atomik;
/**
 *
 */
class TopfiveController extends DefaultController{

  public function index(){
    $issue = Atomik::get('request.issue');
  //  $issue = substr($issue,0,strpos($issue,'-'));
    return array('issue'=>$issue);
  }
}


?>

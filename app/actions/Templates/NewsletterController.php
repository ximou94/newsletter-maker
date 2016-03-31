<?php
namespace Templates;
use Atomik;
/**
 *
 */
class NewsletterController extends DefaultController{


  protected $_sections = array();
  private $_issue;

  public function __construct(){
  //TODO instancier Issue ( new \Issues\IsssueController)
  }
  /**
   * Recupere Les sections en fonction du magazine en BDD
   * @return array Un tableau contenant le magazine et ses sections( audio => une, actus, annonces, agenda)
   *
   */
  public function index(){

  $sections = $this->setSections();
  $issue = Atomik::get('request.issue');
  $template = Atomik::get('request.template');
  return array('issue'=>$issue,
               'sections'=>$sections,
               'template'=> $template);
  }

  public function setSections(){
    $json= file_get_contents(Atomik::get('base_dir').'/app/models/magazines.json');
    $sections = json_decode($json);
    return $sections->{Atomik::get('request.issue')}->{'sections'}->{'newsletter'};
  }

}
?>

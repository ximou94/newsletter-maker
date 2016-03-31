<?php
namespace Templates;
use Atomik;
/**
 *
 */
class RhController extends DefaultController{

  protected $_sections = array();
  public $_issue;
  public $_magazines;

  public function __construct(){
      $this->_json = file_get_contents(Atomik::get('base_dir').'/app/models/magazines.json');
      $this->_magazines = json_decode($this->_json);
    }

  public function index(){
    $this->_issue = Atomik::get('request.issue');
    $sections = $this->setSections();
    $companies = $this->getEnseigneLogo();
    return array(
      'issue'     => $this->_issue,
      'sections'  => $sections,
      'companies' => $companies);
  }

  public function setSections(){
    $json= file_get_contents(Atomik::get('base_dir').'/app/models/magazines.json');
    $sections = json_decode($json);
    return $sections->{Atomik::get('request.issue')}->{'sections'}->{'rh'};
  }

  public function getEnseigneLogo(){
    return $name = $this->_magazines->{$this->_issue}->{'companies'};
  }
}

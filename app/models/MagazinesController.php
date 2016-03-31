<?php
namespace models;
/**
 *
 */
class MagazinesController extends Atomik\Controller\Controller{

  private $_json;
  public $_magazines;

  public function __construct(){
    $this->_json = file_get_contents(Atomik::get('base_dir').'/app/models/magazines.json');
    $this->$_magazines = json_decode($this->_json);
  }

  public function getName($issue){
    return $name = $this->$_magazines->{$issue}->{'name'};
  }

  public function getColor($issue){
    return $name = $this->$_magazines->{$issue}->{'color'};
  }

  public function getBaseUrl($issue){
    return $name = $this->$_magazines->{$issue}->{'url_base'};
  }

  public function getLogo($issue){
    return $name = $this->$_magazines->{$issue}->{'logo'};
  }

}

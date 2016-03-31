<?php
namespace Issues;
use BlocsController;
use Atomik;
/**
 *
 */
class AudiologywnController extends IssuesController{

  public function index(){
    Atomik\Translations::set('en');
    $this->setLocale('en-GB');
    $this->setIssue('audiologyWN');
    parent::index();
  }

  public function actualites($url){
    if ($this->count === 0) {
      BlocsController::section('actualités');
    }
    BlocsController::article($url,'blocs/article',$this->subtitle = true);
    $this->count++;
  }

  public function agenda($url){
    if ($this->count === 0) {
      BlocsController::section('agenda');
    }
    BlocsController::calendarWN($url,'blocs/calendar');
    $this->count++;
  }
}

 ?>

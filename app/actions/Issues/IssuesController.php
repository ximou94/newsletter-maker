<?php
namespace Issues;
use BlocsController;
use Atomik;
/**
 *
*/
class IssuesController extends Atomik\Controller\Controller{


//  protected $_name;
//  protected $_color;
  public $_issue;
  public $model;
  protected $_count = 0;
  protected $_blocs;
  private $_json;
  public $_magazines;
  protected $_subtitle = false;
  protected $_locale;

  public function __construct(){
    $this->_json = file_get_contents(Atomik::get('base_dir').'/app/models/magazines.json');
    $this->_magazines = json_decode($this->_json);
    Atomik::set('backgroundColor','#e1f5fe');
  }

  /**
   * Parcours le tableau multidimensionel post qui contient les differentes
   * section envoyés.
   * Créer une fonction à chaque clé du 1er niveau du tableau en prenant en
   * paramètre l'url du 2eme niveau du tableau.
   * exemple = $this->une('http://www.edp-audio.fr/actualites/entreprises/4780-audition-conseil-renove-son-site-internet')
   */
 public function index(){
    Atomik::set('issue', $this->_issue);
   switch (Atomik::get('request.template')) {
     case 'flash':
       if(!empty($_POST['url'])){
         $this->une($_POST['url']);
       }
       break;
     case 'topfive':
     if(!empty($this->getLeaderBanner(Atomik::get('request.template')))){
       BlocsController::leaderBanner('blocs/leaderBanner',Atomik::get('request.template'),$this->getLeaderBannerLink(Atomik::get('request.template')));
     }
       BlocsController::header('blocs/header');
       foreach ($_POST as $key => $value) {
         if(!empty($value)){
           $this->actualites($value);
         }
       }
       break;
       case 'rh':
        foreach ($_POST as $key => $value) {
          $oneCompany = array_chunk($value ,2);
           foreach ($oneCompany as $num => $data) {
             if(!empty($data)){
               $url = $data[0];
               $img = $data[1];
             }
            $this->$key($url,$img);
           }
           $this->count = 0;
         }
       Atomik::set('backgroundColor', '#E9E9E9');
       break;
     case 'newsletter':
       foreach ($_POST as $key => $value) {
         foreach ($value as $num => $url) {
           if(!empty($url)){
             $this->$key($url);
           }
         }
         $this->count = 0;
       }
       break;

   }
  Atomik::set('app.layout', '_newsletterLayout');
}

  public function une($url){
    if(!empty($this->getLeaderBanner(Atomik::get('request.template')))){
      BlocsController::leaderBanner('blocs/leaderBanner',Atomik::get('request.template'),$this->getLeaderBannerLink(Atomik::get('request.template')));
    }
    BlocsController::header('blocs/header',Atomik::get('request.template'),$this->_issue,$this->_locale);
    BlocsController::article($url,'blocs/leadArticle',$this->subtitle);
    if(!empty($this->getBanner2(Atomik::get('request.template')))){
      BlocsController::Banner('blocs/Banner',Atomik::get('request.template'),$this->getBanner2Link(Atomik::get('request.template')));
    }
  }

  public function actualites($url){
    if ($this->count === 0) {
      BlocsController::section('actualités');
    }
    BlocsController::article($url,'blocs/article',$this->subtitle);
    $this->count++;
  }

  public function agenda($url){
    if ($this->count === 0) {
      if(!empty($this->getSquareBanner1(Atomik::get('request.template')))){
        BlocsController::squareBanners('blocs/squareBanners',Atomik::get('request.template'));
      }
      BlocsController::section('agenda');
    }
    BlocsController::calendar($url,'blocs/calendar2');
    $this->count++;
  }

//GETTERS & SETTERS

  public function setName($name){
    $this->_name = $name;
  }

  public function setColor($color){
    $this->_color = $color;
  }

  public function setIssue($issue){
    $this->_issue = $issue;
  }

  public function setLocale($locale){
    $this->_locale = $locale;
  }

  public function getName(){
    return $name = $this->_magazines->{$this->_issue}->{'name'};
  }

  public function getColor(){
    return $name = $this->_magazines->{$this->_issue}->{'color'};
  }

  public function getBaseUrl(){
    return $name = $this->_magazines->{$this->_issue}->{'url_base'};
  }

  public function getLogo($template){

    if(isset($this->_magazines->{$this->_issue}->{'banners'}->{$template}->{'logo'})){
      return $this->_magazines->{$this->_issue}->{'banners'}->{$template}->{'logo'};
    }else{
      return $name = $this->_magazines->{$this->_issue}->{'logo'};
    }
  }

  public function getParagraph(){
    return $name = $this->_magazines->{$this->_issue}->{'paragraph'};
  }

  public function getLeaderBanner($template){
    return $name = $this->_magazines->{$this->_issue}->{'banners'}->{$template}->{'leaderBanner'};
  }

  public function getLeaderBannerLink($template){
    return $name = $this->_magazines->{$this->_issue}->{'banners'}->{$template}->{'leaderBannerLink'};
  }

  public function getBanner2($template){
    return $name = $this->_magazines->{$this->_issue}->{'banners'}->{$template}->{'banner2'};
  }

  public function getBanner2Link($template){
    return $name = $this->_magazines->{$this->_issue}->{'banners'}->{$template}->{'banner2Link'};
  }

  public function getSquareBanner1($template){
    return $name = $this->_magazines->{$this->_issue}->{'banners'}->{$template}->{'squareBanner1'};
  }

  public function getSquareBanner1link($template){
    return $name = $this->_magazines->{$this->_issue}->{'banners'}->{$template}->{'squareBanner1link'};
  }

  public function getSquareBanner2($template){
    return $name = $this->_magazines->{$this->_issue}->{'banners'}->{$template}->{'squareBanner2'};
  }

  public function getSquareBanner2link($template){
    return $name = $this->_magazines->{$this->_issue}->{'banners'}->{$template}->{'squareBanner2link'};
  }

  public function getSquareBanner3($template){
    return $name = $this->_magazines->{$this->_issue}->{'banners'}->{$template}->{'squareBanner3'};
  }

  public function getSquareBanner3link($template){
    return $name = $this->_magazines->{$this->_issue}->{'banners'}->{$template}->{'squareBanner3link'};
  }

  public function getSquareBanner4($template){
    return $name = $this->_magazines->{$this->_issue}->{'banners'}->{$template}->{'squareBanner4'};
  }

  public function getSquareBanner4link($template){
    return $name = $this->_magazines->{$this->_issue}->{'banners'}->{$template}->{'squareBanner4link'};
  }

  public function getSubscribeLink(){
    return $name = $this->_magazines->{$this->_issue}->{'subscribeLink'};
  }

}

 ?>

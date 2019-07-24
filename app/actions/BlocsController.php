<?php
/**
 *
 */

class BlocsController extends Atomik\Controller\Controller{

  public $title;
  public $text;
  public $img;
  public $url;
  public $date;
  public $link;
  public $viewOutput;
  public $name;
  public $view;
  public $logo;
  public $model;
  public $subtitle;
  public $leaderBanner;
  public $banner;
  public $banner1;
  public $place;

  public function __construct(){

  }
  //TODO factoriser les fonctions sur les bannières
  public function leaderBanner($view,$template,$url){
    $this->leaderBanner = $this->getLeaderBanner($template);
    $funtionName = __FUNCTION__;
    $this->viewOutput = Atomik::render($view,array(
      'banner' =>$this->leaderBanner,
      'link'   => $url,
      'section' => $funtionName
    ));
    echo $this->viewOutput;
  }

  public function Banner($view,$template,$url){
    $this->banner = $this->getBanner2($template);
    $funtionName = __FUNCTION__;
    $this->viewOutput = Atomik::render($view,array(
      'banner' => $this->banner,
      'link'   => $url,
      'section' => $funtionName
    ));
    echo $this->viewOutput;
  }

  public function newBanner($view,$template,$url,$nbBanner){
    $this->banner = $this->getBanner($template,$nbBanner);
    $funtionName = __FUNCTION__;
    $this->viewOutput = Atomik::render($view,array(
      'banner' => $this->banner,
      'link'   => $url,
      'section' => $funtionName
    ));
    echo $this->viewOutput;
  }

  public function squareBanners($view,$template){
    $this->banner1 = $this->getSquareBanner1($template);
    $banner1link = $this->getSquareBanner1link($template);
    $this->banner2 = $this->getSquareBanner2($template);
    $banner2link = $this->getSquareBanner2link($template);
    $this->banner3 = $this->getSquareBanner3($template);
    $banner3link = $this->getSquareBanner3link($template);
    $this->banner4 = $this->getSquareBanner4($template);
    $banner4link = $this->getSquareBanner4link($template);
    $funtionName = __FUNCTION__;
    $this->viewOutput = Atomik::render($view,array(
      'banner1' => $this->banner1,
      'banner1link' => $banner1link,
      'banner2' => $this->banner2,
      'banner2link' => $banner2link,
      'banner3' => $this->banner3,
      'banner3link' => $banner3link,
      'banner4' => $this->banner4,
      'banner4link' => $banner4link,
      'section' => $funtionName
    ));
    echo $this->viewOutput;
  }

  public function header($view,$template,$issue,$locale){
    $this->logo = $this->getLogo($template);
    $this->link = $this->getBaseUrl();
    $this->subscribeLink = $this->getSubscribeLink();
    $this->viewOutput = Atomik::render($view,array(
      'logo' => $this->logo,
      'template' => $template,
      'subscribeLink' => $this->subscribeLink,
      'issue' => $issue,
      'link' => $this->link,
      'locale' => $locale
    ));
    echo $this->viewOutput;
  }
/*
  public function header($view){
    $db       = Atomik::get('db');
    $this->logo     = $db->selectValue('issues','logo',array('name'=>$this->_issue));
    $this->viewOutput = Atomik::render($view,array(
      'logo' => $this->logo
    ));
    echo $this->viewOutput;
  }

*/

  public function article($url,$view,$subtitle=false){
    $data     = new DataController($url);
    $this->title    = $data->fetchTitle('h1',0);
    if($subtitle == true){
      $this->subtitle = strtoupper($data->fetchTitle('h3',0)).'.';
    }
    $this->text     = $data->fetchText($this->getParagraph());
    $color          = $this->getColor();
    $base_url       = $this->getBaseUrl();
    $this->img      = $data->fetchImg($base_url);
    $this->link     = $data->fetchLink();
    $funtionName = __FUNCTION__;
    $this->viewOutput = Atomik::render($view,array(
      'title'    => $this->title,
      'subtitle' => $this->subtitle,
      'text'     => $this->text,
      'img'      => $this->img,
      'link'     => $this->link,
      'section' => $funtionName,
      'count' => $this->count
    ));
    echo $this->viewOutput;

  }
/*
  public function article($url,$view){
    $data     = new DataController($url);
    $db       = Atomik::get('db');
    $this->title    = $data->fetchTitle('h1',0);
    $this->text     = $data->fetchText($db->selectValue('issues','p',array('name'=>$this->_issue)));
    $color    = $db->selectValue('issues','color',array('name'=>$this->_issue));
    $base_url = $db->selectValue('issues','url_base',array('name'=>$this->_issue));
    $this->img      = $data->fetchImg($base_url);
    $this->link     = $data->fetchLink();
    $this->viewOutput = Atomik::render($view,array(
      'title' => $this->title,
      'text'  => $this->text,
      'img'   => $this->img,
      'link'  => $this->link
    ));
    echo $this->viewOutput;
  }
*/
  public function calendar($url, $view){
    $data     = new DataController($url);
    $db       = Atomik::get('db');
    $this->title     = $data->fetchTitle('h2',1);
    $this->date      = $data->fetchDate();
    $this->link      = $data->fetchLink();
    $this->place     = $data->fetchPlace();
    $this->viewOutput = Atomik::render($view,array(
      'title' => $this->title,
      'date'  => $this->date,
      'link'  => $this->link,
      'count' => $this->count,
      'place' => $this->place
    ));
    echo $this->viewOutput;
  }

public function calendarWN($url, $view){
    $data     = new DataController($url);
    $db       = Atomik::get('db');
    $this->title     = $data->fetchTitle('a',19);
    $this->date      = $data->fetchDate();
    $this->link      = $data->fetchLink();
    $this->viewOutput = Atomik::render($view,array(
      'title' => $this->title,
      'date'  => $this->date,
      'link'  => $this->link,
      'count' => $this->count
    ));
    echo $this->viewOutput;
  }

  public function recettes($url, $view){
    $data     = new DataController($url);
    $this->title    = $data->fetchTitle('h1',0);
    $this->text     = $data->fetchText($this->getParagraph());
    $base_url       = $this->getBaseUrl();
    $this->img      = $data->fetchImg($base_url);
    $this->link     = $data->fetchLink();
    $this->viewOutput = Atomik::render($view,array(
      'title' => $this->title,
      'text'  => $this->text,
      'img'   => $this->img,
      'link'  => $this->link,
      'count' => $this->count
    ));
    echo $this->viewOutput;
  }

  public function section($name){
    $color            = $this->getColor();
    $this->viewOutput = Atomik::render('blocs/section',array(
      'name' => $name,
      'color'=> $color
    ));
    echo $this->viewOutput;
  }

  public function annonce($url,$img){
    $data     = new DataController($url);
    $db       = Atomik::get('db');
    $this->title    = $data->fetchTitle('h1',0);
    $this->text     = $data->fetchText(2);
    $this->link     = $data->fetchLink();
    $funtionName = __FUNCTION__;
    $this->viewOutput = Atomik::render('blocs/article',array(
      'title' => $this->title,
      'text' => $this->text,
      'link'=> $this->link,
      'img' => $img,
      'section' => $funtionName,
    ));
    echo $this->viewOutput;
  }

  public function annonceUne($url,$img){
    $data     = new DataController($url);
    $db       = Atomik::get('db');
    $this->title    = $data->fetchTitle('h1',0);
    $this->text     = $data->fetchText(2);
    $this->link     = $data->fetchLink();
    $funtionName = __FUNCTION__;
    $this->viewOutput = Atomik::render('blocs/leadArticle',array(
      'title' => $this->title,
      'text' => $this->text,
      'link'=> $this->link,
      'img' => $img,
      'section' => $funtionName,
    ));
    echo $this->viewOutput;
  }

  /*public function rhannonce($url,$img){
    $data     = new DataController($url);
    $db       = Atomik::get('db');
    $this->title    = $data->fetchTitle('h1',1);
    $this->text     = $data->fetchCalendarText();
    $this->link     = $data->fetchLink();
    $funtionName = __FUNCTION__;
    $this->viewOutput = Atomik::render('blocs/article',array(
      'title' => $this->title,
      'text' => $this->text,
      'link'=> $this->link,
      'img' => $img,
      'section' => $funtionName,
    ));
    echo $this->viewOutput;
  }*/

}

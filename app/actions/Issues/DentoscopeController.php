<?php
namespace Issues;

use BlocsController;
use Atomik;
use Test;
/**
 *
 */
class DentoscopeController extends IssuesController{

  private $_sections = array();
  protected $_nbBanner = 0;

  public function index(){
    $this->setIssue('dentoscope');
    $iteratorBanner = new Test($this->getAllBanner(Atomik::get('request.template')));

    for ($i=0; $i <6 ; $i++) {
       echo "<h1>".$iteratorBanner->current()."</h1>";
       parent::index();
       var_dump($iteratorBanner);
       if ($iteratorBanner->valid() !== TRUE AND $i !== 6) {
         $iteratorBanner->rewind();
        $this->setNbBanner($iteratorBanner->current()); 
       }
       $iteratorBanner->next();
       $this->setNbBanner($iteratorBanner->current());
    }
  }

  public function une($url)
  {
    if(!empty($this->getBanner(Atomik::get('request.template'),$this->_nbBanner))){
      BlocsController::newBanner('blocs/newBanner', Atomik::get('request.template'),$this->getBannerLink(Atomik::get('request.template'),$this->_nbBanner),$this->_nbBanner);
    }
    $this->_nbBanner++;
    BlocsController::header('blocs/header',Atomik::get('request.template'),$this->_issue,$this->_locale);
    BlocsController::article($url,'blocs/leadArticle',$this->subtitle);
   if(!empty($this->getBanner(Atomik::get('request.template'),$this->_nbBanner))){
      BlocsController::newBanner('blocs/newBanner',Atomik::get('request.template'),$this->getBannerLink(Atomik::get('request.template'),$this->_nbBanner),$this->_nbBanner);
    }
    $this->_nbBanner++;
  }

  public function actualites($url){
    if ($this->count === 0) {
      BlocsController::section('actualités');
    }
    BlocsController::article($url,'blocs/article',$this->subtitle);
    if(!empty($this->getBanner(Atomik::get('request.template'),$this->_nbBanner))){
      BlocsController::newBanner('blocs/newBanner',Atomik::get('request.template'),$this->getBannerLink(Atomik::get('request.template'),$this->_nbBanner),$this->_nbBanner);
    }
    $this->count++;
    $this->_nbBanner++;
  }

  public function produits($url){
    if ($this->count === 0) {
      BlocsController::section('produits');
    }
    BlocsController::article($url,'blocs/article');
    if(!empty($this->getBanner(Atomik::get('request.template'),$this->_nbBanner))){
      BlocsController::newBanner('blocs/newBanner',Atomik::get('request.template'),$this->getBannerLink(Atomik::get('request.template'),$this->_nbBanner),$this->_nbBanner);
    }
     $this->count++;
     $this->_nbBanner++;
   }
   public function setNbBanner($position)
   {
     $this->_nbBanner = $position;
   }
}

 ?>

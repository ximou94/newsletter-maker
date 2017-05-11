<?php

/**
 *
 */
class FormatDateHelper{

  private $_locale;
  private $_datetime;

  public function formatDate($locale = "fr-FR",$template = "", $issue= ""){
    $this->setLocale($locale);
    $datetime = new DateTime('now');
    return $this->formatCountry($template,$issue);
  }

  public function formatCountry($template,$issue){
    switch ($this->getLocale()) {
      case 'en-GB':
        return utf8_encode(strftime('%#d<sup>th</sup> %B, %Y'));
        break;
        case 'it-IT':
          return utf8_encode(strftime('%#d %B %Y'));
          break;
        case 'pt-BR':
          return utf8_encode(strftime('%A, %#d de %B de %Y'));
          break;
        case 'de-DE':
          $date = ' <em> Audio infos</em> '.ucfirst($template).' '.strftime('%#d. %B %Y');
          return $date;
										break;
								case 'French_France.1252':
          if ($template == 'rh') {
          $date = ' <em> Audio infos</em> Ressources Humaines N°';
										return $date;
										break;
          }
      default:
        $date = ucfirst($template).' <em>'.ucfirst($issue).' infos</em> du '.utf8_encode(strftime('%#d %B %Y'));
        return $date;
        break;
    }
  }

  public function setLocale($locale){
    $this->_locale = setlocale(LC_TIME, $locale);;
  }

  public function getLocale(){
    return $this->_locale;
  }
}
 ?>

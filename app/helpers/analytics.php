<?php

/**
 *
 */
class AnalyticsHelper{

  public function analytics($link,$section,$count=''){
      $accents = array('é','û');
      $noaccents = array('e','u');
      $today = str_replace($accents,$noaccents,$this->analyticsDate());
      $template = Atomik::get('request.template');
      $issue    = Atomik::get('issue');
      $link .= "/?utm_source=$template-$today&amp;utm_medium=$template&amp;utm_content=$section-$count&amp;utm_campaign=$issue";
    return $link;
  }

  public function analyticsDate(){
    $datetime = new DateTime('now');
    return str_replace(' ', '-',utf8_encode(strftime('%#d %B %Y')));
  }
}
 ?>

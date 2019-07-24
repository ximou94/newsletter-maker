<?php
/**
 *
 */
class DataController extends Atomik\Controller\Controller
{
  private $_url;
  private $_result;
  private $_xpath;

  public function __construct($url){
    $this->setUrl($url);
				$curl = curl_init($this->_url);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				$return = curl_exec($curl);
    curl_close($curl);
    $this->_result = new DOMDocument();
    @$this->_result->loadHTML($return);
    $this->_xpath = new DOMXPath($this->_result);
  }

		public function fetchText($number){
				$element = $this->_result->getElementsByTagName('p');
				if (Atomik::get('request.template')== 'rh') {
						return utf8_decode($this->get_inner_html($element->item($number)));echo 'ok';exit();
				} else {
						return $this->get_inner_html($element->item($number));
				}
		}

		public function fetchTitle($tagName,$itemNumber){
				if (Atomik::get('request.template') == 'rh') {
						return utf8_decode($this->_result->getElementsByTagName($tagName)->item($itemNumber)->nodeValue);
				}
				return $this->_result->getElementsByTagName($tagName)->item($itemNumber)->nodeValue;
		}

  public function fetchImg($base_url){
  //  TODO Factoriser
    if ($base_url == 'http://www.audition-infos.org/') {
      $elements = $this->_xpath->query('//div[@class="item-page"]/p/img/@src');
      foreach($elements as $element){
        if (strpos($element->nodeValue, 'http://') === 0){
          return $element->nodeValue;
        }else{
          return $base_url.$element->nodeValue;
        }
      }
    }
    $elements = $this->_xpath->query('//figure/img/@src');
    foreach($elements as $element){
      if (strpos($element->nodeValue, 'http://') === 0){
        return $element->nodeValue;
      }else{
        return $base_url.$element->nodeValue;
      }
    }
 }

  public function fetchLink(){
    return $this->_url;
  }

  public function fetchDate(){
    $elements = $this->_xpath->query('//td[contains(@class,"ev_detail repeat")]');
    foreach ($elements as $element) {
      return $element->nodeValue;
    }
  }
  public function fetchPlace()
  {
    $elements = $this->_xpath->query("//td[@class='ev_detail']");
    foreach ($elements as $element) {
      return $element->nodeValue;
    }
  }

  public function fetchCalendarText(){
    $elements = $this->_xpath->query('//div[contains(@class,"description-classified")]');
    foreach ($elements as $element) {
      return $element->nodeValue;
    }
  }

  public function get_inner_html($node){
    $innerHTML= '';
    $children = $node->childNodes;
    foreach ($children as $child){
      $innerHTML .= $child->ownerDocument->saveXML($child);
    }
    return $innerHTML;
  }

  public function setUrl($url){
    $this->_url = $url;
  }
}


 ?>

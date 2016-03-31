<?php
namespace Templates;
use Atomik;
/**
 * Gère les templates et redirige les utilisateurs vers le bon template
 * Pour chaque nouveau template rajouter la route correspondante dans le fichier de config
 * @author Maxime Grangier
 */
class DefaultController extends Atomik\Controller\Controller{

  protected $_name;
  protected $_sections = array();
  private $_issue;

  /**
   * Redirige vers le template selectionné
   */
  public function index(){
    $url = Atomik::url(":template/:issue",array('template' => $_POST['template'], 'issue' => $_POST['issue']));
    Atomik::redirect($url,false);
  }



}

 ?>

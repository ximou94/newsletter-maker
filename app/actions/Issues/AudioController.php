<?php
namespace Issues;
use BlocsController;
use Atomik;
/**
	*
	*/
class AudioController extends IssuesController{

		private $_sections = array();

		public function index(){
						$this->setIssue('audio');
						parent::index();
						if (Atomik::get('request.template') === 'rh') {
										$this->deposerannonces();
						}
						if(Atomik::get('request.template') === "newsletter") {
										$this->librairie();
						}
		}

		public function librairie() {
						if ($this->count === 0) {
										BlocsController::section('sélection du mois');
						}
						$this->viewOutput = Atomik::render('blocs/librairie');
						echo $this->viewOutput;
		}

		public function annonces($url){
				if ($this->count === 0) {
						BlocsController::section('annonce');
				}
				BlocsController::annonce($url);
				$this->count++;
		}

		public function rhune($url,$img){
				if(!empty($this->getLeaderBanner(Atomik::get('request.template')))){
						BlocsController::leaderBanner('blocs/leaderBanner',Atomik::get('request.template'),$this->getLeaderBannerLink(Atomik::get('request.template')));
				}
				BlocsController::header('blocs/header',Atomik::get('request.template'),$this->_issue,$this->_locale);
				BlocsController::annonceUne($url,$img);
				if(!empty($this->getBanner2(Atomik::get('request.template')))){
						BlocsController::Banner('blocs/Banner',Atomik::get('request.template'),$this->getBanner2Link(Atomik::get('request.template')));
				}
		}

		public function rhoffres($url,$img){
				if ($this->count === 0) {
						BlocsController::section('offres');
				}
				BlocsController::annonce($url,$img);
				$this->count++;
		}

		public function rhdemandes($url,$img){
				if ($this->count === 0) {
						BlocsController::section('candidat');
				}
				BlocsController::annonce($url,$img);
				$this->count++;
		}

		public function deposerannonces(){
				$this->viewOutput = Atomik::render('blocs/deposerannonces');
				echo $this->viewOutput;
		}
}

?>

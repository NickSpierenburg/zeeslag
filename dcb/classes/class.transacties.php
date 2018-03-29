<?php

class transactie {
	private $id;
	private $verzender;
	private $ontvanger;
	private $waarde;
	private $type;
	private $opmerking;

	/*################## GETTERS ##################*/
	function getId() {
		return $this->id;
	}

	function getVerzender() {
		return $this->verzender;
	}

	function getOntvanger() {
		return $this->ontvanger;
	}

	function getWaarde() {
		return $this->waarde;
	}

	function getType() {
		return $this->type;
	}

	function getOpmerking() {
		return $this->opmerking;
	}
        
	/*################## SETTERS ##################*/

	function __construct($vz, $ov, $wr, $tp, $op) {
		$this->verzender = $vz;
		$this->ontvanger = $ov;
		$this->waarde = $wr;
		$this->type = $tp;
		$this->opmerking = $op;
	}
        function MaakOver($conn = false){
            if( $this->verzender->balans >= $this->waarde){
                $this->verzender->balans = $this->verzender->balans - $this->waarde;
                $sqlUpdateVerzender = 'UPDATE `dcb_rekening` SET `balans`='.$this->verzender->getBalans().' WHERE rekening_nummer = "'.$this->verzender->getRekeningNummer().'";';
                $conn->query($sqlUpdateVerzender);
                
                $this->ontvanger->balans = $this->ontvanger->balans + $this->waarde;
                $sqlUpdateOntvanger = 'UPDATE `dcb_rekening` SET `balans`='.$this->ontvanger->getBalans().' WHERE rekening_nummer = "'.$this->ontvanger->getRekeningNummer().'";';
                $conn->query($sqlUpdateOntvanger);   
                echo $sqlUpdateVerzender;
                echo '<br>';
                echo $sqlUpdateOntvanger;
            }else{
                echo' Je hebt niet genoeg op je acount staan';
            }       
        } 

        
        

}

?>

<?php

class Diogo_Entrega_Model_Destiny extends Mage_Core_Model_Abstract 
{
	public function _construct(){
		$this->_init('diogo_entrega/destiny');
	}
	
	public function loadByZipCode($zip_code){
		$this->load($zip_code, 'zip_code');
		return $this;
	}
}
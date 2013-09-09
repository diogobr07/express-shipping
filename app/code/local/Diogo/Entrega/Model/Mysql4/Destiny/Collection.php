<?php

class Diogo_Entrega_Model_Mysql4_Destiny_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
	public function _construct()
	{
		parent::_construct();
		$this->_init('diogo_entrega/destiny');
	}
} 

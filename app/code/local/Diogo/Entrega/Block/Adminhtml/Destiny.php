<?php

class Diogo_Entrega_Block_Adminhtml_Destiny extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	public function __construct()
	{
		$this->_blockGroup = 'diogo_entrega';
		$this->_controller = 'adminhtml_destiny';
		$this->_headerText = Mage::helper('diogo_entrega')->__('Shipping Destiny');
		$this->_addButtonLabel = Mage::helper('diogo_entrega')->__('New Destiny');
		parent::__construct();
	}
}
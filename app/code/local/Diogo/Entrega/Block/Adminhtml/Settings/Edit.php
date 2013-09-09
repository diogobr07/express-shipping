<?php

class Diogo_Entrega_Block_Adminhtml_Settings_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
	public function __construct()
	{
		parent::__construct();
		
		$this->_objectId = 'id';
		$this->_blockGroup = 'diogo_entrega';
		$this->_controller = 'adminhtml_settings';
		
		$this->_updateButton('save', 'label', Mage::helper('diogo_entrega')->__('Save'));
		$this->_updateButton('delete', 'label', Mage::helper('diogo_entrega')->__('Delete'));
	}
	
	public function getHeaderText()
	{
		return Mage::helper('diogo_entrega')->__('Express Shipping');
	}
}
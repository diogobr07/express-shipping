<?php

class Diogo_Entrega_Block_Adminhtml_Destiny_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
	public function __construct(){
		$this->_blockGroup = 'diogo_entrega';
		$this->_controller = 'adminhtml_destiny';
		
		parent::__construct();
		
		$this->_updateButton('save', 'label', Mage::helper('diogo_entrega')->__('Save'));
		$this->_updateButton('delete', 'label', Mage::helper('diogo_entrega')->__('Delete'));
	}
	
	public function getHeaderText(){
		return $this->__('View Destiny');
	}
}
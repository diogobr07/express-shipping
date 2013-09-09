<?php

class Diogo_Entrega_Block_Adminhtml_Destiny_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
  	  $this->setId('destiny_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('diogo_entrega')->__('Destiny'));
      parent::__construct();

  }

  protected function _beforeToHtml()
  {
    $this->addTab('form_section', array(
		'label'     => Mage::helper('diogo_entrega')->__('Destiny'),
        'title'     => Mage::helper('diogo_entrega')->__('Destiny'),
        'content'   => $this->getLayout()->createBlock('diogo_entrega/adminhtml_destiny_edit_tab_form')->toHtml(),
    ));
     
    return parent::_beforeToHtml();
  }
}
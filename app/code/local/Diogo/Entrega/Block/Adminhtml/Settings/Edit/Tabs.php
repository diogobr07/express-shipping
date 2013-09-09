<?php

class Diogo_Entrega_Block_Adminhtml_Settings_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
  	  $this->setId('settings_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('diogo_entrega')->__('Settings'));
      parent::__construct();

  }

  protected function _beforeToHtml()
  {
    $this->addTab('form_section', array(
		'label'     => Mage::helper('diogo_entrega')->__('Settings'),
        'title'     => Mage::helper('diogo_entrega')->__('Settings'),
        'content'   => $this->getLayout()->createBlock('diogo_entrega/adminhtml_settings_edit_tab_form')->toHtml(),
    ));
     
    return parent::_beforeToHtml();
  }
}
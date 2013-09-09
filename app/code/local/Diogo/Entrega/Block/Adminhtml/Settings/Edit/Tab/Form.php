<?php

class Diogo_Entrega_Block_Adminhtml_Settings_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{
		$form = new Varien_Data_Form();
		$this->setForm($form);
		$fieldset = $form->addFieldset('settings_fieldset', array('legend'=>Mage::helper('diogo_entrega')->__('Edit Settings')));

		$fieldset->addField('file', 'file', array(
          'label'     => Mage::helper('diogo_entrega')->__('CSV File'),
          'name' => 'csv_file',
          'required' => true,
		  'after_element_html' => '<small>' . Mage::helper('diogo_entrega')->__('zip code; address; neighborhood; city; uf; estate; price') . '</small>',
        ));
		
		return parent::_prepareForm();
	}
}
<?php

class Diogo_Entrega_Block_Adminhtml_Destiny_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{
		$form = new Varien_Data_Form();
		$this->setForm($form);
		$fieldset = $form->addFieldset('destiny_fieldset', array('legend'=>Mage::helper('diogo_entrega')->__('Edit Destiny')));

		$fieldset->addField('zip_code', 'text', array(
          'label' => Mage::helper('diogo_entrega')->__('Zip Code'),
          'name' => 'zip_code',
          'required' => true,
        ));
		
		$fieldset->addField('city', 'text', array(
          'label' => Mage::helper('diogo_entrega')->__('City'),
          'name' => 'city',
          'required' => true,
        ));

		$fieldset->addField('state', 'text', array(
          'label' => Mage::helper('diogo_entrega')->__('State'),
          'name' => 'state',
          'required' => true,
        ));
		
		$fieldset->addField('neighborhood', 'text', array(
          'label' => Mage::helper('diogo_entrega')->__('Neighborhood'),
          'name' => 'neighborhood',
          'required' => true,
        ));		

		$fieldset->addField('address', 'text', array(
          'label' => Mage::helper('diogo_entrega')->__('Address'),
          'name' => 'address',
          'required' => true,
        ));	
		
		$fieldset->addField('uf', 'text', array(
			'label' => Mage::helper('diogo_entrega')->__('UF'),
			'name' => 'uf',
			'required' => true,
		));
		
		$fieldset->addField('price', 'text', array(
          'label' => Mage::helper('diogo_entrega')->__('Price'),
          'name' => 'price',
          'required' => true,
        ));			
		
		// if the action is edit then show de values in the form
		if(Mage::registry('destiny_data')){
			$form->setValues(Mage::registry('destiny_data')->getData());
		}
		
		return parent::_prepareForm();
	}
}
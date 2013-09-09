<?php

class Diogo_Entrega_Block_Adminhtml_Destiny_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	public function __construct(){
		parent::__construct();
		$this->setDefaulSort('id');
		$this->setId('diogo_engtrega_destiny_grid');
		
		$this->setParametersInSession(true);
	}

	protected function _prepareCollection(){
		// Get and set our collection for the grid
		$collection = Mage::getModel('diogo_entrega/destiny')->getCollection();
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}
	
	protected function _prepareColumns(){
		// Add the columns that should appear in the grid
		$this->addColumn('zip_code',
			array(
				'header' => $this->__('Zip Code'),
				'align' => 'right',
				'width' => '50px',
				'index' => 'zip_code'
			)
		);
		
		$this->addColumn('city',
			array(
				'header' => $this->__('City'),
				'width' => 	'100px',
				'index' => 	'city'
			)
		);		

		$this->addColumn('state',
			array(
				'header' => $this->__('State'),
				'width' => 	'100px',
				'index' => 	'state'
			)
		);

		$this->addColumn('neighborhood',
			array(
				'header' => $this->__('Neighborhood'),
				'width' => 	'100px',
				'index' => 	'neighborhood'
			)
		);		
		$this->addColumn('address',
			array(
				'header' => $this->__('Address'),
				'width' => 	'200px',
				'index' => 	'address'
			)
		);

		$this->addColumn('price',
			array(
				'header' => $this->__('Price'),
				'width' => 	'50px',
				'type' => 	'currency',
				'index' => 	'price'
			)
		);
		
		
		
		return parent::_prepareColumns();
	}
	
	public function getRowUrl($row){
		// This is where our row daa will link to
		return $this->getUrl('*/*/edit', array('id' => $row->getId()));
	}
}
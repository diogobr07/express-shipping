<?php

class Diogo_Entrega_Adminhtml_SettingsController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction(){
		$this->loadLayout();
		$this->_addContent($this->getLayout()->createBlock('diogo_entrega/adminhtml_settings_edit'))
			->_addLeft($this->getLayout()->createBlock('diogo_entrega/adminhtml_settings_edit_tabs'));
		$this->renderLayout();
		return $this;
	}
	
	public function saveAction() {
		if($this->getRequest()->getPost()){
			
			$rows = $this->getCsvRows($_FILES['csv_file']);
			if($rows){
				foreach($rows as $row){
				
					if(!empty($row[0]) && !empty($row[1]) && !empty($row[2]) && !empty($row[3]) && !empty($row[4]) && !empty($row[5]) && !empty($row[1])){
						
						$destiny = Mage::getModel('diogo_entrega/destiny')->loadByZipCode(str_pad($row[0], 8, 0, STR_PAD_LEFT));
						$destiny->setZipCode(str_pad($row[0], 8, 0, STR_PAD_LEFT))
							->setAddress($row[1])
							->setNeighborhood($row[2])
							->setCity($row[3])
							->setUf($row[4])
							->setState($row[5])
							->setPrice($row[6]);
						$destiny->save();
					}
				}
				
				Mage::getSingleton('core/session')->addSuccess($this->__('Data imported!'));
			}
			else {
				Mage::getSingleton('core/session')->addError($this->__('Invalid file type a csv file was expected!'));
			}
			$this->_redirect('*/*');
		}
	}
	
	private function getCsvRows($file){
		try {
			if(preg_match('/\.csv$/', $file['name'])){
				
				$file = new SplFileObject($file['tmp_name']);
				$file->setFlags(SplFileObject::READ_CSV);
				foreach ($file as $row) {
					$rows[] = (explode(';', utf8_encode($row[0])));
				}
				
				/*removes the header line*/
				unset($rows[0]);
				
				return $rows;
			} else {
				
				return false;
			}
		} 
		catch(Exception $e){
			throw $e;
		}	
	}

}

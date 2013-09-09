<?php

class Diogo_Entrega_Adminhtml_DestinyController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

	public function editAction(){
		$id = $this->getRequest()->getParam('id');
        $destiny = Mage::getModel('diogo_entrega/destiny')->load($id);
		if($destiny->getId() || $id == 0) {
			Mage::register('destiny_data', $destiny);
			$this->loadLayout();
			$this->_addContent($this->getLayout()->createBlock('diogo_entrega/adminhtml_destiny_edit'))
				->_addLeft($this->getLayout()->createBlock('diogo_entrega/adminhtml_destiny_edit_tabs'));
		}

        $this->renderLayout();	
	}
	
	public function newAction(){
		$this->_forward('edit');
	}
	
	public function saveAction(){
		if($this->getRequest()->getPost()){
			try {
				$postData = $this->getRequest()->getPost();
				$destiny = Mage::getModel('diogo_entrega/destiny');
				$destiny->addData($postData)
					->setId($this->getRequest()->getParam('id'))
					->save();
				Mage::getSingleton('adminhtml/session')->addSuccess('successfully saved');
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
			}
			$this->_redirect('*/*');
		}
	}
	
	public function deleteAction(){
		if($this->getRequest()->getParam('id')){
			try {
				$destiny = Mage::getModel('diogo_entrega/destiny');
				$destiny->setId($this->getRequest()->getParam('id'))
					->delete();
					Mage::getSingleton('adminhtml/session')->addSuccess('sucessfully deleted');
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
			}
			$this->_redirect('*/*/');
		}
	}

}

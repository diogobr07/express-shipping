<?php

/**
* payment method class
*/
class Diogo_Pagamento_Model_Payment_PaymentMethod extends Mage_Payment_Model_Method_Abstract
{
	protected $_code = 'diogo_pagamento';
	protected $_canUseCheckout  = false;
	
	public function canUseCheckout(){
		if(Mage::getStoreConfig("payment/{$this->_code}/show_if_code_applied")){
			$quote = Mage::getModel('checkout/session')->getQuote();
			if(Mage::getStoreConfig("payment/{$this->_code}/coupon_code") == $quote->getCouponCode()){
				$this->_canUseCheckout = true;
			}
		} else {
			$this->_canUseCheckout = true;
		}
		return $this->_canUseCheckout;
	}
}
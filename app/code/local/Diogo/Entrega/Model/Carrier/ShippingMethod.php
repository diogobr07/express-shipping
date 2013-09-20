<?php
 /*
 * shipping method module adapter
 *
 */
 
 class Diogo_Entrega_Model_Carrier_ShippingMethod 
  extends Mage_Shipping_Model_Carrier_Abstract
    implements Mage_Shipping_Model_Carrier_Interface
 {
	/**
	* unique internal shipping indentifier
	*
	* @var string [a-z0-9_]
	*/
	protected $_code = 'diogo_entrega';
	
	protected $_toZip;
	
	/**
	* Collect rates for this shipping method based on information in $request
	*
	* @param Mage_Shipping_Model_Rate_Request $data
	* @param Mage_Shipping_Model_Rate_Result
	*/
	
	public function collectRates(Mage_Shipping_Model_Rate_Request $request)
	{
		//skip if not enabled
		if(!Mage::getStoreConfig('carriers/'.$this->_code.'/active')) {
			return false;
		}
		
		// this object will be returned as result of this method
		// containing all the shipping rates of this method
		$result = Mage::getModel('shipping/rate_result');
		
		//create new instance of method rated
		$method = Mage::getModel('shipping/rate_result_method');
		
		//add free shipping via coupon code?
		if(Mage::getStoreConfig('carriers/'.$this->_code.'/use_freeshipping_code')){
			$quote = Mage::getModel('checkout/session')->getQuote();
			if(Mage::getStoreConfig('carriers/'.$this->_code.'/freeshipping_code') == $quote->getCouponCode()){
				
				// record carrier information
				$method->setCarrier($this->_code);
				$method->setCarrierTitle(Mage::getStoreConfig('carriers/'.$this->_code.'/freeshipping_title'));
				
				// record method information
				$method->setMethod($this->getConfigData('code_free_shipping/method'));
				$method->setMethodTitle(Mage::getStoreConfig('carriers/'.$this->_code.'/freeshipping_methodtitle'));
				
				// record price
				$method->setPrice($this->getConfigData('code_free_shipping/price'));
				
				// add this rate to the result
				$result->append($method);
				
				return $result;
			}
		}

		//check zip code
		if($this->setZipCode($request->getDestPostcode()) === false){
			return false;
		}

		/**
		* here we are retrieving shipping rates from external service
		* or using internal logic to calculate the rate from $request
		* you can see an example in Mage_Usa_Model_Shipping_Carrier_Ups::setRequest()
		*/
		
		$destiny = Mage::getModel('diogo_entrega/destiny')->loadByZipCode($this->_toZip);
		if($destiny->hasData()){
			//get necessary configuration values
			
			// record carrier information
			$method->setCarrier($this->_code);
			$method->setCarrierTitle(Mage::getStoreConfig('carriers/'.$this->_code.'/title'));
			
			// record method information
			$method->setMethod($this->_code);
			$method->setMethodTitle(Mage::getStoreConfig('carriers/'.$this->_code.'/methodtitle'));
			
			// rate cost is optional property to record
			//$method->setCost($rMethod['amount']);
			
			// in our example handling is fixed amount that is added to cost
			// to receive price the customer will pay for shipping method.
			// it could be as well percentage:
			// $method->setPrice($rMethod['amount']+$handling);
			$method->setPrice($destiny->getPrice());
			
			// add this rate to the result
			$result->append($method);	
			
			return $result;
		}
		
	}
	
	/**
	* This method is user when viewing / Listing Shipping Methods with Codes programmatically
	*/
	public function getAllowedMethods() {
		return array($this->_code => $this->getConfigData('name'));
	}
	
	private function setZipCode($zip_code){
		// ZIP Code
        $this->_toZip = $zip_code;

        //Fix Zip Code
        $this->_toZip = preg_replace('/-|\./', '', trim($this->_toZip));

        if(!preg_match("/^([0-9]{8})$/", $this->_toZip)){
            //To zip code error
            Mage::log('Diogo_Entrega: $_toZip  Error');
            return false;
        }
		return $this;
		
	}
}
<?php

class Diogo_Pagamento_Adminhtml_Model_System_Config_Source_Rules
{

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
		$active_coupons[] = array(
			'value' => '', 'label' => Mage::helper('adminhtml')->__('-- Please Select --')
		);
		$coupons = Mage::getModel('salesrule/coupon')->getCollection();
		foreach($coupons as $coupon){
			$rule = Mage::getModel('salesrule/rule')->load($coupon->getRuleId());
			if($rule->getIsActive() && (is_null($coupon->getExpirationDate()) || $coupon->getExpirationDate() > now())){
				$active_coupons[] = array(
					'value' => $coupon->getCode(), 'label' => strtoupper($coupon->getCode()),
				);
			}
		}
		return $active_coupons;
    }

}

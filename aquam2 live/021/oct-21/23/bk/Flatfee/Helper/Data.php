<?php

namespace Askantech\Flatfee\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    /**
     * Custom fee config path
     */
    const CONFIG_CUSTOM_IS_ENABLED = 'Flatfee/Flatfee/status';
    const CONFIG_CUSTOM_FEE = 'Flatfee/Flatfee/Flatfee_amount';
    const CONFIG_FEE_LABEL = 'Flatfee/Flatfee/name';
    const CONFIG_MINIMUM_ORDER_AMOUNT = 'Flatfee/Flatfee/minimum_order_amount';
    const CONFIG_CUSTOMER_GROUP = 'Flatfee/Flatfee/customer_group';

    

    /**
     * @return mixed
     */
    public function isModuleEnabled()
    {

        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $isEnabled = $this->scopeConfig->getValue(self::CONFIG_CUSTOM_IS_ENABLED, $storeScope);
        return $isEnabled;
    }

    /**
     * Get custom fee
     *
     * @return mixed
     */
    public function getExtrafee()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $fee = $this->scopeConfig->getValue(self::CONFIG_CUSTOM_FEE, $storeScope);
        return $fee;
    }

    /**
     * Get custom fee
     *
     * @return mixed
     */
    public function getCustomergrp()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $cgrp = $this->scopeConfig->getValue(self::CONFIG_CUSTOMER_GROUP, $storeScope);
        return $cgrp;
    }

    /**
     * Get custom fee
     *
     * @return mixed
     */
    public function getFlatFeeLabel()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $feeLabel = $this->scopeConfig->getValue(self::CONFIG_FEE_LABEL, $storeScope);
        return $feeLabel;
    }

    /**
     * @return mixed
     */
    public function getMinimumOrderAmount()
    {

        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $MinimumOrderAmount = $this->scopeConfig->getValue(self::CONFIG_MINIMUM_ORDER_AMOUNT, $storeScope);
        return $MinimumOrderAmount;
    }
}

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
    const CONFIG_CUSTOM_CAT1 = 'Flatfee/Flatfee/Flatfee_category1';
    const CONFIG_CUSTOM_FEE2 = 'Flatfee/Flatfee/Flatfee_amount2';
    const CONFIG_CUSTOM_CAT2 = 'Flatfee/Flatfee/Flatfee_category2';
    const CONFIG_CUSTOM_FEE3 = 'Flatfee/Flatfee/Flatfee_amount3';
    const CONFIG_CUSTOM_CAT3 = 'Flatfee/Flatfee/Flatfee_category3';
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
     * Get custom fee category
     *
     * @return mixed
     */
    public function getFeecategory()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $cat1 = $this->scopeConfig->getValue(self::CONFIG_CUSTOM_CAT1, $storeScope);
        return $cat1;
    }
    /**
     * Get custom fee2
     *
     * @return mixed
     */
    public function getExtrafee2()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $fee2 = $this->scopeConfig->getValue(self::CONFIG_CUSTOM_FEE2, $storeScope);
        return $fee2;
    }
    /**
     * Get custom fee category2
     *
     * @return mixed
     */
    public function getFeecategory2()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $cat2 = $this->scopeConfig->getValue(self::CONFIG_CUSTOM_CAT2, $storeScope);
        return $cat2;
    }
    /**
     * Get custom fee3
     *
     * @return mixed
     */
    public function getExtrafee3()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $fee3 = $this->scopeConfig->getValue(self::CONFIG_CUSTOM_FEE3, $storeScope);
        return $fee3;
    }
    /**
     * Get custom fee category3
     *
     * @return mixed
     */
    public function getFeecategory3()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $cat3 = $this->scopeConfig->getValue(self::CONFIG_CUSTOM_CAT3, $storeScope);
        return $cat3;
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

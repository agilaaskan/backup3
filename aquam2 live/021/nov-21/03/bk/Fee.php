<?php
namespace Askantech\Flatfee\Model\Quote\Total;

class Fee extends \Magento\Quote\Model\Quote\Address\Total\AbstractTotal
{

    protected $helperData;
    protected $_priceCurrency;
    protected $_customerSession;

    /**
     * Collect grand total address amount
     *
     * @param \Magento\Quote\Model\Quote $quote
     * @param \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment
     * @param \Magento\Quote\Model\Quote\Address\Total $total
     * @return $this
     */
    protected $quoteValidator = null;

    public function __construct(\Magento\Quote\Model\QuoteValidator $quoteValidator,
								\Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency,
                                \Askantech\Flatfee\Helper\Data $helperData,
                                \Magento\Backend\Model\Session\Quote $backendQuoteSession,
                                \Magento\Store\Model\StoreManagerInterface $storeManager,
                                \Magento\Quote\Api\Data\ShippingMethodInterface $shippingMethodManagement,
                                \Magento\Customer\Model\Session $customerSession,
                                \Magento\Checkout\Model\Session $checkoutSession)
    {
        $this->quoteValidator = $quoteValidator;
		$this->_priceCurrency = $priceCurrency;
        $this->helperData = $helperData;
        $this->backendQuoteSession = $backendQuoteSession;
        $this->_storeManager = $storeManager;
        $this->shippingMethod = $shippingMethodManagement;
        $this->_checkoutSession = $checkoutSession;
        $this->_customerSession = $customerSession;
    }

    public function collect(
        \Magento\Quote\Model\Quote $quote,
        \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment,
        \Magento\Quote\Model\Quote\Address\Total $total
    )
    {
        parent::collect($quote, $shippingAssignment, $total);
        if (!count($shippingAssignment->getItems())) {
            return $this;
        }
        $extra_fee = true;
        $enabled = $this->helperData->isModuleEnabled();
        $minimumOrderAmount = $this->helperData->getMinimumOrderAmount();
        $subtotal = $total->getTotalAmount('subtotal');
        $finalamount = 0;
        $customerg = $this->helperData->getCustomergrp();
        $cat1 = $this->helperData->getFeecategory(); // 5
        $cat2 = $this->helperData->getFeecategory2(); //15
        $cat3 = $this->helperData->getFeecategory3(); // 2
        $checkcustomer = $this->_customerSession->getCustomer()->getGroupId();

        $array = explode(',', $customerg); 
        if (in_array($checkcustomer, $array)) {
                
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $cart = $objectManager->get('\Magento\Checkout\Model\Cart'); 
            // retrieve quote items array
            $items = $cart->getQuote()->getAllItems();
            $fee = 0;
            $qty = 0;
            $flag1 = 0;
            $finalfee = 0 ;
            $productfee = 0;
    
            if(!empty($items)){
                $item_count = count($items);
                foreach($items as $item) {
                    $productid = $item->getProductId();
                    $product = $objectManager->create('Magento\Catalog\Model\Product')->load($productid);
                    $categoriesIds = $product->getCategoryIds();
                    if (in_array($cat1, $categoriesIds) && $item_count >= 1){
                        $qty1 = $item->getQty();
                        $qty = $qty + $qty1;
                        $finalfee = $this->helperData->getExtrafee();
                        $productfee += $qty1 * $finalfee;

                    }elseif (in_array($cat2, $categoriesIds) && $item_count >= 1){
                        $qty1 = $item->getQty();
                        $qty = $qty + $qty1;
                        $finalfee = $this->helperData->getExtrafee2();
                        $productfee += $qty1 * $finalfee;

                    }elseif (in_array($cat3, $categoriesIds) && $item_count >= 1){
                        $qty1 = $item->getQty();
                        $qty = $qty + $qty1;
                        $finalfee = $this->helperData->getExtrafee3();
                        $productfee += $qty1 * $finalfee;

                    }
                }
                if($qty > 0){
                    // $fee1 = $finalfee;
                    // $flatfee = $fee1 * $qty;
                    // $fee = $flatfee;
                    $fee = $productfee;
                    $extra_fee = true;
                }else{
                    $fee = 0;//$this->dataHelper->getExtrafee();
                    $extra_fee = false;
                }
            }
            $items_admin = $this->backendQuoteSession->getQuote()->getAllVisibleItems();

            if(!empty($items_admin)){
                $checkcustomer1 = $this->backendQuoteSession->getQuote()->getCustomerGroupId();
                if (in_array($checkcustomer1, $array)) {
                    $item_admin_count = count($items_admin);
                    foreach($items_admin as $item){
                        $productid = $item->getProductId();
                        $product = $objectManager->create('Magento\Catalog\Model\Product')->load($productid);
                        $categoriesIds = $product->getCategoryIds();
                        if (in_array($cat1, $categoriesIds) && $item_admin_count >= 1){
                            $qty1 = $item->getQty();
                            $qty = $qty + $qty1;
                            $finalfee = $this->helperData->getExtrafee();
                            $productfee += $qty1 * $finalfee;

                        }elseif (in_array($cat2, $categoriesIds) && $item_admin_count >= 1){
                            $qty1 = $item->getQty();
                            $qty = $qty + $qty1;
                            $finalfee = $this->helperData->getExtrafee2();
                            $productfee += $qty1 * $finalfee;
    
                        }elseif (in_array($cat3, $categoriesIds) && $item_admin_count >= 1){
                            $qty1 = $item->getQty();
                            $qty = $qty + $qty1;
                            $finalfee = $this->helperData->getExtrafee3();
                            $productfee += $qty1 * $finalfee;
    
                        }
                    }
                    if($qty > 0){
                        // $fee1 = $finalfee;
                        // $flatfee = $fee1 * $qty;
                        // $fee = $flatfee;
                        $fee = $productfee;
                        $extra_fee = true;
                    }else{
                        $fee = 0;//$this->dataHelper->getExtrafee();
                        $extra_fee = false;
                    }
                }else{
                    $fee = 0;
                    $extra_fee = false;
                }
            }
        } else {
            $extra_fee = false;
            $fee=0;
        }
        if ($enabled && $minimumOrderAmount <= $subtotal && $extra_fee) {
            
            //$fee = $this->helperData->getExtrafee();
            $total->setTotalAmount('flatfee', $fee);
            $total->setBaseTotalAmount('flatfee', $fee);
            $total->setFlatfee($fee);
            $quote->setFlatfee($fee);
            
			
			$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
			$productMetadata = $objectManager->get('Magento\Framework\App\ProductMetadataInterface');
			$version = (float)$productMetadata->getVersion(); 
			if($version > 2.1)
			{
				//$total->setGrandTotal($total->getGrandTotal() + $fee);
			}
			else
			{
				$total->setGrandTotal($total->getGrandTotal() + $fee);
			}
			
		}
        return $this;
    }

    /**
     * @param \Magento\Quote\Model\Quote $quote
     * @param \Magento\Quote\Model\Quote\Address\Total $total
     * @return array
     */
    public function fetch(\Magento\Quote\Model\Quote $quote, \Magento\Quote\Model\Quote\Address\Total $total)
    {
        $websiteId = $this->_storeManager->getStore()->getWebsiteId();
        $extra_fee = true;
        $enabled = $this->helperData->isModuleEnabled();
        $minimumOrderAmount = $this->helperData->getMinimumOrderAmount();
        $subtotal = $total->getTotalAmount('subtotal');
        $finalamount = 0;
        $customerg = $this->helperData->getCustomergrp();
        $cat1 = $this->helperData->getFeecategory(); //5
        $cat2 = $this->helperData->getFeecategory2(); //15
        $cat3 = $this->helperData->getFeecategory3();

        $checkcustomer = $this->_customerSession->getCustomer()->getGroupId();
        $array = explode(',', $customerg); 
        if (in_array($checkcustomer, $array)) {

            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $cart = $objectManager->get('\Magento\Checkout\Model\Cart'); 
            // retrieve quote items array
            $items = $cart->getQuote()->getAllItems();
            $fee = 0;
            $qty = 0;
            $flag1 = 0;
            $finalfee = 0 ;
            $productfee = 0;
            if(!empty($items)){
                $item_count = count($items);
                foreach($items as $item) {
                    $productid = $item->getProductId();
                    $product = $objectManager->create('Magento\Catalog\Model\Product')->load($productid);
                    $categoriesIds = $product->getCategoryIds();
                    if (in_array($cat1, $categoriesIds) && $item_count >= 1){
                        $qty1 = $item->getQty();
                        $qty = $qty + $qty1;
                        $finalfee = $this->helperData->getExtrafee();
                        $productfee += $qty1 * $finalfee;

                    }elseif (in_array($cat2, $categoriesIds) && $item_count >= 1){
                        $qty1 = $item->getQty();
                        $qty = $qty + $qty1;
                        $finalfee = $this->helperData->getExtrafee2();
                        $productfee += $qty1 * $finalfee;

                    }elseif (in_array($cat3, $categoriesIds) && $item_count >= 1){
                        $qty1 = $item->getQty();
                        $qty = $qty + $qty1;
                        $finalfee = $this->helperData->getExtrafee3();
                        $productfee += $qty1 * $finalfee;

                    }
                }
                if($qty > 0){
                    // $fee1 = $finalfee;
                    // $flatfee = $fee1 * $qty;
                    // $fee = $flatfee;
                    $fee = $productfee;
                    $extra_fee = true;
                }else{
                    $fee = 0;//$this->dataHelper->getExtrafee();
                    $extra_fee = false;
                }
            }
        
            //$items_admin = $this->sessionQuote->getQuote();
            $items_admin = $this->backendQuoteSession->getQuote()->getAllVisibleItems();
       
            if(!empty($items_admin)){
                $checkcustomer1 = $this->backendQuoteSession->getQuote()->getCustomerGroupId();
                if (in_array($checkcustomer1, $array)) {
                    $item_admin_count = count($items_admin);
                    foreach($items_admin as $item){
                        $productid = $item->getProductId();
                        $product = $objectManager->create('Magento\Catalog\Model\Product')->load($productid);
                        $categoriesIds = $product->getCategoryIds();
                        if (in_array($cat1, $categoriesIds) && $item_admin_count >= 1){
                            $qty1 = $item->getQty();
                            $qty = $qty + $qty1;
                            $finalfee = $this->helperData->getExtrafee();
                            $productfee += $qty1 * $finalfee;

                        }elseif (in_array($cat2, $categoriesIds) && $item_admin_count >= 1){
                            $qty1 = $item->getQty();
                            $qty = $qty + $qty1;
                            $finalfee = $this->helperData->getExtrafee2();
                            $productfee += $qty1 * $finalfee;

                        }elseif (in_array($cat3, $categoriesIds) && $item_admin_count >= 1){
                            $qty1 = $item->getQty();
                            $qty = $qty + $qty1;
                            $finalfee = $this->helperData->getExtrafee3();
                            $productfee += $qty1 * $finalfee;

                        }
                    }
                    if($qty > 0){
                        // $fee1 = $finalfee;
                        // $flatfee = $fee1 * $qty;
                        // $fee = $flatfee;
                        $fee = $productfee;
                        $extra_fee = true;
                    }else{
                        $fee = 0;//$this->dataHelper->getExtrafee();
                        $extra_fee = false;
                    }
                }else{
                    $fee = 0;
                    $extra_fee = false;
                }
            }
        } else {
            $extra_fee = false;
            $fee=0;
        }

        $enabled = $this->helperData->isModuleEnabled();
        $minimumOrderAmount = $this->helperData->getMinimumOrderAmount();
        $subtotal = $quote->getSubtotal();
        //$fee = $quote->getFee();
        $result = [];
        if ($enabled && ($minimumOrderAmount <= $subtotal) && $fee) {
            $result = [
                'code' => 'flatfee',
                'title' => $this->helperData->getFlatFeeLabel() ,
                'value' => $fee
            ];
        }
        return $result;
    }

    /**
     * Get Subtotal label
     *
     * @return \Magento\Framework\Phrase
     */
    public function getLabel()
    {
        return __('FlatRate Fee');
    }

    /**
     * @param \Magento\Quote\Model\Quote\Address\Total $total
     */
    protected function clearValues(\Magento\Quote\Model\Quote\Address\Total $total)
    {
        $total->setTotalAmount('subtotal', 0);
        $total->setBaseTotalAmount('subtotal', 0);
        $total->setTotalAmount('tax', 0);
        $total->setBaseTotalAmount('tax', 0);
        $total->setTotalAmount('discount_tax_compensation', 0);
        $total->setBaseTotalAmount('discount_tax_compensation', 0);
        $total->setTotalAmount('shipping_discount_tax_compensation', 0);
        $total->setBaseTotalAmount('shipping_discount_tax_compensation', 0);
        $total->setSubtotalInclTax(0);
        $total->setBaseSubtotalInclTax(0);

    }
}

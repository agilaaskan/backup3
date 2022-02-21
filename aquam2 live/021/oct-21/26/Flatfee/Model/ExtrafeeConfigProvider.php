<?php
namespace Askantech\Flatfee\Model;

use Magento\Checkout\Model\ConfigProviderInterface;

class ExtrafeeConfigProvider implements ConfigProviderInterface
{
    /**
     * @var \Askantech\Flatfee\Helper\Data
     */
    protected $dataHelper;

    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $checkoutSession;
 
     /**
     * @var \Magento\Customer\Model\Session
     */
    protected $customerSession;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * @param \Askantech\Flatfee\Helper\Data $dataHelper
     * @param \Magento\Checkout\Model\Session $checkoutSession
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Askantech\Flatfee\Helper\Data $dataHelper,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Customer\Model\Session $customerSession,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Backend\Model\Session\Quote $backendQuoteSession

    )
    {
        $this->dataHelper = $dataHelper;
        $this->checkoutSession = $checkoutSession;
        $this->customerSession = $customerSession;
        $this->logger = $logger;
        $this->backendQuoteSession = $backendQuoteSession;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $cart = $objectManager->get('\Magento\Checkout\Model\Cart'); 
        
        // retrieve quote items collection
        $itemsCollection = $cart->getQuote()->getItemsCollection();
        
        // get array of all items what can be display directly
        $itemsVisible = $cart->getQuote()->getAllVisibleItems();
        
        // retrieve quote items array
        $items = $cart->getQuote()->getAllItems();
        $finalamount = 0;
        $block = false;
        $fee = 0;
        $qty = 0;
        $flag1 = 0;

        $customerg = $this->dataHelper->getCustomergrp();
        $cat1 = $this->dataHelper->getFeecategory();
        $cat2 = $this->dataHelper->getFeecategory2();
        $cat3 = $this->dataHelper->getFeecategory3();

        $checkcustomer = $this->customerSession->getCustomer()->getGroupId();
        $array = explode(',', $customerg); 
        if (in_array($checkcustomer, $array)) {

            if(!empty($items)){
                $item_count = count($items);
                foreach($items as $item) {
                    $productid = $item->getProductId();
                    $product = $objectManager->create('Magento\Catalog\Model\Product')->load($productid);
                    $categoriesIds = $product->getCategoryIds();
                    if (in_array($cat1, $categoriesIds) && $item_count >= 1){
                        $qty1 = $item->getQty();
                        $qty = $qty + $qty1;
                        $finalfee = $this->dataHelper->getExtrafee();
                    }elseif (in_array($cat2, $categoriesIds) && $item_count >= 1){
                        $qty1 = $item->getQty();
                        $qty = $qty + $qty1;
                        $finalfee = $this->dataHelper->getExtrafee2();
                    }elseif (in_array($cat3, $categoriesIds) && $item_count >= 1){
                        $qty1 = $item->getQty();
                        $qty = $qty + $qty1;
                        $finalfee = $this->dataHelper->getExtrafee3();
                    }
                }
                if($qty > 0){
                    $fee1 = $finalfee;
                    $flatfee = $fee1 * $qty;
                    $fee = $flatfee;
                    $extra_fee = true;
                    $block = true;
                }else{
                    $fee = 0;//$this->dataHelper->getExtrafee();
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
                            $finalfee = $this->dataHelper->getExtrafee();
                        }elseif (in_array($cat2, $categoriesIds) && $item_admin_count >= 1){
                            $qty1 = $item->getQty();
                            $qty = $qty + $qty1;
                            $finalfee = $this->dataHelper->getExtrafee2();
                        }elseif (in_array($cat3, $categoriesIds) && $item_admin_count >= 1){
                            $qty1 = $item->getQty();
                            $qty = $qty + $qty1;
                            $finalfee = $this->dataHelper->getExtrafee3();
                        }
                    }
                    if($qty > 0){
                        $fee1 = $finalfee;
                        $flatfee = $fee1 * $qty;
                        $fee = $flatfee;
                        $extra_fee = true;
                        $block = true;
                    }else{
                        $fee = 0;//$this->dataHelper->getExtrafee();
                        $block = true;
                    }
                }else{
                    $fee = 0;
                    $block = true;
                }
            }
        } else {
            $extra_fee = false;
            $fee = 0;
            $block = true;
        }
        $ExtrafeeConfig = [];
        $enabled = $this->dataHelper->isModuleEnabled();
        $minimumOrderAmount = $this->dataHelper->getMinimumOrderAmount();
        $ExtrafeeConfig['flatfee_label'] = $this->dataHelper->getFlatFeeLabel();
        $quote = $this->checkoutSession->getQuote();
        $subtotal = $quote->getSubtotal();
        $ExtrafeeConfig['flat_fee_amount'] = $fee;//$this->dataHelper->getExtrafee();
        $ExtrafeeConfig['show_hide_Flatfee_block'] =  $block;//($enabled && ($minimumOrderAmount <= $subtotal) && $quote->getFee()) ? true : false;
        $ExtrafeeConfig['show_hide_Flatfee_shipblock'] = ($enabled && ($minimumOrderAmount <= $subtotal)) ? true : false;
        return $ExtrafeeConfig;
    }
}

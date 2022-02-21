<?php
namespace Magecomp\Extrafee\Model;

use Magento\Checkout\Model\ConfigProviderInterface;

class ExtrafeeConfigProvider implements ConfigProviderInterface
{
    /**
     * @var \Magecomp\Extrafee\Helper\Data
     */
    protected $dataHelper;

    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $checkoutSession;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * @param \Magecomp\Extrafee\Helper\Data $dataHelper
     * @param \Magento\Checkout\Model\Session $checkoutSession
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Magecomp\Extrafee\Helper\Data $dataHelper,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Backend\Model\Session\Quote $backendQuoteSession

    )
    {
        $this->dataHelper = $dataHelper;
        $this->checkoutSession = $checkoutSession;
        $this->logger = $logger;
        $this->backendQuoteSession = $backendQuoteSession;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        $selectedShipping = $this->checkoutSession->getQuote()->getShippingAddress()->getShippingMethod();
        if($selectedShipping == 'flatrate_flatrate'){
            $extra_fee = false;
            $fee=0;
            $block = true;
        }else{
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
        $flag = 0;
        $flag1 = 0;
        if(!empty($items)){
        $item_count = count($items);
        foreach($items as $item) {
            $productid = $item->getProductId();
            $product = $objectManager->create('Magento\Catalog\Model\Product')->load($productid);
            $categoriesIds = $product->getCategoryIds();
            if (in_array("3125", $categoriesIds) && $item_count >= 1){
                $qty = $item->getQty();
                $price = $item->getPrice();
                $amount = $price * $qty;
                $finalamount = $finalamount + $amount;
                $flag++;
                if($finalamount > 250){ $flag = 0; }
            }
        }
            if($item_count != $flag){
                if($finalamount > 250){
                    $fee = 0;
                }else{
                    $fee = 45;//$this->dataHelper->getExtrafee();
                }
                $extra_fee = true;
                $block = true;
            }
        }
        
        //$items_admin = $this->sessionQuote->getQuote();
        $items_admin = $this->backendQuoteSession->getQuote()->getAllVisibleItems();
       
        //exit();
        // $objectManagerAdmin = \Magento\Backend\Model\Session\Quote;
        // $items_admin = $objectManagerAdmin->getQuote()->getAllVisibleItems();
        if(!empty($items_admin)){
        $item_admin_count = count($items_admin);
        foreach($items_admin as $item){
            $productid = $item->getProductId();
            $product = $objectManager->create('Magento\Catalog\Model\Product')->load($productid);
            $categoriesIds = $product->getCategoryIds();
            //print_r($categoriesIds);
            if (in_array("3125", $categoriesIds) && $item_admin_count >= 1){
                $qty = $item->getQty();
                $price = $item->getPrice();
                $amount = $price * $qty;
                $finalamount = $finalamount + $amount;
                $flag1++;
                if($finalamount > 250){ $flag1 = 0; }
            }
        }
        if($item_admin_count != $flag1){
           if($finalamount > 250){
                $fee = 0;
            }else{
                $fee = 45;//$this->dataHelper->getExtrafee();
            }
            $extra_fee = true;
             $block = true;
        }
        }
        }
        $ExtrafeeConfig = [];
        $enabled = $this->dataHelper->isModuleEnabled();
        $minimumOrderAmount = $this->dataHelper->getMinimumOrderAmount();
        $ExtrafeeConfig['fee_label'] = $this->dataHelper->getFeeLabel();
        $quote = $this->checkoutSession->getQuote();
        $subtotal = $quote->getSubtotal();
        $ExtrafeeConfig['custom_fee_amount'] = $fee;//$this->dataHelper->getExtrafee();
        $ExtrafeeConfig['show_hide_Extrafee_block'] =  $block;//($enabled && ($minimumOrderAmount <= $subtotal) && $quote->getFee()) ? true : false;
        $ExtrafeeConfig['show_hide_Extrafee_shipblock'] = ($enabled && ($minimumOrderAmount <= $subtotal)) ? true : false;
        return $ExtrafeeConfig;
    }
}

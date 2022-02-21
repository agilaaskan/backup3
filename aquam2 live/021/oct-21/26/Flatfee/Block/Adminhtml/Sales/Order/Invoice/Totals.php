<?php

namespace Askantech\Flatfee\Block\Adminhtml\Sales\Order\Invoice;

class Totals extends \Magento\Framework\View\Element\Template
{

    /**
     * @var \Askantech\Flatfee\Helper\Data
     */
    protected $_dataHelper;

    /**
     * Order invoice
     *
     * @var \Magento\Sales\Model\Order\Invoice|null
     */
    protected $_invoice = null;

    /**
     * @var \Magento\Framework\DataObject
     */
    protected $_source;

    /**
     * OrderFee constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
            \Askantech\Flatfee\Helper\Data $dataHelper,
            \Magento\Quote\Api\Data\ShippingMethodInterface $shippingMethodManagement,
            array $data = []
    ) {
        $this->_dataHelper = $dataHelper;
        $this->shippingMethod = $shippingMethodManagement;
        parent::__construct($context, $data);
    }

    /**
     * Get data (totals) source model
     *
     * @return \Magento\Framework\DataObject
     */
    public function getSource()
    {
        return $this->getParentBlock()->getSource();
    }

    public function getInvoice()
    {
        return $this->getParentBlock()->getInvoice();
    }
    /**
     * Initialize payment fee totals
     *
     * @return $this
     */
    public function initTotals()
    {
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $cart = $objectManager->get('\Magento\Checkout\Model\Cart'); 
            // retrieve invoice items array
            $items = $this->getInvoice()->getAllItems();       
            $order = $this->getInvoice()->getOrder();
            $selectedShipping = $order->getShippingMethod();
            $qty = 0;
            $finalamount = 0;
            $checkcustomer  = $order->getCustomerGroupId();
            $customerg = $this->_dataHelper->getCustomergrp();
            $cat1 = $this->_dataHelper->getFeecategory();
            $cat2 = $this->_dataHelper->getFeecategory2();
            $cat3 = $this->_dataHelper->getFeecategory3();


            $array = explode(',', $customerg); 
            if(!empty($items)){
                
                if (in_array($checkcustomer, $array)) {
                    $item_count = count($items);
                    
                    foreach($items as $item) {
                        $productid = $item->getProductId();
                        $product = $objectManager->create('Magento\Catalog\Model\Product')->load($productid);
                        $categoriesIds = $product->getCategoryIds();
                        if (in_array($cat1, $categoriesIds) && $item_count >= 1){
                            $qty1 = $item->getQty();
                            $qty = $qty + $qty1;
                            $finalfee = $this->_dataHelper->getExtrafee();

                        }elseif (in_array($cat2, $categoriesIds) && $item_count >= 1){
                            $qty1 = $item->getQty();
                            $qty = $qty + $qty1;
                            $finalfee = $this->_dataHelper->getExtrafee2();

                        }elseif (in_array($cat3, $categoriesIds) && $item_count >= 1){
                            $qty1 = $item->getQty();
                            $qty = $qty + $qty1;
                            $finalfee = $this->_dataHelper->getExtrafee3();

                        }
                    }
                    if($qty > 0){
                        $fee1 = $finalfee;
                        $flatfee = $fee1 * $qty;
                        $fee = $flatfee;
                    }else{
                        $fee = 0;//$this->dataHelper->getExtrafee();
                    }
                        $this->getParentBlock();
                        $this->getInvoice();
                        $this->getSource();

                    if(!$fee) { //this code I changed inside if condition $this->getSource()->getFee()
                        return $this;
                    }
                        $total = new \Magento\Framework\DataObject(
                            [
                                'code' => 'flatfee',
                                'value' => $fee, //$this->getSource()->getFee()
                                'label' => $this->_dataHelper->getFlatFeeLabel(),
                            ]
                        );

                    $this->getParentBlock()->addTotalBefore($total, 'grand_total');
                    return $this;
                }
            }
    }

}

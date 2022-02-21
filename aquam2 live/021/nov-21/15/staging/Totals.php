<?php

namespace Magecomp\Extrafee\Block\Adminhtml\Sales\Order\Invoice;

class Totals extends \Magento\Framework\View\Element\Template
{

    /**
     * @var \Magecomp\Extrafee\Helper\Data
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
            \Magecomp\Extrafee\Helper\Data $dataHelper,
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
            $flag = 0;
            $finalamount = 0;
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
                        if($finalamount > 250){ $flag = 0;}
                    }
                }

                if($selectedShipping != 'flatrate_flatrate'){
                        if ($flag >= 1 ) {
                            if($finalamount > 250) {
                                $fee = 0;
                            }else{
                                $fee = 45;//$this->_dataHelper->getExtrafee();
                            }
                            $this->getParentBlock();
                            $this->getInvoice();
                            $this->getSource();

                            if(!$fee) { //this code I changed inside if condition $this->getSource()->getFee()
                                return $this;
                            }
                            $total = new \Magento\Framework\DataObject(
                                [
                                    'code' => 'fee',
                                    'value' => $fee, //$this->getSource()->getFee()
                                    'label' => $this->_dataHelper->getFeeLabel(),
                                ]
                            );

                            $this->getParentBlock()->addTotalBefore($total, 'grand_total');
                            return $this;
                    }
                }
            }
    }

}

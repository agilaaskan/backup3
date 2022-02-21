<?php
namespace Askantech\Flatfee\Observer;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;

class AddFeeToOrderObserver implements ObserverInterface
{
    /**
     * Set payment fee to order
     *
     * @param EventObserver $observer
     * @return $this
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $quote = $observer->getQuote();
        $ExtrafeeFee = $quote->getFlatfee();
        if (!$ExtrafeeFee) {
            return $this;
        }
        //Set fee data to order
        $order = $observer->getOrder();
        $order->setFlatfee($ExtrafeeFee);
        
		return $this;
    }
}

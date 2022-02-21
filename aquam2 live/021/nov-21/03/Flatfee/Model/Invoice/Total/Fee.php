<?php

namespace Askantech\Flatfee\Model\Invoice\Total;

use Magento\Sales\Model\Order\Invoice\Total\AbstractTotal;

class Fee extends AbstractTotal
{
    /**
     * @param \Magento\Sales\Model\Order\Invoice $invoice
     * @return $this
     */
    public function collect(\Magento\Sales\Model\Order\Invoice $invoice)
    {
        $invoice->setFlatfee(0);
        
        $amount = $invoice->getOrder()->getFlatfee();
        $invoice->setFlatfee($amount);
       

        $invoice->setGrandTotal($invoice->getGrandTotal() + $invoice->getFlatfee());
        $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $invoice->getFlatfee());

        return $this;
    }
}

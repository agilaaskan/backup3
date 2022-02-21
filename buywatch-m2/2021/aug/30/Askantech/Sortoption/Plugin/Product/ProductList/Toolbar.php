<?php
namespace Askantech\Sortoption\Plugin\Product\ProductList;

class Toolbar
{
	public function aroundSetCollection(
    	\Magento\Catalog\Block\Product\ProductList\Toolbar $subject,
    	\Closure $proceed,
    	$collection
	) {
    	$currentOrder = $subject->getCurrentOrder();
    	if ($currentOrder == "created_at") {
        	$dir = $subject->getCurrentDirection();
            $collection->getSelect()->order('created_at'); // you can add filter as per your requirement.
    	}
    	return $proceed($collection);
	}
}


<?php
namespace Askantech\Sortoption\Plugin;

class Config
{
    public function afterGetAttributeUsedForSortByArray(\Magento\Catalog\Model\Config $catalogConfig, $options)
    {
        $optionsnew = ['created_at' => __('Latest')];
    	$options = array_merge($options, $optionsnew);
    	return $options;
    }
}

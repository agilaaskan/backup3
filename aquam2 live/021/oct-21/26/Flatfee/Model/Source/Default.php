<?php

namespace Askantech\Flatfee\Model\Source;

use Magento\User\Model\ResourceModel\User\CollectionFactory as UserCollectionFactory;

class Categories implements \Magento\Framework\Option\ArrayInterface
{
    protected $_userFactory;

    public function __construct(
        UserCollectionFactory $userFactory
    ) {
        $this->_userFactory = $userFactory;
    }

    public function getOptionArray()
    {
        $adminUsers = $this->_userFactory->create();
        $options = [];
        return $options;
    
        // you can add this way also
        $options[] = [
            'value' => 0,
            'label' => "Please Select Category"
        ];
        return $options;
        
    }

    public function getAllOptions()
    {
        $res = $this->getOptions();
        array_unshift($res, ['value' => '', 'label' => '']);
        return $res;
    }

    public function getOptions()
    {
        $res = [];
        foreach ($this->getOptionArray() as $index => $value) {
            $res[] = ['value' => $index, 'label' => $value];
        }
        return $res;
    }

    public function toOptionArray()
    {
        return $this->getOptions();
    }
}
<?php

namespace Deepak\Mage2RIWA\Model\ResourceModel;

class Pizza extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected $_idFieldName = 'entity_id';

    protected function _construct()
    {
        $this->_init('deepak_mage2riwa_pizza','entity_id');
    }
}

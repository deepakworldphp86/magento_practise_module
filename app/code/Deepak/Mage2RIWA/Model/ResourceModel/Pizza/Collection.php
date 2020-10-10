<?php

namespace Deepak\Mage2RIWA\Model\ResourceModel\Pizza;

use \Deepak\Mage2RIWA\Model\ResourceModel\AbstractCollection;

class Collection extends AbstractCollection {

    protected $_idFieldName = 'entity_id';

    public function _construct() {
        $this->_init(\Deepak\Mage2RIWA\Model\Pizza::class, \Deepak\Mage2RIWA\Model\ResourceModel\Pizza::class);
        $this->_map['fields']['entity_id'] = 'main_table.entity_id';
    }

}

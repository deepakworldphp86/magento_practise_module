<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Deepak\Mage2RIWA\Model\OptionsModel\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class City Dropdown.
 */
class ToppingOption implements OptionSourceInterface {

    /**
     * @var array
     */
    protected $options;
   
    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray() {

        foreach ($this->sizeArray() as $key => $value) {
            $options[] = ['label' => $value, 'value' => $key];
        }
        return $options;
    }
    
    public function sizeArray(){
        
        return ['tomato'=>'Tomato','capsicum'=>'Capsicum','corn'=>'Corn'];
    }

}

<?php

/**
 *
 * @category  Embitel
 * @package   Embitel_Adds
 * @author    Deepak Kumar <deepak.kumar@embitel.com>
 * @copyright 2019 Embitel technologies (I) Pvt. Ltd
 */

namespace Deepak\Mage2RIWA\Block\Adminhtml\Pizza;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class SaveButton
 * @package Magento\Customer\Block\Adminhtml\Edit
 */
class SaveButton extends GenericButton implements ButtonProviderInterface {

    /**
     * @return array
     */
    public function getButtonData() {
        return [
            'label' => __('Save'),
            'class' => 'save primary',
            //'on_click' => sprintf("location.href = '%s';", $this->getSaveUrl()),
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }

    /**
     * @return string
     */
    public function getSaveUrl() {
        return $this->getUrl('pizza/pizza/save');
    }

}

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
 * Class SaveAndContinueButton
 */
class SaveAndContinueButton extends GenericButton implements ButtonProviderInterface {

    /**
     * @return array
     */
    public function getButtonData() {
        return [
            'label' => __('Save and Continue Edit'),
            'class' => 'save',
            //'onclick' => 'setLocation(\'' . $this->getSaveUrl() . '\')',
            'data_attribute' => [
                'mage-init' => [
                    'button' => ['event' => 'saveAndContinueEdit'],
                ],
            ],
            'sort_order' => 80,
        ];
    }

    /**
     * @return string
     */
    public function getSaveUrl() {
        return $this->getUrl('pizza/pizza/save');
    }

}

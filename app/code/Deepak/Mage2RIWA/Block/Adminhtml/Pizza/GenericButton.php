<?php

/**
 *
 * @category  Embitel
 * @package   Embitel_Adds
 * @author    Deepak Kumar <deepak.kumar@embitel.com>
 * @copyright 2019 Embitel technologies (I) Pvt. Ltd
 */

namespace Deepak\Mage2RIWA\Block\Adminhtml\Pizza;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Registry;

/**
 * Class GenericButton
 */
class GenericButton
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var Registry
     */
    private $registry;

    /**
     * @param Context $context
     * @param Registry $registry
     */
    public function __construct(
        Context $context,
        Registry $registry
    )
    {
        $this->context = $context;
        $this->registry = $registry;
    }

    /**
     * Return Current Adds ID
     *
     * @return int|null
     */
    public function getId()
    {
        $adds = $this->registry->registry('pizza_data');
        return $adds ? $adds->getId() : null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}

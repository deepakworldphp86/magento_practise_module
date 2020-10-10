<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Deepak\Catalog\Block\Product;

use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Catalog\Model\Layer\Resolver;
use Magento\Framework\Data\Helper\PostHelper;
use Magento\Framework\Url\Helper\Data;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface as LocaleDate;

/**
 * 
 * @author deepak
 *
 */
class ListProduct extends \Magento\Catalog\Block\Product\ListProduct
{


    /**
     * 
     * @param \Magento\Catalog\Block\Product\Context $context
     * @param PostHelper $postDataHelper
     * @param Resolver $layerResolver
     * @param CategoryRepositoryInterface $categoryRepository
     * @param Data $urlHelper
     * @param LocaleDate $localeDate
     * @param \Magento\Framework\Pricing\Helper\Data $priceHelper
     * @param array $data
     */
   
    public function __construct(\Magento\Catalog\Block\Product\Context $context, PostHelper $postDataHelper, Resolver $layerResolver, CategoryRepositoryInterface $categoryRepository, Data $urlHelper, LocaleDate $localeDate, \Magento\Framework\Pricing\Helper\Data $priceHelper, array $data = [])
    {
        $this->_catalogLayer = $layerResolver->get();
        $this->_postDataHelper = $postDataHelper;
        $this->categoryRepository = $categoryRepository;
        $this->urlHelper = $urlHelper;
        $this->localeDate = $localeDate;
        $this->_priceHelper = $priceHelper;
        parent::__construct($context, $postDataHelper, $layerResolver, $categoryRepository, $urlHelper, $data);

    }
    
    /**
     * 
     * @param  number $price
     * @return number|string
     */
    public function getFormatedPrice($price)
    {
        return $this->_priceHelper->currency($price, true, false);
    }

    /**
     * 
     * @return string
     */

    public function getLoadedProductSkus()
    {
        $loadedCollection = $this->getLoadedProductCollection()->getData();
        $skus = array();
        if ($this->getLoadedProductCollection()->getSize()) {
            foreach ($loadedCollection as $collection) {
                array_push($skus, $collection['sku']);
            }
            return json_encode($skus);
        }
    }
}

<?php

// Price Data ajax controller
namespace Deepak\Catalog\Controller\Price;

use \Magento\Framework\Pricing\Helper\Data;
use \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;

class GetData extends \Magento\Framework\App\Action\Action
{

    protected $_resultJsonFactory;
    protected $_priceHelper;

    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context, 
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        CollectionFactory $collectionFactory,
        Data $priceHelper
        )
    {
        $this->_resultJsonFactory = $resultJsonFactory;
        $this->_priceHelper = $priceHelper;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    /**
     * Execute view action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = [];
        $skus = $this->getRequest()->getParam('skus');
        if($skus){
        $productCollection = $this->collectionFactory->create();
        $productCollection->addAttributeToSelect('*');
        $productCollection->addAttributeToFilter( 'sku', array( 'in' => $skus ) );
        $collection = $productCollection->load();
            foreach ($collection as $product){
                $data[$product->getSku()] = $this->_priceHelper->currency($product->getFinalPrice(), true, false);
            }  
        }
        $response = $this->_resultJsonFactory->create();
        $response->setData($data);
        return $response;
    }

   
}

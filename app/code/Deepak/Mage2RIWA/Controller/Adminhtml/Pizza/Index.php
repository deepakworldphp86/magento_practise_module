<?php

/**
 *
 * @category  Deepak
 * @package   Deepak_Mage2RIWA
 * @author    Deepak Kumar <deepak.kumar@embitel.com>
 * @copyright 2019 Embitel technologies (I) Pvt. Ltd
 */

namespace Deepak\Mage2RIWA\Controller\Adminhtml\Pizza;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 * @package Deepak\Mage2RIWA\Controller\Adminhtml\Pizza
 */
class Index extends Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    )
    {
    	echo 'test';exit;
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }


    /**
     * To check permissions
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Deepak_Mage2RIWA::manage_pizza');
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
       
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Deepak_Mage2RIWA::manage_pizza');
        $resultPage->addBreadcrumb(__('Pizza'), __('Pizza'));
        $resultPage->addBreadcrumb(__('Manage Pizza'), __('Manage Pizza'));
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Pizza'));

        return $resultPage;
    }
}

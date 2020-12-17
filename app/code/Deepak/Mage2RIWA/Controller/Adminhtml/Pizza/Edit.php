<?php
/**
 *
 * @category  Deepak
 * @package   Deepak_Pizza
 * @author    Deepak Kumar <deepak.kumar@deepak.com>
 * @copyright 2019 Deepak technologies (I) Pvt. Ltd
 */


namespace Deepak\Mage2RIWA\Controller\Adminhtml\Pizza;

use Magento\Backend\App\Action;

class Edit extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Deepak_Mage2RIWA::manage_pizza';

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    protected $pizzaFactory;
    /**
     * @param Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Registry $registry
     */
    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry,
        \Deepak\Mage2RIWA\Model\PizzaFactory $pizzaFactory
    ) {
        $this->pizzaFactory = $pizzaFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        parent::__construct($context);
    }

    /**
     * Init actions
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function _initAction()
    {
        // load layout, set active menu and breadcrumbs
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Deepak_Mage2RIWA::manage_pizza')
            ->addBreadcrumb(__('Pizza'), __('Pizza'))
            ->addBreadcrumb(__('Manage Pizza'), __('Manage Pizza'));
        return $resultPage;
    }

    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('entity_id');
        $model = $this->pizzaFactory->create();

        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This pizza no longer exists.'));
                /** \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $this->_coreRegistry->register('pizza_data', $model);

        // 5. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $id ? __('Edit Pizza') : __('New Pizza'),
            $id ? __('Edit Pizza') : __('New Pizza')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Pizza'));
        $resultPage->getConfig()->getTitle()
            ->prepend($model->getId() ? $model->getTitle() : __('New Pizza'));

        return $resultPage;
    }
}

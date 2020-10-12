<?php
/**
 *
 * @category  Deepak
 * @package   Deepak_Mage2RIWA
 * @author    Deepak Kumar <deepak.kumar@embitel.com>
 * @copyright 2020 Deepak Kumar Individuals
 */

namespace Deepak\Mage2RIWA\Controller\Adminhtml\Pizza;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Deepak_Mage2RIWA::manage_pizza');
    }

    /**
     * Delete action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('entity_id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            $title = "";
            try {
                // init model and delete
                $model = $this->_objectManager->create('Deepak\Mage2RIWA\Model\Pizza');
                $model->load($id);
                $name = $model->getName();
                $model->delete();
                // display success message
                $this->messageManager->addSuccess(__('The Pizza has been deleted.'));
                // go to grid
                $this->_eventManager->dispatch(
                    'adminhtml_pizza_on_delete',
                    ['name' => $name, 'status' => 'success']
                );
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->_eventManager->dispatch(
                    'adminhtml_pizza_on_delete',
                    ['name' => $name, 'status' => 'fail']
                );
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['entity_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addError(__('We can\'t find a Pizza to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}

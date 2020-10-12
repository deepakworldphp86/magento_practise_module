<?php

namespace Deepak\Mage2RIWA\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Deepak\Mage2RIWA\Api\Data\PizzaInterface;

interface PizzaRepositoryInterface
{
    /**
     * @param int $id
     * @return \Deepak\Mage2RIWA\Api\Data\PizzaInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);
    
    /**
     * @param \Deepak\Mage2RIWA\Api\Data\PizzaInterface $Pizza
     * @return \Deepak\Mage2RIWA\Api\Data\PizzaInterface
     */
    public function save(PizzaInterface $Pizza);
    
    /**
     * @param \Deepak\Mage2RIWA\Api\Data\PizzaInterface $Pizza
     * @return void
     */
    public function delete(PizzaInterface $Pizza);
    
    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Deepak\Mage2RIWA\Api\Data\PizzaSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
<?php
namespace Deepak\Mage2RIWA\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;


interface PizzaSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Deepak\Mage2RIWA\Api\Data\PizzaInterface[]
     */
    public function getItems();
    
    /**
     * @param \Deepak\Mage2RIWA\Api\Data\PizzaInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}


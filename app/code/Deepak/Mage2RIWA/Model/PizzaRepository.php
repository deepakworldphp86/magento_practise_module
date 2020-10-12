<?php
 
namespace Deepak\Mage2RIWA\Model;
 
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;
use Deepak\Mage2RIWA\Api\Data\PizzaInterface;
use Deepak\Mage2RIWA\Api\Data\PizzaSearchResultInterface;
use Deepak\Mage2RIWA\Api\Data\PizzaSearchResultInterfaceFactory;
use Deepak\Mage2RIWA\Api\PizzaRepositoryInterface;
use Deepak\Mage2RIWA\Model\ResourceModel\Pizza\CollectionFactory as PizzaCollectionFactory;
use Deepak\Mage2RIWA\Model\ResourceModel\Pizza\Collection;
 
class PizzaRepository implements PizzaRepositoryInterface
{
    /**
     * @var PizzaFactory
     */
    private $pizzaFactory;
 
    /**
     * @var PizzaCollectionFactory
     */
    private $pizzaCollectionFactory;
 
    /**
     * @var PizzaSearchResultInterfaceFactory
     */
    private $searchResultFactory;
 
    public function __construct(
        PizzaFactory $pizzaFactory,
        PizzaCollectionFactory $pizzaCollectionFactory,
        PizzaSearchResultInterfaceFactory $pizzaSearchResultInterfaceFactory
    ) {
        $this->pizzaFactory = $pizzaFactory;
        $this->pizzaCollectionFactory = $pizzaCollectionFactory;
        $this->searchResultFactory = $pizzaSearchResultInterfaceFactory;
    }
 
    // ... getById, save and delete methods listed above ...
    
    
    
	    public function getById($id)
	{
	    $pizza = $this->pizzaFactory->create();
	    $pizza->getResource()->load($pizza, $id);
	    if (! $pizza->getId()) {
		throw new NoSuchEntityException(__('Unable to find pizza with ID "%1"', $id));
	    }
	    return $pizza;
	}
 
	public function save(PizzaInterface $pizza)
	{
	    $pizza->getResource()->save($pizza);
	    return $pizza;
	}
 
	public function delete(PizzaInterface $pizza)
	{
	    $pizza->getResource()->delete($pizza);
	}
 
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();
 
        $this->addFiltersToCollection($searchCriteria, $collection);
        $this->addSortOrdersToCollection($searchCriteria, $collection);
        $this->addPagingToCollection($searchCriteria, $collection);
 
        $collection->load();
 
        return $this->buildSearchResult($searchCriteria, $collection);
    }
 
    private function addFiltersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $fields[] = $filter->getField();
                $conditions[] = [$filter->getConditionType() => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
    }
 
    private function addSortOrdersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ((array) $searchCriteria->getSortOrders() as $sortOrder) {
            $direction = $sortOrder->getDirection() == SortOrder::SORT_ASC ? 'asc' : 'desc';
            $collection->addOrder($sortOrder->getField(), $direction);
        }
    }
 
    private function addPagingToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->setCurPage($searchCriteria->getCurrentPage());
    }
 
    private function buildSearchResult(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $searchResults = $this->searchResultFactory->create();
 
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
 
        return $searchResults;
    }
}

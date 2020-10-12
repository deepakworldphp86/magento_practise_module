<?php

namespace Deepak\Mage2RIWA\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface PizzaInterface extends ExtensibleDataInterface
{
    /**
     * @return int
     */
    public function getId();
    
    /**
     * @param int $id
     * @return void
     */
    public function setId($id);
    
    /**
     * @return string
     */
    public function getName();
    
    /**
     * @param string $name
     * @return void
     */
    public function setName($name);
    
    /**
     * @return \Deepak\Mage2RIWA\Api\Data\IngredientInterface[]
     */
    public function getIngredients();
    
    /**
     * @param \Deepak\Mage2RIWA\Api\Data\IngredientInterface[] $ingredients
     * @return void
     */
    public function setIngredients(array $ingredients);
    
    /**
     * @return string[]
     */
    public function getImageUrls();
    
    /**
     * @param string[] $urls
     * @return void
     */
    public function setImageUrls(array $urls);
    
    /**
     * @return \Deepak\Mage2RIWA\Api\Data\PizzaExtensionInterface|null
     */
    public function getExtensionAttributes();
    
    /**
     * @param \Deepak\Mage2RIWA\Api\Data\PizzaExtensionInterface $extensionAttributes
     * @return void
     */
    public function setExtensionAttributes(PizzaExtensionInterface $extensionAttributes);
}
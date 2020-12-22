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
     * Get Pizza Name 
     * @return string|null
     */
    public function getPizzaName();
    
    /**
     * set Pizza Name 
     * @param string $title
     * @return \Deepak\Mage2RIWA\Api\Data\IngredientInterface
     */
    public function setPizzaName($name);
    
    /**
     * Get Ingredients 
     * @return string|null
     */
    public function getIngredients();
    
    /**
     * set Ingredients
     * @param string $ingredients
     * @return \Deepak\Mage2RIWA\Api\Data\IngredientInterface
     */
    public function setIngredients($ingredients);
    
    /**
     * Get Image 
     * @return string|null
     */
    public function getImage();
    
    /**
     * set Image
     * @param string $image
     * @return \Deepak\Mage2RIWA\Api\Data\IngredientInterface
     */
    public function setImage($urls);
    
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
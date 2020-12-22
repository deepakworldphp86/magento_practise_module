<?php

namespace Deepak\Mage2RIWA\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Deepak\Mage2RIWA\Api\Data\PizzaExtensionInterface;
use Deepak\Mage2RIWA\Api\Data\PizzaInterface;

class Pizza extends AbstractExtensibleModel implements PizzaInterface {

    const PIZZA_NAME = 'pizza_name';
    const INGREDIENTS = 'ingredients';
    const IMAGE = 'image';
    const CACHE_TAG = 'dk_pizza';

    protected function _construct() {
        $this->_init(ResourceModel\Pizza::class);
    }

    public function getIdentities() {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get Pizza Name 
     * @return string|null
     */
    public function getPizzaName() {
        return $this->_getData(self::PIZZA_NAME);
    }

    /**
     * @api
     * @param string $pizza_name 
     * @return \Deepak\Mage2RIWA\Model\Pizza 
     */
    public function setPizzaName($pizza_name) {
        $this->setData(self::PIZZA_NAME,$pizza_name);
    }

    /**
     * Get Ingredients 
     * @return string|null
     */
    public function getIngredients() {
        return $this->_getData(self::INGREDIENTS);
    }

    /**
     * set Ingredients
     * @param string $ingredients
     * @return \Deepak\Mage2RIWA\Model\Pizza 
     */
    public function setIngredients($ingredients) {
        $this->setData(self::INGREDIENTS, $ingredients);
    }

    /**
     * Get Image 
     * @return string|null
     */
    public function getImage() {
        $this->_getData(self::IMAGE);
    }
    
    /**
     * set Image
     * @param string $image
     * @return \Deepak\Mage2RIWA\Model\Pizza 
     */

    public function setImage($urls) {
        $this->setData(self::IMAGE, $urls);
    }

    public function getExtensionAttributes() {
        return $this->_getExtensionAttributes();
    }

    public function setExtensionAttributes(PizzaExtensionInterface $extensionAttributes) {
        $this->_setExtensionAttributes($extensionAttributes);
    }

}

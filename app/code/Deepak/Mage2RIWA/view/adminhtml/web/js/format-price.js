/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


define([
  'Magento_Ui/js/form/element/abstract',
  'Magento_Catalog/js/price-utils'
], function (Element, priceUtils) {
  'use strict';

  return Element.extend({
    defaults: {
      'defaultText': '',
    },
    setInitialValue: function() {
      this._super();
      var self = this;

      self.setFormatPrice(self.initialValue);
      return this;
    },

    setFormatPrice: function(value) {
      var price = (value) ? priceUtils.formatPrice(value) : this.defaultText;
      this.initialValue = price;
      this.value._latestValue = price;

      return this;
    }
  });
});
define([
    'ko',
    'uiComponent',
    'Magento_Checkout/js/model/quote',
    'Magento_Catalog/js/price-utils',
    'Magento_Checkout/js/model/totals'

], function (ko, Component, quote, priceUtils, totals) {
    'use strict';
    var show_hide_Flatfee_blockConfig = window.checkoutConfig.show_hide_Flatfee_block;
    var flatfee_label = window.checkoutConfig.flatfee_label;
    var flat_fee_amount = window.checkoutConfig.flat_fee_amount;
    console.log(show_hide_Flatfee_blockConfig);
    return Component.extend({

        totals: quote.getTotals(),
        canVisibleExtrafeeBlock: show_hide_Flatfee_blockConfig,
        getFormattedPrice: ko.observable(priceUtils.formatPrice(flat_fee_amount, quote.getPriceFormat())),
        getFlatFeeLabel:ko.observable(flatfee_label),
        isDisplayed: function () {
            return this.getValue() != 0;
        },
        getValue: function() {
            var price = 0;
            if (this.totals() && totals.getSegment('flatfee') && (show_hide_Flatfee_blockConfig == true)) {
                price = totals.getSegment('flatfee').value;
            }
            return price;
        }
    });
});

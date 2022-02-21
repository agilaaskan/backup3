define([
        'ko',
        'uiComponent',
        'Magento_Checkout/js/model/quote',
        'Magento_Catalog/js/price-utils'

    ], function (ko, Component, quote, priceUtils) {
        'use strict';
        var show_hide_Extrafee_blockConfig = window.checkoutConfig.show_hide_Flatfee_shipblock;
        var flatfee_label = window.checkoutConfig.flatfee_label;         
        var flat_fee_amount = window.checkoutConfig.flat_fee_amount;
        
        return Component.extend({
            defaults: {
                template: 'Askantech_Flatfee/checkout/shipping/custom-fee'
            },
            canVisibleExtrafeeBlock: show_hide_Extrafee_blockConfig,
            getFormattedPrice: ko.observable(priceUtils.formatPrice(flat_fee_amount, quote.getPriceFormat())),
            getFlatFeeLabel:ko.observable(flatfee_label)
        });
    });

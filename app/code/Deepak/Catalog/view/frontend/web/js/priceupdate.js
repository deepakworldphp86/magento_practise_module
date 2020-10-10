define([
        'jquery',
        "mage/url"

    ],
    function($, urlBuilder) {
        return function(config) {
		
        var listskus = config.listskus;
	    var price = [];
	    var priceArray;
            var DealUrl = urlBuilder.build("/catalog/price/getdata");
            if (listskus.length > 0) {
                var i = 0;
                $.ajax({
                    type: "POST",
                    url: DealUrl,
                    data: {
                        skus: listskus
                    },
                    cache: false,
                    async: false,
                    success: function(result) {
			            if (result) {
							for (const [key, value] of Object.entries(result)) {
								$('#product-price-'+key).html(value);
							}
                        }
                    }
                });

            }
        };
    });
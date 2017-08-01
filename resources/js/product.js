$(function () {

    // Listen for option changes.
    $('[data-toggle="configuration"]').on('change', function () {

        var $form = $(this).closest('form');
        var $options = $form.find('[data-toggle="configuration"]');

        $.getJSON(
            '/api/products/configuration',
            {
                'product': $form.find('input[name="product"]').val(),
                'option_values': $options.map(function () {
                    return $(this).val();
                }).get()
            },
            function (data) {

                // Write values.
                $('[data-configuration-sku]').text(data.sku);
                $('[data-configuration-price]').text(data.price);
            }
        );
    });

    // Check for initial hash.
    var hash = window.location.href.split('#')[1];

    if (hash !== 'undefined') {
        $('[data-toggle="configuration"]:first-of-type').trigger('change');
    }
});

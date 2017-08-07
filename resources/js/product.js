$(function () {

    // Listen for option changes.
    $('[data-toggle="configuration"]').on('change', function () {

        var $form = $(this).closest('form');
        var $options = $form.find('[data-toggle="configuration"]');

        var hash = $options.map(function () {
            return $(this).val();
        }).get().sort().join('-');

        var configuration = PRODUCT[hash];

        if (typeof configuration == 'undefined') {

            alert('Not available.');

            $form.find('button').prop('disabled', true);

            history.pushState("", document.title, window.location.href.replace(/\#(.+)/, '').replace(/http(s?)\:\/\/([^\/]+)/, ''));

            return false;
        }

        $form.find('button').prop('disabled', false);

        $('[data-configuration-sku]').text(configuration.sku);
        $('[data-configuration-price]').text(configuration.price);

        $form.attr('action', configuration.add_to_cart);

        window.location.hash = configuration.sku;
    });

    // Check for initial hash.
    var hash = window.location.href.split('#')[1];

    if (hash !== 'undefined') {

        for (var configuration in PRODUCT) {

            if (PRODUCT[configuration].sku == hash) {

                configuration = configuration.split('-');

                var i = 0;

                $('[data-toggle="configuration"]').each(function (i) {

                    $(this).val(configuration[i]);

                    i++;
                });
            }
        }
    }
});

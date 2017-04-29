<?php namespace Anomaly\ProductsModule\Brand\Form;

use Anomaly\ProductsModule\Brand\Contract\BrandInterface;

/**
 * Class BrandFormButtons
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class BrandFormButtons
{

    /**
     * Handle the buttons.
     *
     * @param BrandFormBuilder $builder
     */
    public function handle(BrandFormBuilder $builder)
    {
        $builder->setButtons(
            [
                'cancel',
                'view' => [
                    'enabled' => 'edit',
                    'target'  => '_blank',
                    'href'    => function (BrandInterface $entry) {
                        return $entry->route('view');
                    },
                ],
            ]
        );
    }
}

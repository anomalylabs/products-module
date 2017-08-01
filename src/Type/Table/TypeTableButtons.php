<?php namespace Anomaly\ProductsModule\Type\Table;

use Anomaly\ProductsModule\Type\Contract\TypeInterface;

/**
 * Class TypeTableButtons
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TypeTableButtons
{

    /**
     * Handle the buttons.
     *
     * @param TypeTableBuilder $builder
     */
    public function handle(TypeTableBuilder $builder)
    {
        $builder->setButtons(
            [
                'edit',
                'assignments' => [
                    'href' => function (TypeInterface $entry) {
                        return '/admin/products/types/assignments/' . $entry->getEntryStreamId();
                    },
                ],
            ]
        );
    }
}

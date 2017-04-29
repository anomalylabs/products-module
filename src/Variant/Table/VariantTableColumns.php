<?php namespace Anomaly\ProductsModule\Variant\Table;

use Anomaly\ProductsModule\Modifier\Contract\ModifierInterface;
use Anomaly\ProductsModule\Modifier\Contract\ModifierRepositoryInterface;
use Anomaly\ProductsModule\Variant\Contract\VariantInterface;

/**
 * Class VariantTableColumns
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class VariantTableColumns
{

    /**
     * Handle the columns.
     *
     * @param VariantTableBuilder $builder
     */
    public function handle(VariantTableBuilder $builder)
    {
        $product = $builder->getProduct();

        $builder->setColumns(
            [
                'entry.images.first().preview' => [
                    'heading' => 'anomaly.module.products::field.variant.name',
                ],
                'name'                         => [
                    'sort_column' => 'name',
                    'wrapper'     => '
                    <strong>{value.name}</strong>
                    <br>
                    <small class="text-muted">{value.sku}</small>
                    <br>
                    <span>{value.tags}</span>',
                    'value'       => [
                        'sku'  => 'entry.sku',
                        'name' => 'entry.product.name',
                        'tags' => 'entry.tags.labels("tag-info")|join',
                    ],
                ],
                'price'                        => [
                    'value' => '{{ currency_format(entry.regular_price) }}',
                ],
            ]
        );

        /* @var ModifierInterface $modifier */

        //$modifiers = $product->getModifiers();
        $modifiers = app(ModifierRepositoryInterface::class)->all();

        foreach ($modifiers as $modifier) {
            $builder->addColumn(
                [
                    'heading' => $modifier->getName(),
                    'value'   => function (VariantInterface $entry) use ($modifier) {

                        if ($option = $entry->getOption($modifier)) {
                            return $option->getName();
                        }

                        return '--';
                    },
                ]
            );
        }
    }
}

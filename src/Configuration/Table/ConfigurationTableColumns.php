<?php namespace Anomaly\ProductsModule\Configuration\Table;

use Anomaly\ProductsModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\ProductsModule\OptionValue\Contract\OptionValueInterface;

class ConfigurationTableColumns
{

    public function handle(ConfigurationTableBuilder $builder)
    {
        $builder->setColumns(
            [
                'entry.images.first().preview' => [
                    'heading' => 'anomaly.module.products::field.configuration.name',
                ],
                'name'                         => [
                    'sort_column' => 'sku',
                    'wrapper'     => '
                    <strong>{value.name}</strong>
                    <br>
                    <small class="text-muted">{value.sku}</small>
                    <br>
                    <span>{value.tags}</span>',
                    'value'       => [
                        'sku'  => 'entry.sku',
                        'name' => 'entry.product.name',
                        'tags' => 'entry.product.tags.labels("tag-info")|join',
                    ],
                ],
                'options'                      => [
                    'value' => function (ConfigurationInterface $entry) {
                        return implode(
                            ' ',
                            array_map(
                                function (OptionValueInterface $option) {
                                    return '<span class="tag tag-sm tag-info">' . $option->getLabel() . '</span>';
                                },
                                $entry->getOptionValues()->all()
                            )
                        );
                    },
                ],
                'price'                        => [
                    'value' => 'entry.regular_price.currency',
                ],
            ]
        );
    }
}

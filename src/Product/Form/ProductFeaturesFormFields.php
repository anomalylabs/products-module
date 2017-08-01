<?php namespace Anomaly\ProductsModule\Product\Form;

use Anomaly\ProductsModule\Feature\Contract\FeatureInterface;
use Anomaly\ProductsModule\Feature\Contract\FeatureRepositoryInterface;

/**
 * Class ProductFeaturesFormFields
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProductFeaturesFormFields
{

    /**
     * Handle the fields.
     *
     * @param ProductFeaturesFormBuilder $builder
     * @param FeatureRepositoryInterface $features
     */
    public function handle(ProductFeaturesFormBuilder $builder, FeatureRepositoryInterface $features)
    {
        $fields = [];
        $values = [];

        if ($product = $builder->getProduct()) {
            $values = $product->getFeatureValues()->pluck('id', 'feature_id')->all();
        }

        /* @var FeatureInterface $feature */
        foreach ($features->all() as $feature) {

            $builder->skipField('feature_' . $feature->getId());

            $fields[] = [
                'label'  => $feature->getName(),
                'field'  => 'value_' . $feature->getId(),
                'type'   => 'anomaly.field_type.select',
                'value'  => array_get($values, $feature->getId()),
                'config' => [
                    'options' => $feature->getValues()->pluck('label', 'id')->all(),
                ],
            ];
        }

        $builder->setFields($fields);
    }
}

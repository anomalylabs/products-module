<?php namespace Anomaly\ProductsModule\FeatureValue;

use Anomaly\ProductsModule\Feature\Contract\FeatureInterface;
use Anomaly\ProductsModule\FeatureValue\Contract\FeatureValueInterface;
use Anomaly\Streams\Platform\Model\Products\ProductsFeatureValuesEntryModel;

/**
 * Class FeatureValueModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class FeatureValueModel extends ProductsFeatureValuesEntryModel implements FeatureValueInterface
{

    /**
     * Get the label.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Get the related feature.
     *
     * @return FeatureInterface
     */
    public function getFeature()
    {
        return $this->feature;
    }

    /**
     * Get the related feature ID.
     *
     * @return int|null
     */
    public function getFeatureId()
    {
        return $this->feature_id;
    }
}

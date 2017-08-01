<?php namespace Anomaly\ProductsModule\FeatureValue\Contract;

use Anomaly\ProductsModule\Feature\Contract\FeatureInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

/**
 * Interface FeatureValueInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface FeatureValueInterface extends EntryInterface
{

    /**
     * Get the label.
     *
     * @return string
     */
    public function getLabel();

    /**
     * Get the related feature.
     *
     * @return FeatureInterface
     */
    public function getFeature();

    /**
     * Get the related feature ID.
     *
     * @return int|null
     */
    public function getFeatureId();

}

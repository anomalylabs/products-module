<?php namespace Anomaly\ProductsModule\Feature;

use Anomaly\ProductsModule\Feature\Contract\FeatureInterface;
use Anomaly\ProductsModule\FeatureValue\FeatureValueModel;
use Anomaly\Streams\Platform\Model\Products\ProductsFeaturesEntryModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class FeatureModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class FeatureModel extends ProductsFeaturesEntryModel implements FeatureInterface
{

    /**
     * The cascaded relations.
     *
     * @var array
     */
    protected $cascades = [
        'feature_values',
    ];

    /**
     * Return the public label.
     *
     * @return string
     */
    public function label()
    {
        if (!$label = $this->getLabel()) {
            return $this->getName();
        }

        return $label;
    }

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
     * Get the name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the related values.
     *
     * @return FeatureCollection
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * Return the values relation.
     *
     * @return HasMany
     */
    public function values()
    {
        return $this->hasMany(FeatureValueModel::class, 'feature_id');
    }
}

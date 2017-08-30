<?php namespace Anomaly\ProductsModule\Option;

use Anomaly\ProductsModule\Option\Contract\OptionInterface;
use Anomaly\ProductsModule\OptionValue\OptionValueModel;
use Anomaly\Streams\Platform\Model\Products\ProductsOptionsEntryModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class OptionModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class OptionModel extends ProductsOptionsEntryModel implements OptionInterface
{

    /**
     * The cascaded relations.
     *
     * @var array
     */
    protected $cascades = [
        'optionValues',
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
     * @return OptionCollection
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
        return $this->hasMany(OptionValueModel::class, 'option_id');
    }
}

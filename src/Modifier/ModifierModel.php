<?php namespace Anomaly\ProductsModule\Modifier;

use Anomaly\ProductsModule\Modifier\Contract\ModifierInterface;
use Anomaly\ProductsModule\Option\OptionCollection;
use Anomaly\ProductsModule\Option\OptionModel;
use Anomaly\Streams\Platform\Model\Products\ProductsModifiersEntryModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class ModifierModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ModifierModel extends ProductsModifiersEntryModel implements ModifierInterface
{

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
     * Get the related options.
     *
     * @return OptionCollection
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Return the options relation.
     *
     * @return HasMany
     */
    public function options()
    {
        return $this->hasMany(OptionModel::class, 'modifier_id');
    }
}

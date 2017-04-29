<?php namespace Anomaly\ProductsModule\Modifier\Contract;

use Anomaly\ProductsModule\Option\OptionCollection;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Interface ModifierInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface ModifierInterface extends EntryInterface
{

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName();

    /**
     * Get the description.
     *
     * @return string
     */
    public function getDescription();

    /**
     * Get the related options.
     *
     * @return OptionCollection
     */
    public function getOptions();

    /**
     * Return the options relation.
     *
     * @return HasMany
     */
    public function options();

}

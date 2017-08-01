<?php namespace Anomaly\ProductsModule\Option\Contract;

use Anomaly\ProductsModule\Option\OptionCollection;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Interface OptionInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface OptionInterface extends EntryInterface
{

    /**
     * Return the public label.
     *
     * @return string
     */
    public function label();

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
     * Get the related values.
     *
     * @return OptionCollection
     */
    public function getValues();

    /**
     * Return the values relation.
     *
     * @return HasMany
     */
    public function values();

}

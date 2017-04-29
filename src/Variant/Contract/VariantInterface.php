<?php namespace Anomaly\ProductsModule\Variant\Contract;

use Anomaly\ProductsModule\Option\Contract\OptionInterface;
use Anomaly\ProductsModule\Option\OptionCollection;
use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

/**
 * Interface VariantInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface VariantInterface extends EntryInterface
{

    /**
     * Get the related product.
     *
     * @return ProductInterface
     */
    public function getProduct();

    /**
     * Get the related options.
     *
     * @return OptionCollection
     */
    public function getOptions();

    /**
     * Get the a related option.
     *
     * @param $identifier
     * @return OptionInterface|null
     */
    public function getOption($identifier);
}

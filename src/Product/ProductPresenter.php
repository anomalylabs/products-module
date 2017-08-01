<?php namespace Anomaly\ProductsModule\Product;

use Anomaly\ProductsModule\Option\OptionPresenter;
use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\Streams\Platform\Entry\EntryPresenter;
use Anomaly\Streams\Platform\Support\Decorator;

/**
 * Class ProductPresenter
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProductPresenter extends EntryPresenter
{

    /**
     * The decorated object.
     *
     * @var ProductInterface
     */
    protected $object;

    /**
     * Catch calls to fields on
     * the product's related entry.
     *
     * @param  string $key
     * @return mixed
     */
    public function __get($key)
    {
        $entry = $this->object->getEntry();

        if ($entry && $entry->hasField($key)) {
            return (New Decorator())->decorate($entry)->{$key};
        }

        $configuration = $this->object->getConfiguration();

        if ($configuration && $configuration->hasField($key)) {
            return (New Decorator())->decorate($configuration)->{$key};
        }

        return parent::__get($key);
    }
}

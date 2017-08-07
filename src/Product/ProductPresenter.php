<?php namespace Anomaly\ProductsModule\Product;

use Anomaly\ProductsModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\Streams\Platform\Entry\EntryPresenter;
use Anomaly\Streams\Platform\Support\Currency;
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
     * The currency utility.
     *
     * @var Currency
     */
    protected $currency;

    /**
     * Create a new ProductPresenter instance.
     *
     * @param ProductInterface $object
     * @param Currency         $currency
     */
    public function __construct(ProductInterface $object, Currency $currency)
    {
        $this->currency = $currency;

        parent::__construct($object);
    }

    /**
     * Return the availability.
     *
     * @return array
     */
    public function availability()
    {
        $availability = [];

        /* @var ConfigurationInterface $configuration */
        foreach ($this->object->getConfigurations() as $configuration) {

            $array['sku']           = $configuration->getSku();
            $array['on_sale']       = $configuration->isOnSale();
            $array['price']         = $this->currency->format($configuration->price());
            $array['sale_price']    = $this->currency->format($configuration->getSalePrice());
            $array['sale_amount']   = $this->currency->format($configuration->getSaleAmount());
            $array['regular_price'] = $this->currency->format($configuration->getRegularPrice());

            $array['add_to_cart'] = $configuration->route('cart.add');

            $availability[implode('-', $configuration->getOptionValueIds())] = $array;
        }

        return $availability;
    }

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

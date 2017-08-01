<?php namespace Anomaly\ProductsModule\Configuration\Command;

use Anomaly\ProductsModule\Configuration\ConfigurationPrice;
use Anomaly\ProductsModule\Configuration\Contract\ConfigurationInterface;

/**
 * Class SetSalePrice
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SetSalePrice
{

    /**
     * The configuration instance.
     *
     * @var ConfigurationInterface
     */
    protected $configuration;

    /**
     * Create a new SetSalePrice instance.
     *
     * @param ConfigurationInterface $configuration
     */
    public function __construct(ConfigurationInterface $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * Handle the command.
     *
     * @param ConfigurationPrice $price
     */
    public function handle(ConfigurationPrice $price)
    {
        $this->configuration->setAttribute('sale_price', $price->calculate($this->configuration));
    }
}

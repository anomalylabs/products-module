<?php namespace Anomaly\ProductsModule\Configuration;

use Anomaly\ProductsModule\Configuration\Contract\ConfigurationInterface;

/**
 * Class ConfigurationPrice
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ConfigurationPrice
{

    /**
     * Calculate the price of the product.
     *
     * @param ConfigurationInterface $configuration
     * @return float
     */
    public function calculate(ConfigurationInterface $configuration)
    {
        $price = $configuration->getRegularPrice();

        if (!$configuration->isOnSale()) {
            return $price;
        }

        $amount = $configuration->getSaleAmount();

        if (starts_with($amount, '-')) {
            return $price - substr($amount, 1);
        }

        if (ends_with($amount, '%')) {
            return $price - ((substr($amount, 0, -1) / 100) * $price);
        }

        return $amount;
    }
}

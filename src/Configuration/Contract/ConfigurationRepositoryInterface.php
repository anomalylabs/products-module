<?php namespace Anomaly\ProductsModule\Configuration\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface ConfigurationRepositoryInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface ConfigurationRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Find a configuration by it's SKU.
     *
     * @param $sku
     * @return ConfigurationInterface|null
     */
    public function findBySku($sku);

}

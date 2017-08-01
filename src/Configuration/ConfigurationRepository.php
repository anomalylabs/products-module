<?php namespace Anomaly\ProductsModule\Configuration;

use Anomaly\ProductsModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\ProductsModule\Configuration\Contract\ConfigurationRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

/**
 * Class ConfigurationRepository
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ConfigurationRepository extends EntryRepository implements ConfigurationRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var ConfigurationModel
     */
    protected $model;

    /**
     * Create a new ConfigurationRepository instance.
     *
     * @param ConfigurationModel $model
     */
    public function __construct(ConfigurationModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find a configuration by it's SKU.
     *
     * @param $sku
     * @return ConfigurationInterface|null
     */
    public function findBySku($sku)
    {
        return $this->where('sku', $sku)->first();
    }
}

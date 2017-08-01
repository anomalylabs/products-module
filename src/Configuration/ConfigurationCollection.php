<?php namespace Anomaly\ProductsModule\Configuration;

use Anomaly\ProductsModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;

/**
 * Class ConfigurationCollection
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ConfigurationCollection extends EntryCollection
{

    /**
     * Find a configuration by option value IDs.
     *
     * @param array $values
     * @return mixed
     */
    public function findByOptionValues(array $values)
    {
        asort($values);

        return $this->first(
            function (ConfigurationInterface $configuration) use ($values) {

                $ids = $configuration->getOptionValueIds();

                asort($ids);

                return $values == $ids;
            }
        );
    }
}

<?php namespace Anomaly\ProductsModule\Configuration;

use Anomaly\ProductsModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\Streams\Platform\Entry\EntryRouter;

/**
 * Class ConfigurationRouter
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ConfigurationRouter extends EntryRouter
{

    /**
     * The entry instance.
     *
     * @var ConfigurationInterface
     */
    protected $entry;

    /**
     * Return the view route.
     *
     * @return string
     */
    public function view()
    {
        return $this->entry
                ->getProduct()
                ->route('view') . '#' . $this->entry->getSku();
    }
}

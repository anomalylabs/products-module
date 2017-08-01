<?php namespace Anomaly\ProductsModule\Product;

use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\Streams\Platform\Entry\EntryRouter;

/**
 * Class ProductRouter
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProductRouter extends EntryRouter
{

    /**
     * The entry instance.
     *
     * @var ProductInterface
     */
    protected $entry;

    /**
     * Make a route.
     *
     * @param                    $route
     * @param  array $parameters
     * @return mixed|null|string
     */
    public function make($route, array $parameters = [])
    {
        if ($route == 'cart.add') {
            return $this->entry
                ->getDefaultConfiguration()
                ->route($route);
        }

        return parent::make($route, $parameters);
    }


}

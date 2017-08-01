<?php namespace Anomaly\ProductsModule\Product\Listener;

use Anomaly\OrdersModule\Item\Contract\ItemInterface;
use Anomaly\OrdersModule\Order\Event\OrderWasCreated;
use Anomaly\ProductsModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\ProductsModule\Configuration\Contract\ConfigurationRepositoryInterface;
use Anomaly\Streams\Platform\Model\EloquentModel;

/**
 * Class DecrementInventory
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class DecrementInventory
{

    /**
     * The configuration repository.
     *
     * @var ConfigurationRepositoryInterface
     */
    protected $configurations;

    /**
     * Create a new DecrementInventory instance.
     *
     * @param ConfigurationRepositoryInterface $configurations
     */
    public function __construct(ConfigurationRepositoryInterface $configurations)
    {
        $this->configurations = $configurations;
    }

    /**
     * Handle the event.
     *
     * @param OrderWasCreated $order
     */
    public function handle(OrderWasCreated $order)
    {
        /* @var ItemInterface $item */
        foreach ($order->getOrder()->getItems() as $item) {

            /* @var ConfigurationInterface|EloquentModel $product */
            if ($product = $item->getProduct() && $product instanceof ConfigurationInterface) {
                $this->configurations->save($product->decrementInventory($item->getQuantity()));
            }
        }
    }
}

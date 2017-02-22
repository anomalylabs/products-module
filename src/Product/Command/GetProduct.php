<?php namespace Anomaly\ProductsModule\Product\Command;

use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\ProductsModule\Product\Contract\ProductRepositoryInterface;
use Anomaly\ProductsModule\Product\ProductPresenter;


/**
 * Class GetProduct
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ProductsModule\Product\Command
 */
class GetProduct
{

    /**
     * The product identifier.
     *
     * @var mixed
     */
    protected $identifier;

    /**
     * Create a new GetProduct instance.
     *
     * @param $identifier
     */
    public function __construct($identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * Handle the command.
     *
     * @param ProductRepositoryInterface $products
     * @return ProductInterface|null
     */
    public function handle(ProductRepositoryInterface $products)
    {
        if (is_numeric($this->identifier)) {
            return $products->find($this->identifier);
        }

        if (is_string($this->identifier)) {
            return $products->findByStrId($this->identifier);
        }

        if ($this->identifier instanceof ProductInterface) {
            return $this->identifier;
        }

        if ($this->identifier instanceof ProductPresenter) {
            return $this->identifier->getObject();
        }

        return null;
    }
}

<?php namespace Anomaly\ProductsModule\Type\Command;

use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\ProductsModule\Product\Contract\ProductRepositoryInterface;
use Anomaly\ProductsModule\Type\Contract\TypeInterface;
use Anomaly\ProductsModule\Type\Contract\TypeRepositoryInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateProducts
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class UpdateProducts
{

    use DispatchesJobs;

    /**
     * The product type instance.
     *
     * @var TypeInterface
     */
    protected $type;

    /**
     * Update a new UpdateProducts instance.
     *
     * @param TypeInterface $type
     */
    public function __construct(TypeInterface $type)
    {
        $this->type = $type;
    }

    /**
     * Handle the command.
     *
     * @param TypeRepositoryInterface $types
     * @param ProductRepositoryInterface $products
     */
    public function handle(TypeRepositoryInterface $types, ProductRepositoryInterface $products)
    {
        /* @var TypeInterface $type */
        if (!$type = $types->find($this->type->getId())) {
            return;
        }

        /* @var ProductInterface $product */
        foreach ($type->getProducts() as $product) {
            $products->save($product->setAttribute('entry_type', $this->type->getEntryModelName()));
        }
    }
}

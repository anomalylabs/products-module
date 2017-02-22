<?php namespace Anomaly\ProductsModule\Product\Command;

use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\ProductsModule\Product\ProductAuthorizer;
use Anomaly\ProductsModule\Product\ProductBreadcrumb;
use Anomaly\ProductsModule\Product\ProductContent;
use Anomaly\ProductsModule\Product\ProductLoader;
use Anomaly\ProductsModule\Product\ProductResponse;


/**
 * Class MakeProductResponse
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ProductsModule\Product\Command
 */
class MakeProductResponse
{

    /**
     * The product instance.
     *
     * @var ProductInterface
     */
    protected $product;

    /**
     * Create a new MakeProductResponse instance.
     *
     * @param ProductInterface $product
     */
    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }

    /**
     * Handle the command.
     *
     * @param ProductLoader     $loader
     * @param ProductResponse   $response
     * @param ProductAuthorizer $authorizer
     * @param ProductBreadcrumb $breadcrumb
     */
    public function handle(
        ProductLoader $loader,
        ProductResponse $response,
        ProductAuthorizer $authorizer,
        ProductBreadcrumb $breadcrumb
    ) {
        $authorizer->authorize($this->product);
        $breadcrumb->make($this->product);
        $loader->load($this->product);

        $response->make($this->product);
    }
}

<?php namespace Anomaly\ProductsModule\Http\Controller;

use Anomaly\ProductsModule\Product\Command\MakeProductResponse;
use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\ProductsModule\Product\Contract\ProductRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;

/**
 * Class ProductsController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProductsController extends PublicController
{

    /**
     * Return an index of existing products.
     *
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function index()
    {
        $this->breadcrumbs->add(
            'anomaly.module.products::breadcrumb.products',
            $this->url->route('anomaly.module.products::products.index')
        );

        $this->breadcrumbs->add(
            'anomaly.module.products::breadcrumb.products',
            $this->url->route('anomaly.module.products::products.index')
        );

        $this->template->set('meta_title', 'anomaly.module.products::breadcrumb.products');

        return $this->view->make('anomaly.module.products::products/index');
    }

    /**
     * Preview a single product.
     *
     * @param ProductRepositoryInterface $products
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function preview(ProductRepositoryInterface $products)
    {
        /* @var ProductInterface $product */
        if (!$product = $products->findByStrId($this->route->getParameter('str_id'))) {
            abort(404);
        }

        $this->dispatch(new MakeProductResponse($product));

        return $product->getResponse();
    }

    /**
     * View a single product.
     *
     * @param ProductRepositoryInterface $products
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function view(ProductRepositoryInterface $products)
    {
        /* @var ProductInterface $product */
        if (!$product = $products->findBySlug($this->route->getParameter('slug'))) {
            abort(404);
        }

        $this->dispatch(new MakeProductResponse($product));

        return $product->getResponse();
    }
}

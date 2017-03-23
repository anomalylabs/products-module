<?php namespace Anomaly\ProductsModule\Http\Controller;

use Anomaly\ProductsModule\Brand\Command\LoadBreadcrumbs;
use Anomaly\ProductsModule\Brand\Command\SetMetadata;
use Anomaly\ProductsModule\Brand\Contract\BrandRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;

/**
 * Class BrandsController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class BrandsController extends PublicController
{

    /**
     * Return an index of brands.
     *
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function index()
    {
        $this->breadcrumbs->add(
            'anomaly.module.products::breadcrumb.store',
            $this->url->route('store::products.index')
        );

        $this->breadcrumbs->add(
            'anomaly.module.products::breadcrumb.brands',
            $this->url->route('anomaly.module.products::brands.index')
        );

        $this->template->set('meta_title', 'anomaly.module.products::breadcrumb.brands');

        return $this->view->make('anomaly.module.products::brands/index');
    }

    /**
     * View tagged products.
     *
     * @param BrandRepositoryInterface $brands
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function view(BrandRepositoryInterface $brands)
    {
        if (!$brand = $brands->findBySlug($this->route->getParameter('slug'))) {
            abort(404);
        }

        $this->breadcrumbs->add(
            'anomaly.module.products::breadcrumb.store',
            $this->url->route('store::products.index')
        );

        $this->dispatch(new LoadBreadcrumbs($brand));
        $this->dispatch(new SetMetadata($brand));

        return $this->view->make('anomaly.module.products::brands/view', compact('brand'));
    }
}

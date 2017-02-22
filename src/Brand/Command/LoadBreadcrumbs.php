<?php namespace Anomaly\ProductsModule\Brand\Command;

use Anomaly\ProductsModule\Brand\Contract\BrandInterface;
use Anomaly\Streams\Platform\Routing\UrlGenerator;
use Anomaly\Streams\Platform\Ui\Breadcrumb\BreadcrumbCollection;

/**
 * Class LoadBreadcrumbs
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class LoadBreadcrumbs
{

    /**
     * The brand instance.
     *
     * @var BrandInterface
     */
    protected $brand;

    /**
     * Create a new LoadBreadcrumbs instance.
     *
     * @param BrandInterface $brand
     */
    public function __construct(BrandInterface $brand)
    {
        $this->brand = $brand;
    }

    /**
     * Handle the command.
     *
     * @param BreadcrumbCollection $breadcrumbs
     * @param UrlGenerator         $url
     * @internal param BreadcrumbCollection $breadcrumb
     */
    public function handle(BreadcrumbCollection $breadcrumbs, UrlGenerator $url)
    {
        $breadcrumbs->add(
            'anomaly.module.products::breadcrumb.brands',
            $url->route('anomaly.module.products::brands.index')
        );

        $breadcrumbs->add(
            $this->brand->getName(),
            $this->brand->route('view')
        );
    }
}

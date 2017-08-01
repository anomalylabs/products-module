<?php namespace Anomaly\ProductsModule\Brand\Command;

use Anomaly\ProductsModule\Brand\Contract\BrandInterface;
use Anomaly\Streams\Platform\Routing\UrlGenerator;
use Anomaly\Streams\Platform\Ui\Breadcrumb\BreadcrumbCollection;
use Anomaly\Streams\Platform\View\ViewTemplate;

/**
 * Class SetMetadata
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SetMetadata
{

    /**
     * The brand instance.
     *
     * @var BrandInterface
     */
    protected $brand;

    /**
     * Create a new SetMetadata instance.
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
     * @param UrlGenerator $url
     * @internal param BreadcrumbCollection $breadcrumb
     */
    public function handle(ViewTemplate $template)
    {
        $template->set('meta_title', $this->brand->getMetaTitle() ?: $this->brand->getName());
        $template->set('meta_description', $this->brand->getMetaDescription() ?: $this->brand->getDescription());
    }
}

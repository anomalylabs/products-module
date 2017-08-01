<?php namespace Anomaly\ProductsModule\Http\Controller;

use Anomaly\ProductsModule\Tag\Command\AddTagBreadcrumb;
use Anomaly\ProductsModule\Tag\Command\AddTagMetaTitle;
use Anomaly\Streams\Platform\Http\Controller\PublicController;

/**
 * Class TagsController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TagsController extends PublicController
{

    /**
     * View tagged products.
     *
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function view()
    {
        $this->breadcrumbs->add(
            'anomaly.module.products::breadcrumb.products',
            $this->url->route('store::products.index')
        );

        $this->dispatch(new AddTagBreadcrumb($this->route->parameter('tag')));
        $this->dispatch(new AddTagMetaTitle($this->route->parameter('tag')));

        return $this->view->make('anomaly.module.products::tags/view');
    }
}

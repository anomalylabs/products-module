<?php namespace Anomaly\ProductsModule\Product;

use Anomaly\EditorFieldType\EditorFieldType;
use Anomaly\EditorFieldType\EditorFieldTypePresenter;
use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\Streams\Platform\Support\Decorator;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;

class ProductContent
{

    /**
     * The view factory.
     *
     * @var Factory
     */
    protected $view;

    /**
     * The decorator utility.
     *
     * @var Decorator
     */
    protected $decorator;

    /**
     * The response factory.
     *
     * @var ResponseFactory
     */
    protected $response;

    /**
     * Create a new ProductContent instance.
     *
     * @param Factory $view
     * @param Decorator $decorator
     * @param ResponseFactory $response
     */
    public function __construct(Factory $view, Decorator $decorator, ResponseFactory $response)
    {
        $this->view      = $view;
        $this->decorator = $decorator;
        $this->response  = $response;
    }

    /**
     * Make the view content.
     *
     * @param ProductInterface $product
     */
    public function make(ProductInterface $product)
    {
        $type = $product->getType();

        /* @var EditorFieldType $layout */
        /* @var EditorFieldTypePresenter $presenter */
        $layout    = $type->getFieldType('layout');
        $presenter = $type->getFieldTypePresenter('layout');

        $product->setContent($this->view->make($layout->getViewPath(), compact('product'))->render());

        /**
         * If the type layout is taking the
         * reigns then allow it to do so.
         *
         * This will let layouts natively
         * extend parent view blocks.
         */
        if (strpos($presenter->content(), '{% extends') !== false) {
            $product->setResponse($this->response->make($product->getContent()));
        }
    }
}

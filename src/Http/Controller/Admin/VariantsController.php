<?php namespace Anomaly\ProductsModule\Http\Controller\Admin;

use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\ProductsModule\Product\Contract\ProductRepositoryInterface;
use Anomaly\ProductsModule\Variant\Form\VariantFormBuilder;
use Anomaly\ProductsModule\Variant\Table\VariantTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class VariantsController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class VariantsController extends AdminController
{

    /**
     * The product repository.
     *
     * @var ProductRepositoryInterface
     */
    protected $products;

    /**
     * Create a new VariantsController instance.
     *
     * @param ProductRepositoryInterface $products
     */
    public function __construct(ProductRepositoryInterface $products)
    {
        $this->products = $products;

        parent::__construct();
    }

    /**
     * Display an index of existing entries.
     *
     * @param VariantTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(VariantTableBuilder $table)
    {
        /* @var ProductInterface $product */
        if ($product = $this->products->find($this->route->parameter('product'))) {
            $table->setProduct($product);
        }

        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param VariantFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(VariantFormBuilder $form)
    {
        /* @var ProductInterface $product */
        if ($product = $this->products->find($this->route->parameter('product'))) {
            $form->setProduct($product);
        }

        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param VariantFormBuilder $form
     * @param                    $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(VariantFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}

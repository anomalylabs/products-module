<?php namespace Anomaly\ProductsModule\Http\Controller\Admin;

use Anomaly\ProductsModule\Configuration\Contract\ConfigurationRepositoryInterface;
use Anomaly\ProductsModule\Configuration\Form\ConfigurationFormBuilder;
use Anomaly\ProductsModule\Entry\Form\EntryFormBuilder;
use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\ProductsModule\Product\Contract\ProductRepositoryInterface;
use Anomaly\ProductsModule\Product\Form\ProductAssemblyFormBuilder;
use Anomaly\ProductsModule\Product\Form\ProductFeaturesFormBuilder;
use Anomaly\ProductsModule\Product\Form\ProductFormBuilder;
use Anomaly\ProductsModule\Product\Form\ProductOptionsFormBuilder;
use Anomaly\ProductsModule\Product\Table\ProductTableBuilder;
use Anomaly\ProductsModule\Type\Contract\TypeInterface;
use Anomaly\ProductsModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class ProductsController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProductsController extends AdminController
{

    /**
     * The type repository.
     *
     * @var TypeRepositoryInterface
     */
    protected $types;

    /**
     * The product repository.
     *
     * @var ProductRepositoryInterface
     */
    protected $products;

    /**
     * The configuration repository.
     *
     * @var ConfigurationRepositoryInterface
     */
    protected $configurations;

    /**
     * Create a new ProductsController instance.
     *
     * @param TypeRepositoryInterface          $types
     * @param ProductRepositoryInterface       $products
     * @param ConfigurationRepositoryInterface $configurations
     */
    public function __construct(
        TypeRepositoryInterface $types,
        ProductRepositoryInterface $products,
        ConfigurationRepositoryInterface $configurations
    ) {
        parent::__construct();

        $this->types          = $types;
        $this->products       = $products;
        $this->configurations = $configurations;
    }

    /**
     * Display an index of existing entries.
     *
     * @param ProductTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ProductTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param ProductAssemblyFormBuilder $builder
     * @param ConfigurationFormBuilder   $configuration
     * @param ProductFormBuilder         $product
     * @param EntryFormBuilder           $entry
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(
        ProductAssemblyFormBuilder $builder,
        ProductFeaturesFormBuilder $features,
        ConfigurationFormBuilder $configuration,
        ProductFormBuilder $product,
        EntryFormBuilder $entry
    ) {
        /* @var TypeInterface $type */
        $type = $this->types->find($this->request->get('type'));

        $product->setType($type);
        $entry->setModel($type->getEntryModel());

        $builder->addForm('entry', $entry);
        $builder->addForm('product', $product);
        $builder->addForm('features', $features);
        $builder->addForm('configuration', $configuration);

        return $builder->render();
    }

    /**
     * Return the modal for choosing a post type.
     *
     * @param  TypeRepositoryInterface $types
     * @return \Illuminate\View\View
     */
    public function choose(TypeRepositoryInterface $types)
    {
        return $this->view->make(
            'module::admin/products/choose',
            [
                'types' => $types->all(),
            ]
        );
    }

    /**
     * Edit an existing entry.
     *
     * @param ProductAssemblyFormBuilder $builder
     * @param ProductFeaturesFormBuilder $features
     * @param ConfigurationFormBuilder   $configuration
     * @param ProductFormBuilder         $product
     * @param EntryFormBuilder           $entry
     * @return \Symfony\Component\HttpFoundation\Response
     * @internal param ProductFormBuilder $form
     */
    public function edit(
        ProductAssemblyFormBuilder $builder,
        ProductFeaturesFormBuilder $features,
        ConfigurationFormBuilder $configuration,
        ProductFormBuilder $product,
        EntryFormBuilder $entry
    ) {
        /* @var ProductInterface $row */
        $row = $this->products->find($this->route->parameter('id'));

        $builder->addForm('entry', $entry->setEntry($row->getEntry()));
        $builder->addForm('product', $product->setEntry($row));
        $builder->addForm('features', $features->setProduct($row));
        $builder->addForm('configuration', $configuration->setEntry($row->getDefaultConfiguration()));

        return $builder->render();
    }

    /**
     * View an entry on the front-end.
     *
     * @param ProductRepositoryInterface $products
     * @param                            $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function view(ProductRepositoryInterface $products, $id)
    {
        /* @var ProductInterface $product */
        $product = $products->find($id);

        if (!$product->isEnabled()) {
            return $this->redirect->to($product->route('preview'));
        }

        return $this->redirect->to($product->route('view'));
    }
}

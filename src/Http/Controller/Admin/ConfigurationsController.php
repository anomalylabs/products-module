<?php namespace Anomaly\ProductsModule\Http\Controller\Admin;

use Anomaly\ProductsModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\ProductsModule\Configuration\Contract\ConfigurationRepositoryInterface;
use Anomaly\ProductsModule\Configuration\Form\ConfigurationAssemblyFormBuilder;
use Anomaly\ProductsModule\Configuration\Form\ConfigurationFormBuilder;
use Anomaly\ProductsModule\Configuration\Form\ConfigurationOptionsFormBuilder;
use Anomaly\ProductsModule\Configuration\Table\ConfigurationTableBuilder;
use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\ProductsModule\Product\Contract\ProductRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class ConfigurationsController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ConfigurationsController extends AdminController
{

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
     * Create a new ConfigurationsController instance.
     *
     * @param ProductRepositoryInterface       $products
     * @param ConfigurationRepositoryInterface $configurations
     */
    public function __construct(ProductRepositoryInterface $products, ConfigurationRepositoryInterface $configurations)
    {
        $this->products       = $products;
        $this->configurations = $configurations;

        parent::__construct();
    }

    /**
     * Display an index of existing entries.
     *
     * @param ConfigurationTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ConfigurationTableBuilder $table)
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
     * @param ConfigurationAssemblyFormBuilder $builder
     * @param ConfigurationFormBuilder         $configuration
     * @param ConfigurationOptionsFormBuilder  $options
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(
        ConfigurationAssemblyFormBuilder $builder,
        ConfigurationFormBuilder $configuration,
        ConfigurationOptionsFormBuilder $options
    ) {
        /* @var ProductInterface $product */
        if ($product = $this->products->find($this->route->parameter('product'))) {
            $options->setProduct($product);
            $configuration->setProduct($product);
        }

        $builder->addForm('configuration', $configuration);
        $builder->addForm('options', $options);

        return $builder->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param ConfigurationAssemblyFormBuilder $builder
     * @param ConfigurationFormBuilder         $configuration
     * @param ConfigurationOptionsFormBuilder  $options
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(
        ConfigurationAssemblyFormBuilder $builder,
        ConfigurationFormBuilder $configuration,
        ConfigurationOptionsFormBuilder $options
    ) {
        /* @var ProductInterface $product */
        if ($product = $this->products->find($this->route->parameter('product'))) {
            $options->setProduct($product);
            $configuration->setProduct($product);
        }

        $configuration->setEntry($this->route->parameter('id'));

        /* @var ConfigurationInterface $row */
        $row = $this->configurations->find($this->route->parameter('id'));

        $builder->addForm('configuration', $configuration);
        $builder->addForm('options', $options->setConfiguration($row));

        return $builder->render();
    }

    /**
     * Redirect to view a configuration.
     *
     * @param ConfigurationRepositoryInterface $configurations
     */
    public function view(ConfigurationRepositoryInterface $configurations)
    {
        /* @var ConfigurationInterface $configuration */
        if (!$configuration = $configurations->find($this->route->parameter('id'))) {
            abort(404);
        }

        return $this->redirect->to($configuration->route('view'));
    }
}

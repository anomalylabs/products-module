<?php namespace Anomaly\ProductsModule\Configuration\Table;

use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class ConfigurationTableBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ConfigurationTableBuilder extends TableBuilder
{

    /**
     * The product instance.
     *
     * @var null|ProductInterface
     */
    protected $product = null;

    /**
     * The table filters.
     *
     * @var array|string
     */
    protected $filters = [
        'sku',
    ];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'edit',
        'view' => [
            'target' => '_blank',
            'href'   => '/admin/products/configurations/view/{entry.id}',
        ],
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete',
        'edit',
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [
        'sortable' => false,
    ];

    /**
     * Fired when ready to build.
     */
    public function onReady()
    {
        if ($product = $this->getProduct()) {

            $this->setOption('sortable', true);

            $this->setOption('title', $product->getName());
            $this->setOption('description', $product->getDescription());
        }
    }

    /**
     * Get the product.
     *
     * @return ProductInterface|null
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set the product.
     *
     * @param ProductInterface $product
     * @return $this
     */
    public function setProduct(ProductInterface $product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Fired when querying table entries.
     *
     * @param Builder $query
     */
    public function onQuerying(Builder $query)
    {
        if ($product = $this->getProduct()) {
            $query->where('product_id', $product->getId());
        }
    }

}

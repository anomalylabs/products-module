<?php namespace Anomaly\ProductsModule\Configuration\Form;

use Anomaly\ProductsModule\Configuration\ConfigurationModel;
use Anomaly\ProductsModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class ConfigurationFormBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ConfigurationFormBuilder extends FormBuilder
{

    /**
     * The product instance.
     *
     * @var null|ProductInterface
     */
    protected $product = null;

    /**
     * Fields to skip.
     *
     * @var array|string
     */
    protected $skips = [
        'values',
        'product',
        'option_values',
    ];

    /**
     * Fired when ready to build.
     */
    public function onReady()
    {
        if ($product = $this->getProduct()) {
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
     * Fired just before saving.
     */
    public function onSaving()
    {
        $entry = $this->getFormEntry();

        if ($product = $this->getProduct()) {
            $entry->setAttribute('product', $product);
        }
    }

    /**
     * Fired just after saving.
     */
    public function onSaved()
    {
        $values = [];

        foreach ($this->getFormInput() as $key => $value) {
            if (starts_with($key, 'option_')) {
                $values[str_replace('option_', '', $key)] = $value;
            }
        }

        /* @var ConfigurationInterface|ConfigurationModel $entry */
        $entry = $this->getFormEntry();
        //$entry->values()->sync($values);
    }

}

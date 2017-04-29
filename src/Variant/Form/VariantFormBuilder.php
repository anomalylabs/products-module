<?php namespace Anomaly\ProductsModule\Variant\Form;

use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\ProductsModule\Variant\Contract\VariantInterface;
use Anomaly\ProductsModule\Variant\VariantModel;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class VariantFormBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class VariantFormBuilder extends FormBuilder
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
        'options',
        'product',
    ];

    /**
     * The form sections.
     *
     * @var array
     */
    protected $sections = [];

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
        $options = [];

        foreach ($this->getFormInput() as $key => $value) {
            if (starts_with($key, 'option_')) {
                $options[str_replace('option_', '', $key)] = $value;
            }
        }

        /* @var VariantInterface|VariantModel $entry */
        $entry = $this->getFormEntry();

        $entry->options()->sync($options);
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

}

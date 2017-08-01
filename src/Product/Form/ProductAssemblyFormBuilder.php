<?php namespace Anomaly\ProductsModule\Product\Form;

use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\ProductsModule\Product\ProductModel;
use Anomaly\Streams\Platform\Ui\Form\Multiple\MultipleFormBuilder;

/**
 * Class ProductAssemblyFormBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProductAssemblyFormBuilder extends MultipleFormBuilder
{

    /**
     * The product instance.
     *
     * @var null|ProductInterface
     */
    protected $product = null;

    /**
     * Fired after all forms are built.
     */
    public function onBuilt()
    {
        $skips = array_filter(
            $this->getChildFormFieldSlugs('configuration'),
            function ($field) {
                return starts_with($field, 'option_');
            }
        );

        $this->getChildForm('configuration')->setSkips($skips);
    }

    /**
     * Fired after saving
     * the entry form.
     */
    public function onSavedEntry()
    {
        $entry   = $this->getChildFormEntry('entry');
        $product = $this->getChildFormEntry('product');

        $product->setAttribute('entry', $entry);
    }

    /**
     * Fired after saving
     * the product form.
     */
    public function onSavedProduct()
    {
        /* @var ProductInterface|ProductModel $product */
        $product       = $this->getChildFormEntry('product');
        $configuration = $this->getChildFormEntry('configuration');

        $configuration->setAttribute('product', $product);

        $builder = $this->getChildForm('features');

        $product->featureValues()->sync(
            $builder->getFormValues()->values()->all()
        );
    }

    /**
     * Get the contextual ID.
     *
     * @return int|null
     */
    public function getContextualId()
    {
        return $this->getChildFormEntryId('product');
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

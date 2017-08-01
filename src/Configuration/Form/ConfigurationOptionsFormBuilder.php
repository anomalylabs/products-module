<?php namespace Anomaly\ProductsModule\Configuration\Form;

use Anomaly\ProductsModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class ConfigurationOptionsFormBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ConfigurationOptionsFormBuilder extends FormBuilder
{

    /**
     * The product instance.
     *
     * @var null|ProductInterface
     */
    protected $product = null;

    /**
     * The configuration instance.
     *
     * @var null|ConfigurationInterface
     */
    protected $configuration = null;

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
     * Get the configuration.
     *
     * @return ConfigurationInterface|null
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * Set the configuration.
     *
     * @param ConfigurationInterface $configuration
     * @return $this
     */
    public function setConfiguration(ConfigurationInterface $configuration)
    {
        $this->configuration = $configuration;

        return $this;
    }
}

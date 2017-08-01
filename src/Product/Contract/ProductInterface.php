<?php namespace Anomaly\ProductsModule\Product\Contract;

use Anomaly\ProductsModule\Category\CategoryCollection;
use Anomaly\ProductsModule\Category\Contract\CategoryInterface;
use Anomaly\ProductsModule\Configuration\ConfigurationCollection;
use Anomaly\ProductsModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\ProductsModule\FeatureValue\FeatureValueCollection;
use Anomaly\ProductsModule\Option\OptionCollection;
use Anomaly\ProductsModule\OptionValue\OptionValueCollection;
use Anomaly\ProductsModule\Type\Contract\TypeInterface;
use Anomaly\ShippingModule\Group\Contract\GroupInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Response;

/**
 * Interface ProductInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface ProductInterface extends EntryInterface
{

    /**
     * Return the active price.
     *
     * @return float
     */
    public function price();

    /**
     * Make the product.
     *
     * @return $this
     */
    public function make();

    /**
     * Return the product content.
     *
     * @return null|string
     */
    public function content();

    /**
     * Get the content.
     *
     * @return string|null
     */
    public function getContent();

    /**
     * Set the content.
     *
     * @param $content
     * @return $this
     */
    public function setContent($content);

    /**
     * Get the response.
     *
     * @return Response|null
     */
    public function getResponse();

    /**
     * Set the response.
     *
     * @param Response $response
     * @return $this
     */
    public function setResponse(Response $response);

    /**
     * Return if the product
     * is on sale or not.
     *
     * @return boolean
     */
    public function isOnSale();

    /**
     * Return the enabled flag.
     *
     * @return boolean
     */
    public function isEnabled();

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName();

    /**
     * Get the product type.
     *
     * @return TypeInterface
     */
    public function getType();

    /**
     * Get the string ID.
     *
     * @return string
     */
    public function getStrId();

    /**
     * Get the related options.
     *
     * @return OptionCollection
     */
    public function getOptions();

    /**
     * Get the related option values.
     *
     * @return OptionValueCollection
     */
    public function getOptionValues();

    /**
     * Get the available option values.
     *
     * @param $option
     * @return OptionValueCollection
     */
    public function getAvailableOptionValues($option);

    /**
     * Get the description.
     *
     * @return string
     */
    public function getDescription();

    /**
     * Get the related categories.
     *
     * @return CategoryCollection
     */
    public function getCategories();

    /**
     * Get the related default category.
     *
     * @return CategoryInterface|null
     */
    public function getDefaultCategory();

    /**
     * Get the sale price.
     *
     * @return float
     */
    public function getSalePrice();

    /**
     * Get the sale amount.
     *
     * @return mixed
     */
    public function getSaleAmount();

    /**
     * Get the regular price.
     *
     * @return float
     */
    public function getRegularPrice();

    /**
     * Get the meta title.
     *
     * @return string
     */
    public function getMetaTitle();

    /**
     * Get the meta description.
     *
     * @return string
     */
    public function getMetaDescription();

    /**
     * Get the related parent.
     *
     * @return ProductInterface|null
     */
    public function getParent();

    /**
     * Get the related entry.
     *
     * @return null|EntryInterface
     */
    public function getEntry();

    /**
     * Get the related entry ID.
     *
     * @return null|int
     */
    public function getEntryId();

    /**
     * Get the related feature values.
     *
     * @return FeatureValueCollection
     */
    public function getFeatureValues();

    /**
     * Get the default configuration.
     *
     * @return ConfigurationInterface
     */
    public function getConfiguration();

    /**
     * Get the related configurations.
     *
     * @return ConfigurationCollection
     */
    public function getConfigurations();

    /**
     * Get the default configuration.
     *
     * @return ConfigurationInterface
     */
    public function getDefaultConfiguration();

    /**
     * Return the configurations relation.
     *
     * @return HasMany
     */
    public function configurations();

    /**
     * Get the tax category.
     *
     * @return \Anomaly\TaxesModule\Category\Contract\CategoryInterface
     */
    public function getTaxCategory();

    /**
     * Get the shipping group.
     *
     * @return GroupInterface
     */
    public function getShippingGroup();

    /**
     * Get the width.
     *
     * @return float
     */
    public function getWidth();

    /**
     * Get the height.
     *
     * @return float
     */
    public function getHeight();

    /**
     * Get the length.
     *
     * @return float
     */
    public function getLength();

    /**
     * Get the weight.
     *
     * @return float
     */
    public function getWeight();

    /**
     * Get the volume.
     *
     * @return float
     */
    public function getVolume();
}

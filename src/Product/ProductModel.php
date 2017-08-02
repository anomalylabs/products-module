<?php namespace Anomaly\ProductsModule\Product;

use Anomaly\ProductsModule\Category\CategoryCollection;
use Anomaly\ProductsModule\Category\Contract\CategoryInterface;
use Anomaly\ProductsModule\Configuration\ConfigurationCollection;
use Anomaly\ProductsModule\Configuration\ConfigurationModel;
use Anomaly\ProductsModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\ProductsModule\FeatureValue\FeatureValueCollection;
use Anomaly\ProductsModule\Option\Command\GetOption;
use Anomaly\ProductsModule\Option\Contract\OptionInterface;
use Anomaly\ProductsModule\Option\OptionCollection;
use Anomaly\ProductsModule\OptionValue\OptionValueCollection;
use Anomaly\ProductsModule\Product\Command\MakeProductResponse;
use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\ProductsModule\Product\Type\ProductTypeExtension;
use Anomaly\ShippingModule\Group\Contract\GroupInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Model\Products\ProductsProductsEntryModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Response;

/**
 * Class ProductModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProductModel extends ProductsProductsEntryModel implements ProductInterface
{

    /**
     * The cascading relations.
     *
     * @var array
     */
    protected $cascades = [
        'entry',
        'configurations',
    ];

    /**
     * Eager loaded relations.
     *
     * @var array
     */
    protected $with = [
        'type',
        'entry',
        'configurations',
    ];

    /**
     * The response object.
     *
     * @var null|Response
     */
    protected $response = null;

    /**
     * Make the product.
     *
     * @return $this
     */
    public function make()
    {
        $this->setResponse($this->dispatch(new MakeProductResponse($this)));

        return $this;
    }

    /**
     * Return the product content.
     *
     * @return null|string
     */
    public function content()
    {
        return $this
            ->make()
            ->getContent();
    }

    /**
     * Return the active price.
     *
     * @return float
     */
    public function price()
    {
        return $this->isOnSale() ? $this->getSalePrice() : $this->getRegularPrice();
    }

    /**
     * Return if the product
     * is on sale or not.
     *
     * @return boolean
     */
    public function isOnSale()
    {
        return $this
            ->getDefaultConfiguration()
            ->isOnSale();
    }

    /**
     * Get the default configuration.
     *
     * @return ConfigurationInterface
     */
    public function getDefaultConfiguration()
    {
        return $this
            ->getConfigurations()
            ->first();
    }

    /**
     * Get the related configurations.
     *
     * @return ConfigurationCollection
     */
    public function getConfigurations()
    {
        return $this->configurations;
    }

    /**
     * Get the sale price.
     *
     * @return float
     */
    public function getSalePrice()
    {
        return $this
            ->getDefaultConfiguration()
            ->getSalePrice();
    }

    /**
     * Get the regular price.
     *
     * @return float
     */
    public function getRegularPrice()
    {
        return $this
            ->getDefaultConfiguration()
            ->getRegularPrice();
    }

    /**
     * Get the sale amount.
     *
     * @return mixed
     */
    public function getSaleAmount()
    {
        return $this
            ->getDefaultConfiguration()
            ->getSaleAmount();
    }

    /**
     * Get the content.
     *
     * @return string|null
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the content.
     *
     * @param $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the response.
     *
     * @return Response|null
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Set the response.
     *
     * @param Response $response
     * @return $this
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * Get the product type.
     *
     * @return ProductTypeExtension
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the string ID.
     *
     * @return string
     */
    public function getStrId()
    {
        return $this->str_id;
    }

    /**
     * Get the quantity.
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Get the backorder policy.
     *
     * @return null|string
     */
    public function getBackorderPolicy()
    {
        return $this->backorder_policy;
    }

    /**
     * Get the low inventory threshold.
     *
     * @return int|null
     */
    public function getLowInventoryThreshold()
    {
        return $this->low_inventory_threshold;
    }

    /**
     * Return the enabled flag.
     *
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * Get the related options.
     *
     * @return OptionCollection
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Get the related option values.
     *
     * @return OptionValueCollection
     */
    public function getOptionValues()
    {
        return $this->option_values;
    }

    /**
     * Get the available option values.
     *
     * @return OptionValueCollection
     */
    public function getAvailableOptionValues($option)
    {
        /* @var OptionInterface $option */
        $option = $this->dispatch(new GetOption($option));

        $available = $this
            ->getOptionValues()
            ->filterByOption($option);

        if ($available->isEmpty()) {
            $available = $option->getValues();
        }

        return $available;
    }

    /**
     * Get the description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the related default category.
     *
     * @return CategoryInterface|null
     */
    public function getDefaultCategory()
    {
        $categories = $this->getCategories();

        return $categories->first();
    }

    /**
     * Get the related categories.
     *
     * @return CategoryCollection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Get the meta title.
     *
     * @return string
     */
    public function getMetaTitle()
    {
        return $this->meta_title ?: $this->getName();
    }

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the meta description.
     *
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->meta_description;
    }

    /**
     * Get the related parent.
     *
     * @return ProductInterface|null
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Get the related entry.
     *
     * @return null|EntryInterface
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * Get the related entry ID.
     *
     * @return null|int
     */
    public function getEntryId()
    {
        return $this->entry_id;
    }

    /**
     * Get the related feature values.
     *
     * @return FeatureValueCollection
     */
    public function getFeatureValues()
    {
        return $this->feature_values;
    }

    /**
     * Get the default configuration.
     *
     * @return ConfigurationInterface
     */
    public function getConfiguration()
    {
        return $this
            ->getConfigurations()
            ->first();
    }

    /**
     * Return the variants relation.
     *
     * @return HasMany
     */
    public function configurations()
    {
        return $this->hasMany(ConfigurationModel::class, 'product_id');
    }

    /**
     * Get the tax category.
     *
     * @return \Anomaly\TaxesModule\Category\Contract\CategoryInterface
     */
    public function getTaxCategory()
    {
        return $this->tax_category;
    }

    /**
     * Get the shipping group.
     *
     * @return GroupInterface
     */
    public function getShippingGroup()
    {
        return $this->shipping_group;
    }

    /**
     * Get the width.
     *
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Get the height.
     *
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Get the length.
     *
     * @return float
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Get the weight.
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Get the volume.
     *
     * @return float
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * Return the inventory.
     *
     * @return ProductInventory
     */
    public function inventory()
    {
        return new ProductInventory($this);
    }
}

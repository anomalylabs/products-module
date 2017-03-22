<?php namespace Anomaly\ProductsModule\Product;

use Anomaly\ProductsModule\Category\CategoryCollection;
use Anomaly\ProductsModule\Category\Contract\CategoryInterface;
use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\Streams\Platform\Model\Products\ProductsProductsEntryModel;
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
     * The response object.
     *
     * @var null|Response
     */
    protected $response = null;

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
        return $this->on_sale;
    }

    /**
     * Get the sale price.
     *
     * @return float
     */
    public function getSalePrice()
    {
        return $this->sale_price;
    }

    /**
     * Get the sale amount.
     *
     * @return mixed
     */
    public function getSaleAmount()
    {
        return $this->sale_amount;
    }

    /**
     * Get the regular price.
     *
     * @return float
     */
    public function getRegularPrice()
    {
        return $this->regular_price;
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
     * Return the enabled flag.
     *
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
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
     * Get the meta keywords.
     *
     * @return array
     */
    public function getMetaKeywords()
    {
        return $this->meta_keywords;
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
}

<?php namespace Anomaly\ProductsModule\Product\Contract;

use Anomaly\ProductsModule\Category\CategoryCollection;
use Anomaly\ProductsModule\Category\Contract\CategoryInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
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
    public function isSale();

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
     * Get the string ID.
     *
     * @return string
     */
    public function getStrId();

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
     * Get the meta keywords.
     *
     * @return array
     */
    public function getMetaKeywords();

    /**
     * Get the meta description.
     *
     * @return string
     */
    public function getMetaDescription();
}

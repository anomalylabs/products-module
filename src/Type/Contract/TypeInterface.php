<?php namespace Anomaly\ProductsModule\Type\Contract;

use Anomaly\ProductsModule\Product\Extension\Contract\ProductExtensionInterface;
use Anomaly\ProductsModule\Product\ProductCollection;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryModel;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;

/**
 * Interface TypeInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
interface TypeInterface extends EntryInterface
{

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName();

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Get the description.
     *
     * @return string
     */
    public function getDescription();

    /**
     * Get the related entry stream.
     *
     * @return StreamInterface
     */
    public function getEntryStream();

    /**
     * Get the related entry stream ID.
     *
     * @return int
     */
    public function getEntryStreamId();

    /**
     * Get the related entry model.
     *
     * @return EntryModel
     */
    public function getEntryModel();

    /**
     * Get the related entry model name.
     *
     * @return string
     */
    public function getEntryModelName();

    /**
     * Get the product extension.
     *
     * @return ProductExtensionInterface
     */
    public function getExtension();

    /**
     * Get the theme layout.
     *
     * @return string
     */
    public function getThemeLayout();

    /**
     * Get the related products.
     *
     * @return ProductCollection
     */
    public function getProducts();

    /**
     * Return the products relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products();
}

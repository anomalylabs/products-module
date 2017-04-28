<?php namespace Anomaly\ProductsModule\Category\Form;

use Anomaly\ProductsModule\Category\Contract\CategoryInterface;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class CategoryFormBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ProductsModule\Category\Form
 */
class CategoryFormBuilder extends FormBuilder
{

    /**
     * The parent category.
     *
     * @var null|CategoryInterface
     */
    protected $parent = null;

    /**
     * Fields to skip.
     *
     * @var array|string
     */
    protected $skips = [
        'path',
        'parent',
    ];

    /**
     * Fired just before saving the form.
     */
    public function onSaving()
    {
        $entry  = $this->getFormEntry();
        $parent = $this->getParent();

        if ($parent) {
            $entry->setAttribute('parent_id', $parent->getId());
        }
    }

    /**
     * Get the parent.
     *
     * @return CategoryInterface|null
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set the parent.
     *
     * @param CategoryInterface $parent
     * @return $this
     */
    public function setParent(CategoryInterface $parent)
    {
        $this->parent = $parent;

        return $this;
    }

}

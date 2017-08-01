<?php namespace Anomaly\ProductsModule\Product\Form;

use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\ProductsModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class ProductFormBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProductFormBuilder extends FormBuilder
{

    /**
     * The type instance.
     *
     * @var null|TypeInterface
     */
    protected $type = null;

    /**
     * The parent instance.
     *
     * @var null|ProductInterface
     */
    protected $parent = null;

    /**
     * Fields to skip.
     *
     * @var array|string
     */
    protected $skips = [
        'str_id',
        'entry',
        'type',
    ];

    /**
     * The form buttons.
     *
     * @var array
     */
    protected $buttons = [
        'cancel',
        'view' => [
            'enabled' => 'edit',
            'target'  => '_blank',
            'href'    => 'admin/products/view/{request.route.parameters.id}',
        ],
    ];

    /**
     * Fired just before saving.
     */
    public function onSaving()
    {
        $entry = $this->getFormEntry();

        if ($parent = $this->getParent()) {
            $entry->setAttribute('parent', $parent);
        }

        if ($type = $this->getType()) {
            $entry->setAttribute('type', $type);
        }
    }

    /**
     * Get the parent.
     *
     * @return ProductInterface|null
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set the parent.
     *
     * @param ProductInterface $parent
     * @return $this
     */
    public function setParent(ProductInterface $parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get the type.
     *
     * @return TypeInterface|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the type.
     *
     * @param TypeInterface $type
     * @return $this
     */
    public function setType(TypeInterface $type)
    {
        $this->type = $type;

        return $this;
    }
}

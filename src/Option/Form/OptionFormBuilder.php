<?php namespace Anomaly\ProductsModule\Option\Form;

use Anomaly\ProductsModule\Modifier\Contract\ModifierInterface;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class OptionFormBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class OptionFormBuilder extends FormBuilder
{

    /**
     * The modifier instance.
     *
     * @var null|ModifierInterface
     */
    protected $modifier = null;

    /**
     * Fields to skip.
     *
     * @var array|string
     */
    protected $skips = [
        'modifier',
    ];

    /**
     * The form sections.
     *
     * @var array
     */
    protected $sections = [];

    /**
     * Fired just before saving.
     */
    public function onSaving()
    {
        $entry = $this->getFormEntry();

        if ($modifier = $this->getModifier()) {
            $entry->setAttribute('modifier', $modifier);
        }
    }

    /**
     * Get the modifier.
     *
     * @return ModifierInterface|null
     */
    public function getModifier()
    {
        return $this->modifier;
    }

    /**
     * Set the modifier.
     *
     * @param ModifierInterface $modifier
     * @return $this
     */
    public function setModifier(ModifierInterface $modifier)
    {
        $this->modifier = $modifier;

        return $this;
    }

}

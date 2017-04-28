<?php namespace Anomaly\ProductsModule\Option\Table;

use Anomaly\ProductsModule\Modifier\Contract\ModifierInterface;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class OptionTableBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class OptionTableBuilder extends TableBuilder
{

    /**
     * The modifier instance.
     *
     * @var null|ModifierInterface
     */
    protected $modifier = null;

    /**
     * The table filters.
     *
     * @var array|string
     */
    protected $filters = [];

    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [
        'name',
        'slug',
        'description',
    ];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'edit',
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete',
    ];

    /**
     * Fired when querying table entries.
     *
     * @param Builder $query
     */
    public function onQuerying(Builder $query)
    {
        if ($modifier = $this->getModifier()) {
            $query->where('modifier_id', $modifier->getId());
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

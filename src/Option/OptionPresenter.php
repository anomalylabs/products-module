<?php namespace Anomaly\ProductsModule\Option;

use Anomaly\ProductsModule\Option\Contract\OptionInterface;
use Anomaly\Streams\Platform\Entry\EntryPresenter;

/**
 * Class OptionPresenter
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class OptionPresenter extends EntryPresenter
{

    /**
     * The decorated object.
     *
     * @var OptionInterface
     */
    protected $object;

    /**
     * Return the public label.
     *
     * @return string
     */
    public function displayName()
    {
        return $this->object->label();
    }
}

<?php namespace Anomaly\ProductsModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeCollection;
use Anomaly\Streams\Platform\Addon\Module\ModuleCollection;
use Anomaly\Streams\Platform\Http\Controller\FieldsController;

/**
 * Class AttributesController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AttributesController extends FieldsController
{

    /**
     * The fields namespace.
     *
     * @var string
     */
    protected $namespace = 'product_attributes';

    /**
     * Choose a field type for creating a field.
     *
     * @param  FieldTypeCollection $fieldTypes
     * @param ModuleCollection     $modules
     * @return \Illuminate\View\View
     */
    public function choose(FieldTypeCollection $fieldTypes, ModuleCollection $modules)
    {
        $fieldTypes = $fieldTypes->filter(
            function (FieldType $fieldType) {
                return $fieldType->getColumnType() !== false;
            }
        );

        return parent::choose($fieldTypes, $modules);
    }

}

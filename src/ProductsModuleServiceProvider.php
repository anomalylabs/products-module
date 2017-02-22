<?php namespace Anomaly\ProductsModule;

use Anomaly\ProductsModule\Category\CategoryModel;
use Anomaly\ProductsModule\Category\CategoryRepository;
use Anomaly\ProductsModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\ProductsModule\Product\Contract\ProductRepositoryInterface;
use Anomaly\ProductsModule\Product\ProductModel;
use Anomaly\ProductsModule\Product\ProductRepository;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Model\Products\ProductsCategoriesEntryModel;
use Anomaly\Streams\Platform\Model\Products\ProductsProductsEntryModel;

/**
 * Class ProductsModuleServiceProvider
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProductsModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'products'                   => [
            'as'   => 'anomaly.module.products::products.index',
            'uses' => 'Anomaly\ProductsModule\Http\Controller\ProductsController@index',
        ],
        'products/{slug}'            => [
            'as'   => 'anomaly.module.products::products.view',
            'uses' => 'Anomaly\ProductsModule\Http\Controller\ProductsController@view',
        ],
        'products/preview/{str_id}'  => [
            'as'   => 'anomaly.module.products::products.preview',
            'uses' => 'Anomaly\ProductsModule\Http\Controller\ProductsController@preview',
        ],
        'products/categories/{path}' => [
            'as'          => 'anomaly.module.products::categories.view',
            'uses'        => 'Anomaly\ProductsModule\Http\Controller\CategoriesController@view',
            'constraints' => [
                'path' => '(.*)',
            ],
        ],
        'products/tags/{tag}'        => [
            'as'   => 'anomaly.module.products::tags.view',
            'uses' => 'Anomaly\ProductsModule\Http\Controller\TagsController@view',
        ],

        'admin/products'                      => 'Anomaly\ProductsModule\Http\Controller\Admin\ProductsController@index',
        'admin/products/create'               => 'Anomaly\ProductsModule\Http\Controller\Admin\ProductsController@create',
        'admin/products/edit/{id}'            => 'Anomaly\ProductsModule\Http\Controller\Admin\ProductsController@edit',
        'admin/products/view/{id}'            => 'Anomaly\ProductsModule\Http\Controller\Admin\ProductsController@view',
        'admin/products/categories'           => 'Anomaly\ProductsModule\Http\Controller\Admin\CategoriesController@index',
        'admin/products/categories/create'    => 'Anomaly\ProductsModule\Http\Controller\Admin\CategoriesController@create',
        'admin/products/categories/edit/{id}' => 'Anomaly\ProductsModule\Http\Controller\Admin\CategoriesController@edit',
        'admin/products/categories/view/{id}' => 'Anomaly\ProductsModule\Http\Controller\Admin\CategoriesController@view',

        'admin/products/fields'           => 'Anomaly\ProductsModule\Http\Controller\Admin\FieldsController@index',
        'admin/products/fields/choose'    => 'Anomaly\ProductsModule\Http\Controller\Admin\FieldsController@choose',
        'admin/products/fields/create'    => 'Anomaly\ProductsModule\Http\Controller\Admin\FieldsController@create',
        'admin/products/fields/edit/{id}' => 'Anomaly\ProductsModule\Http\Controller\Admin\FieldsController@edit',

        'admin/products/fields/assignments/{stream}'           => 'Anomaly\ProductsModule\Http\Controller\Admin\AssignmentsController@index',
        'admin/products/fields/assignments/{stream}/choose'    => 'Anomaly\ProductsModule\Http\Controller\Admin\AssignmentsController@choose',
        'admin/products/fields/assignments/{stream}/create'    => 'Anomaly\ProductsModule\Http\Controller\Admin\AssignmentsController@create',
        'admin/products/fields/assignments/{stream}/edit/{id}' => 'Anomaly\ProductsModule\Http\Controller\Admin\AssignmentsController@edit',
    ];

    /**
     * The addon bindings.
     *
     * @var array
     */
    protected $bindings = [
        ProductsProductsEntryModel::class   => ProductModel::class,
        ProductsCategoriesEntryModel::class => CategoryModel::class,
    ];

    /**
     * The addon singletons.
     *
     * @var array
     */
    protected $singletons = [
        ProductRepositoryInterface::class  => ProductRepository::class,
        CategoryRepositoryInterface::class => CategoryRepository::class,
    ];
}

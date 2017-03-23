<?php namespace Anomaly\ProductsModule;

use Anomaly\ProductsModule\Brand\BrandModel;
use Anomaly\ProductsModule\Brand\BrandRepository;
use Anomaly\ProductsModule\Brand\Contract\BrandRepositoryInterface;
use Anomaly\ProductsModule\Category\CategoryModel;
use Anomaly\ProductsModule\Category\CategoryRepository;
use Anomaly\ProductsModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\ProductsModule\Http\Controller\Admin\AssignmentsController;
use Anomaly\ProductsModule\Http\Controller\Admin\FieldsController;
use Anomaly\ProductsModule\Product\Contract\ProductRepositoryInterface;
use Anomaly\ProductsModule\Product\ProductModel;
use Anomaly\ProductsModule\Product\ProductRepository;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Assignment\AssignmentRouter;
use Anomaly\Streams\Platform\Field\FieldRouter;
use Anomaly\Streams\Platform\Model\Products\ProductsBrandsEntryModel;
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
            'as'   => 'store::products.index',
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
        'products/brands/{slug}'     => [
            'as'   => 'anomaly.module.products::brands.view',
            'uses' => 'Anomaly\ProductsModule\Http\Controller\BrandsController@view',
        ],
        'products/tags/{tag}'        => [
            'as'   => 'anomaly.module.products::tags.view',
            'uses' => 'Anomaly\ProductsModule\Http\Controller\TagsController@view',
        ],

        'products/cart/add' => [
            'as'   => 'anomaly.module.products::cart.add',
            'uses' => 'Anomaly\ProductsModule\Http\Controller\CartController@add',
        ],

        'admin/products'                      => 'Anomaly\ProductsModule\Http\Controller\Admin\ProductsController@index',
        'admin/products/create'               => 'Anomaly\ProductsModule\Http\Controller\Admin\ProductsController@create',
        'admin/products/edit/{id}'            => 'Anomaly\ProductsModule\Http\Controller\Admin\ProductsController@edit',
        'admin/products/view/{id}'            => 'Anomaly\ProductsModule\Http\Controller\Admin\ProductsController@view',
        'admin/products/brands'               => 'Anomaly\ProductsModule\Http\Controller\Admin\BrandsController@index',
        'admin/products/brands/create'        => 'Anomaly\ProductsModule\Http\Controller\Admin\BrandsController@create',
        'admin/products/brands/edit/{id}'     => 'Anomaly\ProductsModule\Http\Controller\Admin\BrandsController@edit',
        'admin/products/brands/view/{id}'     => 'Anomaly\ProductsModule\Http\Controller\Admin\BrandsController@view',
        'admin/products/categories'           => 'Anomaly\ProductsModule\Http\Controller\Admin\CategoriesController@index',
        'admin/products/categories/create'    => 'Anomaly\ProductsModule\Http\Controller\Admin\CategoriesController@create',
        'admin/products/categories/edit/{id}' => 'Anomaly\ProductsModule\Http\Controller\Admin\CategoriesController@edit',
        'admin/products/categories/view/{id}' => 'Anomaly\ProductsModule\Http\Controller\Admin\CategoriesController@view',

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
        ProductsBrandsEntryModel::class     => BrandModel::class,
        ProductsProductsEntryModel::class   => ProductModel::class,
        ProductsCategoriesEntryModel::class => CategoryModel::class,
    ];

    /**
     * The addon singletons.
     *
     * @var array
     */
    protected $singletons = [
        BrandRepositoryInterface::class    => BrandRepository::class,
        ProductRepositoryInterface::class  => ProductRepository::class,
        CategoryRepositoryInterface::class => CategoryRepository::class,
    ];

    /**
     * Register the addon.
     *
     * @param FieldRouter      $fields
     * @param AssignmentRouter $assignments
     */
    public function register(FieldRouter $fields, AssignmentRouter $assignments)
    {
        $fields->route($this->addon, FieldsController::class);

        $assignments->route($this->addon, AssignmentsController::class, 'admin/products');
    }
}

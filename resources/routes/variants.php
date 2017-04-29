<?php

return [
    'admin/products/variants/{product}'           => 'Anomaly\ProductsModule\Http\Controller\Admin\VariantsController@index',
    'admin/products/variants/{product}/create'    => 'Anomaly\ProductsModule\Http\Controller\Admin\VariantsController@create',
    'admin/products/variants/{product}/edit/{id}' => 'Anomaly\ProductsModule\Http\Controller\Admin\VariantsController@edit',
];

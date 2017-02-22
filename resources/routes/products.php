<?php

return [
    'admin/products' => 'Anomaly\ProductsModule\Http\Controller\Admin\ProductsController@index',
    'admin/products/create' => 'Anomaly\ProductsModule\Http\Controller\Admin\ProductsController@create',
    'admin/products/edit/{id}' => 'Anomaly\ProductsModule\Http\Controller\Admin\ProductsController@edit'
];

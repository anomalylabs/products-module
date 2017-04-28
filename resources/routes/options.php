<?php

return [
    'admin/products/modifiers/options/{modifier}'           => 'Anomaly\ProductsModule\Http\Controller\Admin\OptionsController@index',
    'admin/products/modifiers/options/{modifier}/create'    => 'Anomaly\ProductsModule\Http\Controller\Admin\OptionsController@create',
    'admin/products/modifiers/options/{modifier}/edit/{id}' => 'Anomaly\ProductsModule\Http\Controller\Admin\OptionsController@edit',
];

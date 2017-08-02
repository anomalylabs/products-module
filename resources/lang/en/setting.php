<?php

return [
    'low_inventory_threshold'    => [
        'name'         => 'Default  Low Inventory Threshold',
        'instructions' => 'What is the default quantity at which a product is considered "low inventory".',
    ],
    'low_inventory_notification' => [
        'label'        => 'Low Inventory Notification',
        'instructions' => 'Who should be notified of low inventory?',
    ],
    'backorder_policy'           => [
        'name'         => 'Default Backorder Policy',
        'instructions' => 'What is the default behavior when a product is out of stock?',
        'option'       => [
            'allow' => 'Allow products to be purchased',
            'deny'  => 'Disable products from being purchased',
        ],
    ],
];

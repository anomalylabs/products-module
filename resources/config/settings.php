<?php

return [
    'low_inventory_threshold'    => [
        'type'   => 'anomaly.field_type.integer',
        'bind'   => 'anomaly.module.products::products.low_inventory_threshold',
        'config' => [
            'min'           => 0,
            'default_value' => 5,
        ],
    ],
    'low_inventory_notification' => [
        'type'   => 'anomaly.field_type.tags',
        'config' => [
            'filter_tags' => FILTER_VALIDATE_EMAIL,
        ],
    ],
    'backorder_policy'           => [
        'required' => true,
        'type'     => 'anomaly.field_type.select',
        'bind'     => 'anomaly.module.products::products.backorder_policy',
        'config'   => [
            'options'       => [
                'allow' => 'anomaly.module.products::field.backorder_policy.option.allow',
                'deny'  => 'anomaly.module.products::field.backorder_policy.option.deny',
            ],
            'default_value' => 'deny',
        ],
    ],
];

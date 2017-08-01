<?php

return [
    'low_inventory_notification' => [
        'type'   => 'anomaly.field_type.tags',
        'config' => [
            'filter_tags' => FILTER_VALIDATE_EMAIL,
        ],
    ],
];

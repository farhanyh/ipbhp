<?php

return [
    [
        'header' => 'Nav Title'
    ],
    [
        'text' => 'Nav item',
        'url' => 'site/index',
        'label' => 'Test',
        'label_color' => 'danger',
        'icon' => 'speedometer',
    ],
    [
        'text' => 'Nav item',
        'submenu' => [
            [
                'text' => 'submenu',
                'url' => 'site/about'
            ]
        ]
    ]
];
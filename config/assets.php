<?php

return [

    'images'    =>  [

        'paths' => [
            'input'     =>  storage_path('app').'/uploads',
            'output'    =>  storage_path('app').'/uploads',
        ],

        'sizes' => [
            'x-small' => [
                'width' => 100,
            ],

            'small' => [
                'width' => 300,
            ],

            'medium' => [
                'width' => 500,
            ],
            'big'   =>  [
                'width'     =>  1000,
            ]
        ]
    ]

];
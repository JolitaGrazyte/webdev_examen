<?php

return [

    'images'    =>  [

        'paths' => [
            'input'     =>  public_path().'/uploads',
            'output'    =>  public_path().'/uploads',
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
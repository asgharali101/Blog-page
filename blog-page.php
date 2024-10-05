<?php

session_start();

$email = 'asgharali@gmail.com';
$password = '123';

if (! isset($_SESSION['blogs']) || count($_SESSION['blogs']) === 0) {
    $_SESSION['blogs'] =
        [
            [
                'title' => 'My School',
                'description' => 'My school name is RGS',
                'publish_date' => '9/25/2024',
                'id' => 1,
            ],
            [
                'title' => 'My Village',
                'description' => 'My village name is Haji Sajjawal',
                'publish_date' => '9/26/2024',
                'id' => 2,
            ],
            [
                'title' => 'My City',
                'description' => 'My city name is Aarazi',
                'publish_date' => '9/27/2024:07:27:35',
                'id' => 3,
            ],
            [
                'title' => 'My Country',
                'description' => 'My country name is Pakistan',
                'id' => 4,
            ],

        ];
}

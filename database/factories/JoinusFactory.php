<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Joinus::class, function (Faker $faker) {
    $joinus = [
        'Company',
        'Person',
    ];
    return [
        'link' =>    $faker->word,
        'slug'       => $joinus[$faker->unique->numberBetween(0, 1)],
    ];
});

$factory->define(\App\Models\JoinusTranslation::class,
    function (Faker $faker) {

        return [
            'body'   => $faker->word,
            'locale'  => 'ar',

        ];
    });

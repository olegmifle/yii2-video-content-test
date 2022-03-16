<?php
/** @var \Faker\Generator $faker */

return [
    'uuid' => $faker->uuid,
    'title' => $faker->sentence,
    'duration' => $faker->numberBetween(60),
    'views' => $faker->numberBetween(0, 999999999999),
    'created_at' => $faker->dateTimeBetween()->format(DATE_ATOM),
];

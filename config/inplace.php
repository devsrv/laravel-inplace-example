<?php

return [
    'authorize' => env('INPLACE_ENABLE_AUTHORIZATION', false),
    'middleware' => ['web', 'auth']
];

<?php

namespace App\Http\Inplace;

class CustomSave
{
    public function save($value) {
        return [
            'success' => 0,
            'message' => 'not allowed'
        ];
    }
}

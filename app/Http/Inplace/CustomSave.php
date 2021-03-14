<?php

namespace App\Http\Inplace;

class CustomSave
{
    public function save($editedValue) {
        return [
            'success' => 0,
            'message' => 'not allowed'
        ];
    }
}

<?php

namespace App\Http\Inplace\Requests;

use Illuminate\Database\Eloquent\Model;

class SaveAuthorBadge
{
    public function __invoke(Model $model, string $relation, array $values)
    {
        return [
            'success' => 0,
            'message' => 'some errors are intentional'
        ];
    }
}

<?php

namespace App\Http\Inplace;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CustomSave
{
    use AuthorizesRequests;

    public function save($model, $column, $value) {
        /*-----------------------------
        | PARAMS
        | -----------------------------
        | if model specified in component, here you can access them as $model & $column
        */

        /*-----------------------------
        | MANUAL AUTHORIZATION
        | -----------------------------
        | Gate::authorize('update', $model);
        |
        | // or any other type of authorization possible like-
        | Gate::authorize('edit-settings');
        | $this->authorize('update', $model);
        */

        // save data here

        return [
            'success' => 0,
            'message' => 'not allowed'
        ];
    }
}

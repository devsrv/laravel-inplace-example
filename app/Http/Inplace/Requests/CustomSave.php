<?php

namespace App\Http\Inplace\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use devsrv\inplace\Traits\SpatieAuthorize;

class CustomSave
{
    use AuthorizesRequests, SpatieAuthorize;

    public function __invoke($model, $column, $value)
    {
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

        /*-----------------------------
        | SPATIE ROLE PERMISSION AUTHORIZATION
        | -----------------------------
        | use SpatieAuthorize;
        |
        | $this->authorizeSpatieRoleOrPermission(['applicant', 'app login access']);
        |
        */

        // save data here
        $model->{$column} = $value;
        if($model->save()) {
            return [
                'success' => 1,
            ];
        }

        return [
            'success' => 0,
            'message' => 'not possible'
        ];
    }
}

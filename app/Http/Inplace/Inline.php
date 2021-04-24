<?php

namespace App\Http\Inplace;

use devsrv\inplace\InlineEdit;

class Inline
{
    public static function config()
    {
        return [
            InlineEdit::make('USERNAME')
            ->column('name')
            ->validation(['required', 'min:10'])
            ->authorize(true)
            // ->middleware(['auth'])
            // ->withoutMiddleware()
            // ->renderComponent('CustomInlineRender')
            // ->saveUsing(\App\Http\Inplace\CustomSave::class)
        ];
    }
}

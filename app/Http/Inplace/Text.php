<?php

namespace App\Http\Inplace;

use devsrv\inplace\InlineText;

class Text
{
    public static function config()
    {
        return [
            InlineText::make('USERNAME')
            ->column('name')
            ->validation(['required', 'min:10'])
            // ->authorizeUsing(fn() => ! auth()->check())
            ->bypassAuthorize(),
            // ->middleware(['auth'])
            // ->renderComponent('CustomInlineRender')
            // ->saveUsing(\App\Http\Inplace\CustomSave::class)
        ];
    }
}

<?php

namespace App\Http\Inplace;

use devsrv\inplace\InlineText;
use App\Http\Inplace\Requests\CustomSave;

class Text
{
    public static function config()
    {
        return [
            InlineText::make('USERNAME')
            ->column('name')
            ->validation(['required', 'min:10'])
            // ->authorizeUsing(fn() => ! auth()->check())
            ->bypassAuthorize()
            ->middleware(['auth', 'throttle:inplace'])
            // ->middleware(['auth'])
            // ->renderComponent('CustomInlineRender')
            ->saveUsing(new CustomSave)
        ];
    }
}

<?php

namespace App\Http\Inplace;

use devsrv\inplace\RelationManager;
use App\Http\Inplace\Requests\SaveAuthorBadge;

class Relation
{
    public static function config()
    {
        return [
            RelationManager::make('AUTHOR_BADGES')
            ->relation('badges', 'label')
            ->thumbnailed(40, function($model) {
                return 'assets/img/'. match($model->label) {
                    'silver' => 'capt.jpg',
                    'navy' => 'cyclopse.jpg',
                    'blue' => 'iron.jpg',
                    'purple' => 'capt.jpg',
                    'gray' => 'wolverine.jpg',
                    default => 'strange.jpg',
                };
            })
            ->filterOptions(fn($query) => $query->where('label', '!=', 'olive'))
            ->renderTemplate('partials.badge-list')
            // ->renderUsing(fn($q) => $q->pluck('label')->implode('/'))
            ->validation(['required', 'array'])
            // ->validateEach(['in:5,6'])
            ->middleware(['auth'])
            ->saveUsing(new SaveAuthorBadge)
            // ->authorizeUsing(fn() => ! auth()->check()),
            ->bypassAuthorize(),


            RelationManager::make('AUTHOR_BADGES2')
            ->relation('badges', 'label')
            ->thumbnailed()
            ->renderUsing(fn($q) => $q->pluck('label')->implode('/'))
            ->multiple(false),
        ];
    }
}

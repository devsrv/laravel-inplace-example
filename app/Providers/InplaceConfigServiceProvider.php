<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use devsrv\inplace\{InplaceConfig, RelationManager, InlineEdit};

class InplaceConfigServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->singleton(InplaceConfig::class, function ($app) {
            return new InplaceConfig($this->config());
        });
    }

    private function config()
    {
        return [
            'inline' => [
                InlineEdit::make('USERNAME')
                ->column('name')
                ->validation(['required', 'min:10'])
                ->authorize(true)
                // ->middleware(['auth'])
                // ->withoutMiddleware()
                // ->renderComponent('CustomInlineRender')
                // ->saveUsing(\App\Http\Inplace\CustomSave::class)
            ],
            'relation' => [
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
                ->renderTemplate('partials.badge-list', fn($q) => $q->where('label', '!=', 'olive')),


                RelationManager::make('AUTHOR_BADGES2')
                ->relation('badges', 'label')
                ->thumbnailed()
                ->renderUsing(fn($q) => $q->pluck('label')->implode('/')),
            ]
        ];
    }
}

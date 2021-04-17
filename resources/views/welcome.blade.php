@extends('app')

@section('content')

<div class="row">
    <div class="col-12 col-md-4">
        <div class="alert alert-primary" role="alert">
            <h2>Inline text editable</h2>
        </div>

        <div class="border-bottom col-12 my-3 pb-3">
            <label>Simplest</label>
            <x-inplace-inline
                {{-- model="App\Models\User:1" --}}
                {{-- model="$user" --}}
                {{-- column="name" --}}
                model="App\Models\User:name,1"
                validation="required|min:10"
                :authorize="false"
            >
            {{ \App\Models\User::find(1)->name }}
            </x-inplace-inline>
        </div>


        <div class="border-bottom col-12 my-3 pb-3">
            @php
            // $rules = serialize(['required', \Illuminate\Validation\Rule::in(['11', '12']), 'min:2']);
            $rules = serialize(['required', 'exists:users,name']);
            @endphp

            <label>Complex validation rules</label>
            <x-inplace-inline
                inline
                model="App\Models\User:name,1"
                :validation="$rules"
                :authorize="true"
            >
                {{ \App\Models\User::find(1)->name }}
            </x-inplace-inline>
        </div>

        <div class="border-bottom col-12 my-3 pb-3">
            <label>Slotted Markup with global authorize override</label>
            <x-inplace-inline
                model="App\Models\User:email,1"
                :inline="true"
                validation="required|email"
                :authorize="false"
            >
            <x-slot name="before"><div class="myclass anotherclass"><h4></x-slot>
            <x-slot name="after"></h4></div></x-slot>

            {{ \App\Models\User::find(1)->email }}
            </x-inplace-inline>
        </div>

        <div class="border-bottom col-12 my-3 pb-3">
            <label>No Model Custom Save</label>
            <x-inplace-inline
                :inline="true"
                :value="\App\Models\Post::find(1)->description"
                saveusing="App\Http\Inplace\CustomSave"
            />
        </div>

        <div class="border-bottom col-12 my-3 pb-3">
            <label>With Model slotted custom save + (manual authorization)</label>
            <x-inplace-inline
                :inline="true"
                model="App\Models\Post:topic,1"
                saveusing="App\Http\Inplace\CustomSave"
                validation="required|min:10"
                :authorize="false"
            >
                {{ \App\Models\Post::find(1)->topic }}
            </x-inplace-inline>
        </div>

        <div class="border-bottom col-12 my-3 pb-3">
            <label>Render as custom</label>
            <x-inplace-inline
                model="App\Models\Post:title,1"
                :inline="true"
                render-as="CustomInlineRender"
            >
            {{ \App\Models\Post::find(1)->title }}
            </x-inplace-inline>
        </div>

    </div>

    <div class="col-12 col-md-4">
        <div class="alert alert-primary" role="alert">
            <h2>Eloquent Relations</h2>
        </div>

        <h4 class="badge bg-light text-dark p-3">BelongsToMany</h4>

        <div class="border-bottom col-12 my-3 pb-3">
            <label>Simplest</label><br>
            <x-inplace-relation
                :model="App\Models\User::find(3)"
                relation-name="badges"
                relation-column="label"
            />
        </div>

        <div class="border-bottom col-12 my-3 pb-3">
            <label>Direct Attribute</label><br>
            <x-inplace-relation
                model="App\Models\User:3"
                relation-name="badges"
                relation-column="label"
                :filter-options="function($query) { return $query->where('id', '>', 1); }"
                render-template="partials.badge-list"
                validation="required|min:10"
                :authorize="false"
                thumbnailed
                :thumbnail-width="50"
            >

            </x-inplace-relation>
        </div>

        <div class="border-bottom col-12 my-3 pb-3">
            <label>Via Provider</label><br>
            <x-inplace-relation
                id="AUTHOR_BADGES"
                model="App\Models\User:3"
            >

            </x-inplace-relation>
        </div>

        <div class="border-bottom col-12 my-3 pb-3">
            <label>Via Provider</label><br>
            <x-inplace-relation
                id="AUTHOR_BADGES2"
                model="App\Models\User:3"
            >

            </x-inplace-relation>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <h3>More to come</h3>
    </div>
</div>

@endsection

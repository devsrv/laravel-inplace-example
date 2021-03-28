@extends('app')

@section('content')

<div class="row">
    <div class="col-12 col-md-4">
        <div class="alert alert-primary" role="alert">
            <h2>Inline text editable</h2>
        </div>

        <div class="border-bottom col-12 my-3 pb-3">
            <label>Simplest</label>
            <x-inplace-component
                model="App\Models\User:name,1"
                :inline="true"
                validation="required|min:10"
            >
            {{ \App\Models\User::find(1)->name }}
            </x-inplace-component>
        </div>

        <div class="border-bottom col-12 my-3 pb-3">
            <label>Slotted Markup with global authorize override</label>
            <x-inplace-component
                model="App\Models\User:email,1"
                :inline="true"
                validation="required|email"
                :authorize="false"
            >
            <x-slot name="before"><div class="myclass anotherclass"><h2></x-slot>
            <x-slot name="after"></h2></div></x-slot>

            {{ \App\Models\User::find(1)->email }}
            </x-inplace-component>
        </div>

        <div class="border-bottom col-12 my-3 pb-3">
            <label>No Model Custom Save</label>
            <x-inplace-component
                :inline="true"
                value="custom save model"
                saveusing="App\Http\Inplace\CustomSave"
            />
        </div>

        <div class="border-bottom col-12 my-3 pb-3">
            <x-inplace-component
                :inline="true"
                model="App\Models\Post:title,1"
                saveusing="App\Http\Inplace\CustomSave"
                validation="required|min:10"
                :authorize="false"
            >
                With Model slotted custom save + (manual authorization)
            </x-inplace-component>
        </div>

        <div class="border-bottom col-12 my-3 pb-3">
            <label>Render as custom</label>
            <x-inplace-component
                model="App\Models\Post:title,1"
                :inline="true"
                render-as="CustomInlineRender"
            >
            {{ \App\Models\Post::find(1)->title }}
            </x-inplace-component>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <h3>More to come</h3>
    </div>

    <div class="col-12 col-md-4">
        <h3>More to come</h3>
    </div>
</div>

@endsection

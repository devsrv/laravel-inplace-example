@extends('app')

@section('content')

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <x-inplace-component
            model="App\Models\User:name,1"
            :inline="true"
            validation="required|min:10"
        >
        {{ \App\Models\User::find(1)->name }}
        </x-inplace-component>
    </div>

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <x-inplace-component
            model="App\Models\User:email,1"
            :inline="true"
            validation="required|email"
        >
        <x-slot name="before"><div class="myclass anotherclass"><h2></x-slot>
        <x-slot name="after"></h2></div></x-slot>

        {{ \App\Models\User::find(1)->email }}
        </x-inplace-component>
    </div>

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <x-inplace-component
            model="App\Models\User:name,1"
            :inline="true"
            value="custom save model"
            saveusing="App\Http\Inplace\CustomSave"
        />
    </div>

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <x-inplace-component
            :inline="true"
            saveusing="App\Http\Inplace\CustomSave"
            validation="required|min:10"
        >
            No Model custom save
        </x-inplace-component>
    </div>

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <x-inplace-component
            model="App\Models\User:name,1"
            :inline="true"
            render-as="CustomInlineRender"
        >
            Render as custom
        </x-inplace-component>
    </div>

@endsection

@extends('app')

@section('content')

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <x-inplace-component
            model="users:1"
            :inline="true"
            validation="required|min:10"
        >
        Lorem Ipsum
        </x-inplace-component>
    </div>

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <x-inplace-component
            model="users:1"
            :inline="true"
            validation="required|min:10"
        >
        <x-slot name="before"><div class="myclass anotherclass"><h2></x-slot>
        <x-slot name="after"></h2></div></x-slot>

        Lorem Ipsum is simply Souravd
        </x-inplace-component>
    </div>

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <x-inplace-component
            model="users:1"
            :inline="true"
            value="hello there"
            saveusing="App\Http\Inplace\CustomSave"
        />
    </div>

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <x-inplace-component
            model="users:1"
            :inline="true"
            saveusing="App\Http\Inplace\CustomSave"
        >
            HELLO SOURAV
        </x-inplace-component>
    </div>

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <x-inplace-component
            model="users:1"
            :inline="true"
            render-as="custom-inline-render"
        >
            hello there custom
        </x-inplace-component>
    </div>

@endsection

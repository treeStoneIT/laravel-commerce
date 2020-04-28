@extends('layouts.admin')

@section('page-title','Edit Category')

@section('content')
    <div class="rounded-lg bg-white shaddow-lg px-4 py-5">
        <livewire:admin-category-edit :category="$category" />
    </div>
@endsection

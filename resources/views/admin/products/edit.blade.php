@extends('layouts.admin')

@section('page-title','Edit Product')

@section('content')
    <div class="rounded-lg bg-white shaddow-lg px-4 py-5">
        <livewire:admin-product-edit :product="$product" />
    </div>
@endsection

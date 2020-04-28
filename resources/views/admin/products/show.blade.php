@extends('layouts.admin')

@section('page-title', $product->name)

@section('content')
    <livewire:admin-product-show :product="$product">
@endsection

@extends('layouts.admin')

@section('page-title', $category->name)

@section('content')
    <livewire:admin-category-show :category="$category">
@endsection

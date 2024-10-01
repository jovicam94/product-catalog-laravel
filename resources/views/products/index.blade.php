@extends('layouts.app')

@section('content')
    <div class="container mt-5" style="margin-bottom: 100px">
        @if (!empty($products))
        <h2 class="text-center mb-4">List of products</h2>
        <div class="row">
            <h1>Content 3x3</h1>
        </div>
        @else
        <h1>No products found</h1>
        @endif
    </div>
@endsection

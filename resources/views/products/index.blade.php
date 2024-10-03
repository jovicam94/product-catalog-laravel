@extends('layouts.app')

@section('content')
    <div class="container mt-5" style="margin-bottom: 100px">
        @if (!empty($products))
        <h2 class="text-center mb-4">List of products</h2>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <a class="product-link" href="{{ route('products.show', ['product' => $product->id]) }}">
                        <div class="card product-card h-100 shadow-sm">
                            <img
                                src="https://picsum.photos/200/300?random={{ $product->id }}" class="card-img-top" alt="{{ $product['title'] }}">
                            <div class="card-body text-center">
                                <h5 class="card-title font-weight-bold">{{ $product->title }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($product->description, 40) }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
        @else
        <h1>No products found</h1>
        @endif
    </div>
@endsection

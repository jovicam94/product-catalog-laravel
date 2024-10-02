@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card mb-4">
                    <img src="{{ asset('images/products/' . $product->id . '.jpg') }}"
                         class="card-img-top"
                         alt="{{ $product->name }}"
                         style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">{{ $product->title }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Add a Comment</h5>
                        <form action="{{ route('comments.store', [ 'product_id' => $product->id ]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="author">Your name:</label>
                                <input type="text" name="author" class="form-control" placeholder="Enter your name" />
                                @error('author')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Your email:</label>
                                <input type="email" required name="email" class="form-control" placeholder="Enter your email" />
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="comment">Your comment:</label>
                                <textarea required name="comment" class="form-control" rows="4" style="resize: none" placeholder="Enter your comment"></textarea>
                                @error('comment')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </form>
                    </div>
                </div>

                @if ($product->comments->count() > 0)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Comments</h5>
                            @foreach($product->comments as $comment)
                                <div class="mb-3">
                                    <p>
                                        <strong>Author: {{ $comment->author }}</strong>
                                    </p>
                                    <p>
                                        <strong>Email: {{ $comment->email }}</strong>
                                    </p>
                                    <p>{{ $comment->comment }}</p>
                                    <small class="text-muted">{{ $comment->created_at->format('d M Y, H:i') }}</small>
                                    <hr>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <p class="mb-lg-5">No comments yet.</p>
                @endif
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <h1 style="text-align: center">
        Admin dashboard
    </h1>
    <div class="container">


        <h2>Comments waiting for approval</h2>
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if($comments_for_approval->isEmpty())
            <div class="alert alert-info">No comments waiting for approval.</div>
        @else
            @foreach($comments_for_approval as $comment)
                <div class="card mb-3">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <h5 class="card-title">{{ $comment->author }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $comment->email }}</h6>
                            <p class="card-text">{{ $comment->comment }}</p>
                            <p class="card-text"><small class="text-muted">Added
                                    on {{ $comment->created_at->format('d M Y, H:i') }}</small></p>
                        </div>
                        <div>
                            <form action="{{ route('comments.approve', ['id' => $comment->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-md">Approve</button>
                            </form>
                            <form action="{{ route('comments.deny', ['id' => $comment->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-md">Deny</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center mt-4">
                {{ $comments_for_approval->links('pagination::bootstrap-5') }}
            </div>
    </div>
    @endif
@endsection

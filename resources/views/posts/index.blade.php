@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <div>
            <h4>All Post</h4>
        </div>
        <div>
            <a href="/posts/create" class="btn btn-primary">New Post</a>
        </div>
    </div>
    <div class="row">
        @forelse ($posts as $post)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    {{$post->title}}
                </div>
                <div class="card-body mb-3">
                    <div>
                        {{ Str::limit($post->body,50)}}
                    </div>
                    <a class="btn btn-outline-secondary btn-sm" href="/posts/{{$post->slug}}">Read more</a>
                </div><div class="card-footer">
                    Published on {{$post->created_at->diffForHumans()}}
                </div>
            </div>
        </div>
        @empty
            <div class="col-md-6">
                <div class="alert alert-info">
                    No Post.
                </div>
            </div>
        @endforelse   
    </div>
    <div class="d-flex justify-content-center">
        {{$posts->links()}}
    </div>
</div>
    
@endsection
@extends('layout')
@section('content')
    <style>
        .container {
            max-width: 450px;
        }
        .push-top {
            margin-top: 50px;
        }
    </style>
    <div class="card push-top">
        <div class="card-header">
            Edit & Update
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('posts.update', $post->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $post->title }}"/>
                </div>
                <div class="form-group">
                    <label for="text">Text</label>
                    <input type="text" class="form-control" name="text" value="{{ $post->text }}"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Update Post</button>
            </form>
        </div>
    </div>
@endsection

@extends('layout')
@section('content')
    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>
    <div class="push-top">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table">
            <thead>
            <tr class="table-warning">
                <td>ID</td>
                <td>Title</td>
                <td>Text</td>
                <td class="text-center">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($post as $posts)
                <tr>
                    <td>{{$posts->id}}</td>
                    <td>{{$posts->title}}</td>
                    <td>{{$posts->text}}</td>
                    <td class="text-center">
                        <a href="{{ route('posts.edit', $posts->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                        <form action="{{ route('posts.destroy', $posts->id)}}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection

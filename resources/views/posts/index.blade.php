@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts
                        <a class="btn btn-primary float-right" href="{{action('PostController@create')}}">Add post</a>
                    </div>
                    <div class="card-body">
                        @foreach($posts as $post)
                            <table width="100%">
                                <tr>
                                    <td width="70%">
                                        <a href="{{action('PostController@show', $post->id)}}">
                                            {{ $post->title->rendered }}
                                        </a>
                                    </td>
                                    <td width="15%">
                                        <a class="btn btn-info"  href="{{action('PostController@edit', $post->id)}}">
                                            Edit
                                        </a>
                                    </td>
                                    <td width="15%">
                                        <form action="{{ action('PostController@destroy', $post->id) }}" method="POST">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

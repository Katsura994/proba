@extends('layouts.admin')


@section('content')

    <h1>Edit Posts</h1>



    <div class="row">

        <div class="col-sm-3">

            <img src="{{$post->photo->file}}" alt="" class="img-responsive">
            
        </div>

        <div class="col-sm-9">
        <form method="post" action="{{ action('AdminPostsController@update', $post->id) }}" accept-charset="utf-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', request('title') ?? $post->title ?? null) }}" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id">
                    <option value="0">Choose Options</option>
                    @foreach($categories as $category)
                        @if($category->id == $post->category_id)
                            <option value="{{$category->id}}" selected="selected">{{$category->name}}</option>
                        @else
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="photo_id">Add File</label>
                <input type="file" id="photo_id" name="photo_id" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="body">Body text</label>
                <textarea name="body" id="body" class="form-control" cols="20" rows="5">{{ old('body', request('body') ?? $post->body ?? null)}}</textarea>
            </div>

            <div class="form-group">
                <input type="submit" value="Edit Post" class="btn btn-primary" />
            </div>

        </form>

        <form method="post" action="{{ action('AdminPostsController@destroy', $post->id) }}" accept-charset="utf-8">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <div class="form-group">
                <input type="submit" value="Delete Post" class="btn btn-danger" />
            </div>
        </form>
        </div>

    </div>
    <div class="row">@include('includes.form_error');</div>

@stop
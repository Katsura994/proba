@extends('layouts.admin')


@section('content')

    <h1>Create Posts</h1>
    <div class="row">
    <form method="post" action="{{ action('AdminPostsController@store') }}" accept-charset="utf-8" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', request('title') ?? $user->title ?? null) }}" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id">

                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="photo_id">Add File</label>
                <input type="file" id="photo_id" name="photo_id" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="body">Body text</label>
                <textarea name="body" id="body" class="form-control" cols="20" rows="5">{{ old('body', request('body') ?? $user->body ?? null)}}</textarea>
            </div>

            <div class="form-group">
                <input type="submit" value="Create Post" class="btn btn-primary" />
            </div>

        </form>
        </div>
        <div class="row">@include('includes.form_error');</div>

@stop
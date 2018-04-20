@extends('layouts.admin')


@section('content')
    <h1>Categories</h1>
    <div class="col-sm-6">
        <form method="post" action="{{ action('AdminCategoriesController@update', $category->id) }}" accept-charset="utf-8">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', request('name') ?? $category->name ?? null) }}" class="form-control"/>
            </div>

            <div class="form-group">
                <input type="submit" value="Edit Category" class="btn btn-primary" />
            </div>

        </form>
        <form method="post" action="{{ action('AdminCategoriesController@destroy', $category->id) }}" accept-charset="utf-8">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <div class="form-group">
                <input type="submit" value="Delete Category" class="btn btn-danger" />
            </div>
        </form>
    </div>




@stop
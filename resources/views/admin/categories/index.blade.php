@extends('layouts.admin')


@section('content')
    <h1>Categories</h1>
    <div class="col-sm-6">
        <form method="post" action="{{ action('AdminCategoriesController@store') }}" accept-charset="utf-8">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', request('name') ?? $category->name ?? null) }}" class="form-control"/>
                </div>

                <div class="form-group">
                    <input type="submit" value="Create Category" class="btn btn-primary" />
                </div>

            </form>
    </div>
    <div class="col-sm-6">
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>
            @if($categories)
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'no date'}}</td>
                        <td>{{$category->updated_at ? $category->updated_at->diffForHumans() : 'no date'}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>



@stop
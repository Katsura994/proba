@extends('layouts.admin')

@section('content')

    <h1>Create user</h1>

    <form method="post" action="{{ action('AdminUsersController@store') }}" accept-charset="utf-8" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', request('name') ?? $user->name ?? null) }}" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', request('email') ?? $user->email ?? null) }}" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="role_id">Role</label>
            <select class="form-control" id="role_id" name="role_id">
                <option value="0">Choose Options</option>
                @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="is_active">Status</label>
            <select class="form-control" id="is_active" name="is_active">
                <option value="1">Active</option>
                <option value="0" selected="selected">Not active</option>
            </select>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="{{ old('email', request('email') ?? $user->email ?? null) }}" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="photo_id">Add File</label>
            <input type="file" id="photo_id" name="photo_id" class="form-control"/>
        </div>

        <div class="form-group">
            <input type="submit" value="Create User" class="btn btn-primary" />
        </div>

    </form>
    @include('includes.form_error')


@stop
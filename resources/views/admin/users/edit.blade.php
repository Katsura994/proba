@extends('layouts.admin')

@section('content')

    <h1>Edit user</h1>

    <div class="row">
        <div class="col-sm-3">
            <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
        </div>

        <div class="col-sm-9">
            <form method="post" action="{{ action('AdminUsersController@update', $user->id) }}" accept-charset="utf-8" enctype="multipart/form-data">
                {{ method_field('PUT') }}
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
                            @if($role->id == $user->role_id)
                                <option value="{{$role->id}}" selected="selected">{{$role->name}}</option>
                            @else
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="is_active">Status</label>
                    <select class="form-control" id="is_active" name="is_active">
                        <option value="1" @if($user->is_active=='1') selected='selected' @endif>Active</option>
                        <option value="0" @if($user->is_active=='0') selected='selected' @endif>Not active</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    {{--<input type="password" id="password" name="password" value="{{ old('password', request('password') ?? $user->password ?? null) }}" class="form-control"/>--}}
                    <input type="password" id="password" name="password" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="photo_id">Add File</label>
                    <input type="file" id="photo_id" name="photo_id" class="form-control"/>
                </div>

                <div class="form-group">
                    <input type="submit" value="Edit User" class="btn btn-primary" />
                </div>

            </form>

        </div>
    </div>
    <div class="row">
       @include('includes.form_error') 
    </div>



@stop
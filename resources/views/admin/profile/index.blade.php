@extends('layouts.app')
@section('content')
@if (count($errors)>0)
   <ul class="list-group">
    @foreach ($errors->all() as $error)

        <li class="list-group-item text-danger">
            {{$error}}
        </li>
    @endforeach


   </ul>

@endif
<div class="card">
    <div class="card-header">
        Edit Profile
    </div>
    <div class="card-body">
        <form action="{{-- {{ route('profile.update') }} --}}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="form-group">
                <label for="title">User Name</label>
                <input type="text" class="form-control" value="{{$user->name}}" readonly="">
            </div>
            <div class="form-group">
                <label for="title">Email:</label>
                <input type="email" class="form-control" value="{{$user->email}}" readonly="">
            </div>
            <div class="form-group">
                <label for="title">New Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">Facebook:</label>
                <input type="text" name="facebook" class="form-control"value="{{$user->profile->facebook}}">
            </div>
            <div class="form-group">
                <label for="title">Youtube:</label>
                <input type="text" name="youtube" class="form-control" value="{{$user->profile->youtube}}">
            </div>
              <div class="form-group">
                <label for="title">Upload New Avatar:</label>
                <input type="file" name="avatar" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">About You:</label>
                <textarea name="about" id="summernote" cols="30" rows="10" class="form-control">{{$user->profile->about}}</textarea>
            </div>


            <div class="text-center">
                <button class="btn btn-success" type="submit">Update Profile</button>
            </div>

        </form>

    </div>
</div>

@endsection


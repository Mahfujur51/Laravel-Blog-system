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
        Create User
    </div>
    <div class="card-body">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">User Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">Email</label>
                <input type="email" name="email" class="form-control">
            </div>



            <div class="text-center">
                <button class="btn btn-success" type="submit">Create User</button>
            </div>

        </form>

    </div>
</div>

@endsection


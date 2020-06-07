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
        Settings
    </div>
    <div class="card-body">
        <form action="{{ route('settings.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Site  Name</label>
                <input type="text" name="site_name" class="form-control" value={{$setting->site_name}}>
            </div>
            <div class="form-group">
                <label for="title">Email</label>
                <input type="email" name="contact_email" class="form-control" value="{{$setting->contact_email}}">
            </div>
            <div class="form-group">
                <label for="title">Address</label>
                <input type="text" name="contact_address" class="form-control" value="{{$setting->contact_address}}">
            </div>
            <div class="form-group">
                <label for="title">Email</label>
                <input type="text" name="contact_number" class="form-control" value="{{$setting->contact_number}}">
            </div>



            <div class="text-center">
                <button class="btn btn-success" type="submit">update Settings</button>
            </div>

        </form>

    </div>
</div>

@endsection


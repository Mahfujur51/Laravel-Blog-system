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
        Show All User
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Permission</th>
                <th>Delete</th>
            </thead>
            <tbody>
                @if ($users->count()>0)
                @foreach ($users as $user)

               <tr>
                   <td>
                       <img src="{{ asset($user->profile->avatar) }}" alt="{{$user->name}}" height="100" width="100">
                   </td>
                   <td>
                       {{$user->name}}
                   </td>
                   <td>
                      @if ($user->admin)
                          <a href="{{ route('user.radmin',$user->id) }}" class="btn btn-sm btn-danger">Remove Permission</a>
                       @else
                        <a href="{{ route('user.admin',$user->id) }}" class="btn btn-sm btn-success">Make Permission</a>
                      @endif
                   </td>
                   <td>
                      @if (Auth::id()!==$user->id)
                         <a href="{{ route('user.delete',$user->id) }}" class="btn btn-danger">Delete</a>
                      @endif

                   </td>
               </tr>

                @endforeach
                @else
                <tr>
                    <td colspan="4" class="text-center">No User Created!!</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection

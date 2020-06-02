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
        Create New Tag
    </div>
    <div class="card-body">
        <form action="{{ route('tag.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Tag Name</label>
                <input type="text" name="tag" class="form-control">
            </div>


            <div class="text-center">
                <button class="btn btn-success" type="submit">Create Tag</button>
            </div>

        </form>

    </div>
</div>

@endsection

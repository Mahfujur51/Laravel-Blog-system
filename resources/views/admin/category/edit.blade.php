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
        Update Category: {{$category->name}}
    </div>
    <div class="card-body">
        <form action="{{ route('category.update',$category->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Category Name</label>
                <input type="text" name="name" class="form-control" value="{{$category->name}}">
            </div>


            <div class="text-center">
                <button class="btn btn-success" type="submit">Create Category</button>
            </div>

        </form>

    </div>
</div>

@endsection

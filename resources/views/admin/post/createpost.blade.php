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
        Create New Post
    </div>
    <div class="card-body">
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
               <label for="">Select Category</label>
               <select name="category_id" id="" class="form-control">
                <option >Select a category</option>
                @foreach ($category as $cat)
                    {{-- expr --}}

                   <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
               </select>
            </div>

            <div class="form-group">
                <label for="">Fitured Image</label>
                <input type="file" name="featured" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Content</label>
                <textarea name="content" class="form-control" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="text-center">
                <button class="btn btn-success" type="submit">Create Post</button>
            </div>

        </form>

    </div>
</div>

@endsection

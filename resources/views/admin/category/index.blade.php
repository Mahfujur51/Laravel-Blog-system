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
        Create New Category
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
            <th>Name</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($category as $cat)
                {{-- expr --}}

            <tr>
                <td>{{$cat->name}}</td>
                <td>{{$cat->created_at}}</td>
                <td>{{$cat->updated_at}}</td>
                <td>
                    <a href="{{ route('category.edit',$cat->id) }}" class="btn btn-success">Edit</a>
                    <a href="{{ route('category.delete',$cat->id)}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
             @endforeach
        </tbody>

      </table>

    </div>
</div>

@endsection

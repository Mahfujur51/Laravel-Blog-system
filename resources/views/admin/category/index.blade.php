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
        Show All Category
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
           @if ($category->count()>0)
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
            @else
            <tr>
                <td class="text-center" colspan="4">No Category Created|| Please Create Category</td>
            </tr>
           @endif
        </tbody>

      </table>

    </div>
</div>

@endsection

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
        Show All Tags
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
           @if ($tag->count()>0)
            @foreach ($tag as $tags)
                {{-- expr --}}

            <tr>
                <td>{{$tags->tag}}</td>
                <td>{{$tags->created_at}}</td>
                <td>{{$tags->updated_at}}</td>
                <td>
                    <a href="{{ route('tag.edit',$tags->id) }}" class="btn btn-success">Edit</a>
                    <a href="{{ route('tag.delete',$tags->id)}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
             @endforeach
            @else
            <tr>
                <td class="text-center" colspan="4">No Tag Created|| Please Create Tag</td>
            </tr>
           @endif
        </tbody>

      </table>

    </div>
</div>

@endsection

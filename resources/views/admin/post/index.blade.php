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
        Show All Post
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Edit</th>
                <th>Trashed</th>
            </thead>
            <tbody>
                @if ($post->count()>0)
                @foreach ($post as $posts)
                {{-- expr --}}
                <tr>
                    <td><img src="{{$posts->featured}}" alt="{{$posts->title}}" width="120" height="80"></td>
                    <td>{{$posts->title}}</td>
                    <td>
                        <a href="{{ route('post.edit',$posts->id) }}" class="btn btn-success">Eidt</a>
                    </td>
                    <td> <a href="{{ route('post.delete',$posts->id) }}" class="btn btn-danger">Trushed</a></td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4" class="text-center"> No Post created Yet !!</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection

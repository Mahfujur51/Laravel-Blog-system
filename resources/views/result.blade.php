@extends('layouts.fontend')
@section('content')
<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Search result:{{$query}}</h1>
    </div>
</div>
<div class="container">
    <div class="row medium-padding120">
        <main class="main">

            <div class="row">
                        <div class="case-item-wrap">
                        @if ($pposts->count()>0)
                            @foreach ($pposts as $post)
                                {{-- expr --}}

                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{$post->featured}}" alt="our case">
                                    </div>
                                    <h6 class="case-item__title"><a href="{{ route('single.post',$post->slug) }}">{{$post->title}}</a></h6>
                                </div>
                            </div>
                             @endforeach
                            {{-- expr --}}
                        @else
                        <h2 class="text-center">No result found!! </h2>
                        @endif



                            </div>
                        </div>
            </div>

            <!-- End Post Details -->
            <br>
            <br>
            <br>
            <!-- Sidebar-->

            <div class="col-lg-12">
                <aside aria-label="sidebar" class="sidebar sidebar-right">
                    <div  class="widget w-tags">
                        <div class="heading text-center">
                            <h4 class="heading-title">ALL BLOG TAGS</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>

                        <div class="tags-wrap">
                            @foreach ($tags as $ttags)
                                {{-- expr --}}

                            <a href="{{ route('tag.single',$ttags->id) }}" class="w-tags-item">{{$ttags->tag}}</a>
                             @endforeach

                        </div>
                    </div>
                </aside>
            </div>

            <!-- End Sidebar-->

        </main>
    </div>
</div>
@endsection

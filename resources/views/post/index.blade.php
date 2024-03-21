@extends('layouts.app')
@section('header')
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">به پست هایی که شما ساختید خوش امدید</h1>
                <p class="lead mb-0">اینجا همه پست هایی که شما ساخته اید را میتوانید ببنید</p>
            </div>
        </div>
    </header>
@endsection
@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                @foreach($posts as $post)
                    <div class="card mb-4">
                        <a href="{{ $post->slug }}"><img class="card-img-top" src="{{ asset('storage/'.$post->image) }}"
                                                         alt="{{ $post->title }}"/></a>
                        <div class="card-body">
                            <div class="text-muted mb-2">نوشته شده در {{ $post->updated_at }}
                                توسط {{ $post->user->name }}</div>
                            <h2 class="card-title">{{ $post->title }}</h2>
                            {{--<p class="card-text">
                                {{ $post->body }}
                            </p>--}}
                            <a class="btn btn-primary" href="{{ $post->slug }}">ادامه مطلب ←</a>
                            <form action="{{ route('post.destroy',$post->id) }}" method="post">
                            <a class="btn btn-success" href="{{ route('post.edit',$post->id) }}">ویرایش</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">حذف</button>
                            </form>
                        </div>
                    </div>
                @endforeach
                <!-- Pagination-->
                {{--<nav aria-label="Pagination">
                    <hr class="my-0"/>
                    <ul class="pagination justify-content-center my-4">
                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a>
                        </li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                        <li class="page-item"><a class="page-link" href="#!">2</a></li>
                        <li class="page-item"><a class="page-link" href="#!">3</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                        <li class="page-item"><a class="page-link" href="#!">15</a></li>
                        <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                    </ul>
                </nav>--}}
            </div>
            @include('layouts.sidebar')
        </div>
    </div>
@endsection
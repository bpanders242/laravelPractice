@extends('layout')

@section('content')

    <div id="wrapper">
        <div id="page"
             class="container">

            @foreach($articles as $article)
                <div id="wrapper">
                    <div id="page" class="container">
                        <div id="content">
                            <div class="title">
                                <h2><a href="{{route('articles.show', $article)}}">{{$article->title}}</a></h2>
                                <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
                                <span class="byline">{{$article->excerpt}}</span>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection

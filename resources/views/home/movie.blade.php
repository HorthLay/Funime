<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <!-- Basic need -->
    @include('home.css')
    <style>
        .episode-button {
            margin: 10px;
            border-radius: 5px;
            padding: 10px;
            border: 1px solid black;
            background-color: rgb(16, 0, 158);
            color: white;
            cursor: pointer;
            transition: background-color 0.3s, border-color 0.3s;
        }
        
        .episode-button:hover {
            background-color: rgb(12, 0, 126);
            border-color: rgb(12, 0, 126);
        }

        .sidebar {
            margin-top: 20px;
        }

        .recent-item {
            margin-bottom: 10px;
        }

        .recent-item span {
            font-weight: bold;
            margin-right: 5px;
        }

        .flex-it {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .flex-it img {
            max-width: 100%;
            height: auto;
        }

        .sb-recentpost {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<!-- preloading -->
@include('home.preloader')
<!-- end of preloading -->

<!-- BEGIN | Header -->
<header class="ht-header">
    @include('home.header')
</header>
<!-- END | Header -->

<!-- blog detail section -->
<div class="hero common-hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="hero-ct">
                    <h1>Movie Watch</h1>
                    <ul class="breadcrumb">
                        <li class="active"><a href="#" style="text-decoration: none;color: white">Home</a></li>
                        <li style="color: skyblue;"><span class="ion-ios-arrow-right" style="color: aqua;"></span>Movie</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-single">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="blog-detail-ct">
                    <h1>{{ $article->title }}</h1>
                    <span class="time">{{ $article->created_at->format('d M Y') }}</span>
                    <iframe id="episode-iframe" src="{{ $episodes->first()->video_url }}" frameborder="0" allowfullscreen style="width: 100%; height: 500px;"></iframe>
                    <h4>Episodes</h4>
                    <div style="margin-top: 15px;">
                        @foreach($episodes as $episode)
                        <button class="episode-button" data-url="{{ $episode->video_url }}" type="button">{{ $episode->title }}</button>
                        @endforeach
                    </div>
                    <div style="margin-top: 15px;">
                        <h4>Highlights</h4>
                        <div class="flex-it flex-ct"> 
                            <p>{{ $article->body }}</p>
                            <img src="{{ asset('articles/' . $article->featured_image) }}" style="max-width: 35%; height: auto;border-radius: 10px" alt="{{ $article->title }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="sb-cate sb-it">
                        <h4 class="sb-title">Categories</h4>
                        <ul>
                            @foreach ($categories as $category)
                            <li><a href="{{ route('articles_by_category', $category->name_en) }}">{{ $category->name_en }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sb-recentpost sb-it">
                        <h4 class="sb-title">Like AND REVIEW</h4>
                        <div class="recent-item">
                            <span>{{ $article->likes->count() }}</span>
                            <h6><a href="#">Like</a></h6>
                        </div>
                        <div class="recent-item">
                            <span>{{ $article->comments->count() }}</span>
                            <h6><a href="#">Comment</a></h6>
                        </div>
                        <div class="sb-cate sb-it">
                            <h4 class="sb-title">Ads</h4>

                            @if($article->mega_video_url != null)
                            <iframe src="{{ $article->mega_video_url }}" frameborder="0" allowfullscreen style="width: 250px; height: 200px;"></iframe>
                            @else
                            <img src="{{ asset('articles/' . $article->featured_image) }}" alt="{{ $article->title }}" style="width: 250px; height: auto;border-radius: 10px;">
                            @endif
                        </div>
                    </div>
                    <div class="ads">
                        <!-- Add ad content here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of blog detail section -->

@include('home.footer')

<script>
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.episode-button');
    const iframe = document.getElementById('episode-iframe');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const url = this.getAttribute('data-url');
            iframe.src = url;
        });
    });
});
</script>
</body>
</html>

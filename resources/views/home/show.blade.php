<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">

<!-- moviegrid07:29-->
<head>
	<!-- Basic need -->
	@include('home.css')
	<style>
        .parent-btn {
            display: inline-flex;
			justify-content: center;
            align-items: center;
            text-decoration: none;
            color: #ff0000; /* Red color for the heart icon */
            font-size: 16px;
            transition: color 0.3s;
            cursor: pointer;
        }

        .parent-btn i {
            margin-right: 5px;
        }

        .parent-btn:hover {
            color: #ff4d4d; /* A lighter red on hover */
        }

		.popup {
    display: none;
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.popup-content {
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    width: 80%;
    max-width: 500px;
    position: relative;
}

.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
}

.redbtn {
    background-color: red;
    color: #fff;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
}

.article-content h6 {
  color: #fff;
  margin: 15px;
}

.article-content .highlights {
  word-wrap: break-word;
  word-break: break-word;
}

.article-title {
            display: block;
            font-size: 1.5em;
            font-weight: bold;
            color: #fff;
            text-decoration: none;
            margin-bottom: 10px;
            align-content: center;
			text-align: center;
			justify-content: center;
			margin-left: 100px;
        }

		@media (max-width: 991px) {
            .article-title {
				margin-left: 30px;
            }
        }
		@media (max-width: 1200px){
			.article-title {
				margin-right: 50px;
			}
		}
		@media (max-width: 767px) {
			.article-title {
				margin-left: 30px;
			}
		}
		@media (max-width: 767px) {
			.article-title {
				margin-left: 30px;
			}
		}
    </style>

</head>
<body>
<!--preloading-->
@include('home.preloader')
<!--end of preloading-->
<!--login form popup-->
<!--end of signup form popup-->

<!-- BEGIN | Header -->
<header class="ht-header">
	<div class="container">
		<nav class="navbar navbar-default navbar-custom">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header logo">
					
				</div>
				<a href="/"><img class="logo" src="{{asset ("movies/images/logo121.png")}}" alt="" width="119" height="auto"></a>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav flex-child-menu menu-left">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
					   
					</ul>
					<ul class="nav navbar-nav flex-child-menu menu-right">
								
						
	
					 
					
	
						@if(Route::has('login'))
	
	
						@auth
				
			 <form style="padding: 10px;" method="POST" action="{{ route('logout') }}">
						  @csrf
	
						  
						  <input style=" margin-top: 10%;border: none;border-radius: 50px;border-color: green;background-color: #ff0000;color: white;padding: 5px 10px;cursor: pointer;" type="submit" value="logout"><br>
						</form>
			  
					  @else<ul class="nav navbar-nav flex-child-menu menu-right">
						@if (Auth::check() && Auth::user()->user_image)
							<img class="user-image" src="users/{{ Auth::user()->user_image }}" alt="User Image">
						@else
							<img class="user-image" src="img/user.png" alt="Default User Image">
						@endif
					
						@if (Auth::check() && Auth::user()->name)
							<h7 class="user-name">Name: {{ Auth::user()->name }}</h7>
						@else
							<h2>Unknown</h2>
						@endif
					
						<div class="user-email">
							<span><i class="fa fa-envelope"></i>{{ Auth::user()->email }}</span>
						</div>
					
						@if (Route::has('login'))
							@auth
								<form class="logout-form" method="POST" action="{{ route('logout') }}">
									@csrf
									<input type="submit" value="Logout">
								</form>
							@else
								<li class="loginLink"><a href="#">LOG IN</a></li>
								<li class="btn signupLink"><a href="#">SIGN UP</a></li>
							@endauth
						@endif
					</ul>
					
						<li class="loginLink"><a href="#">LOG In</a></li>
						<li class="btn signupLink"><a href="#">sign up</a></li>
						@endauth
			  
						@endif
						
					</ul>
				</div>
			<!-- /.navbar-collapse -->
		</nav>
		
		<!-- top search form -->
	
	
		
		
	</form>
	<div class="top-search">
		<form action="{{ url('/search') }}" method="GET" class="row g-3">
			<div class="col-12">
			</div>
			<div class="col-md-8">
				<div class="form-group">
					<input style="padding-right: 50%;" type="text" name="search" class="form-control" placeholder="Type a keyword">
				</div>
			</div>
		</form>
	</div>
	</div>
</header>
<!-- END | Header -->

<div class="hero sr-single-hero sr-single">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				{{-- <!-- <h1> movie listing - list</h1>
				<ul class="breadcumb">
					<li class="active"><a href="#">Home</a></li>
					<li> <span class="ion-ios-arrow-right"></span> movie listing</li>
				</ul> --> --}}
			</div>
		</div>
	</div>
</div>
<div class="page-single movie-single movie_single">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-4 col-sm-12 col-xs-12">
                @if($article->featured_image)
				<div class="movie-img sticky-sb">
					<img src="{{ asset('articles/' . $article->featured_image) }}" alt="">
                    @endif
					<div class="movie-btn">	
                        {{-- youtube --}}
						<div class="btn-transform transform-vertical red">
                            @php
                            $youtubeUrl = $article->youtube_video_url;
                            $videoId = null;
                            if (preg_match('/^.*youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=)([^"&?\/\s]{11})/', $youtubeUrl, $matches)) {
                                $videoId = $matches[1];
                            }
                            $embedUrl = $videoId ? "https://www.youtube.com/embed/$videoId" : null;
                        @endphp
							<div><a href="{{ $embedUrl }}" class="item item-1 redbtn"> <i class="ion-play"></i> Watch Trailer</a></div>
                            @if ($embedUrl)
							<div><a href="{{ $embedUrl }}" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
                            @else
                            <p>Invalid YouTube URL.</p>
                            @endif
						</div>
						<div class="btn-transform transform-vertical">
							@if($article->episodes->count() > 0)
							<div><a href="{{url('movie', $article->id)}}" class="item item-1 yellowbtn"> <i class="ion-play"></i>WatchNow</a></div>
							<div><a href="{{url('movie', $article->id)}}" class="item item-2 yellowbtn"><i class="ion-play"></i></a></div>
							@else
							<div><p>Coming Soon!!</p></div>
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="movie-single-ct main-content">
					<h1 class="bd-hd">{{ $article->title }} <span> [{{ $article->episodes->count() }} episodes]</span></h1>
					<div class="social-btn">
						<form id="like-form-{{ $article->id }}" action="{{ route('articles.like', $article) }}" method="POST" style="display: none;">
							@csrf
						</form>
					
						<a href="#" class="parent-btn" onclick="event.preventDefault(); document.getElementById('like-form-{{ $article->id }}').submit();">
							<i class="fa {{ $article->likes->where('user_id', auth()->id())->count() ? 'fa-heart' : 'fa-heart-o' }}"></i>
							{{ $article->likes->where('user_id', auth()->id())->count() ? ' Unlike' : ' Like' }}
						</a>
						<div class="hover-bnt">
							<a href="#" class="parent-btn"><i class="ion-android-share-alt"></i>Contact Us</a>
							<div class="hvr-item">
								<a href="https://web.facebook.com/horth.lay.31" class="hvr-grow"><i class="ion-social-facebook"></i></a>
								<a href="https://www.youtube.com/@holix2041" class="hvr-grow"><i class="ion-social-youtube"></i></a>
							</div>
						</div>		
					</div>
					<div class="movie-rate">
						<div class="rate">
							<i class="ion-heart" color="red"></i>
							<p><span>{{$article->likes->count()}} LIKES</span><br>
								<span class="rv">{{ $article->comments->count() }} Reviews</span>
							</p>
						</div>
						@php
              $articleView = \App\Models\ArticleView::where('article_id', $article->id)->first();
                        @endphp
						<div class="rate-star">
							@if($articleView)
                          <p><img src="{{ asset('images/eye.png') }}" width="35" height="auto" alt="">Views: {{ $articleView->views }} times.</p>
                                 @endif
						</div>
					</div>
					<div class="movie-tabs">
						<div class="tabs">
							<ul class="tab-links tabs-mv tabs-series">
								<li class="active"><a href="#overview">Overview</a></li>
								<li><a href="#reviews">Reviews</a></li>                    
							</ul>
						    <div class="tab-content">
						        <div id="overview" class="tab active">
						            <div class="row">
						            	<div class="col-md-8 col-sm-12 col-xs-12">
						            		<p>{{ $article->body }}</p>
						            		<div class="title-hd-sm">
												<h4>{{$article->category}}</h4>
											</div>
											<!-- movie cast -->
											<div class="mvcast-item text-center">                                            
												@if($article->featured_image)
													<img src="{{ asset('articles/' . $article->featured_image) }}" style="border-radius: 10px;" width="100px" height="auto" alt="" class="img-fluid mb-3">
												@endif
												<div class="cast-it">
													<div class="cast-left series-it">
														<div>
															<a href="#" class="article-title">{{$article->title}}</a>
															<p>Episodes: {{ $article->episodes->count() }}</p>
															<h6 style="color: #fff; margin: 1px;">Highlights</h6>
															<h6 style="padding: 15px; color: #fff; font-weight: 100; font-family: system-ui;">{{ $article->highlights }}</h6>
														</div>
													</div>                                            
												</div>    
											</div>
											
						            		
											
						            	</div>
						            	
						            </div>
						        </div>
						        <div id="reviews" class="tab review">
						           <div class="row">
						            	<div class="rv-hd">
						            		<div class="div">
							            		<h3>{{$article->category}}</h3>
						       	 				<h2>{{ $article->title }}</h2>
							            	</div>
											<a href="#" class="redbtn" id="openPopup">Write Review</a>
											<div id="popup" class="popup">
												<div class="popup-content">
													<span class="close-btn" id="closePopup">&times;</span>
													<h2>Write Your Review</h2>
													<form action="{{ route('articles.comment', $article) }}" method="POST">

														@csrf
														<!-- Your form elements here -->
														<textarea rows="4" cols="50" name="body" placeholder="Enter your review..." required></textarea>
														<button type="submit" style="border-radius: 50px;color: blue;margin-top: 10px">Submit</button>
													</form>
												</div>
											</div>		
						            	</div>

									
										@foreach($comments as $comment)
										@include('home.comment', ['comment' => $comment])
									@endforeach
							
									<!-- Pagination Links -->
									{{ $comments->appends(['per_page' => $comments->perPage()])->links() }}
								</div>
							
								<div class="topbar-filter">
									<form action="{{ route('article_detail', $article->id) }}" method="GET" id="perPageForm">
										<label for="per_page">Comments per page:</label>
										<select name="per_page" id="per_page" onchange="document.getElementById('perPageForm').submit()">
											<option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5 Comments</option>
											<option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10 Comments</option>
											<option value="15" {{ request('per_page') == 15 ? 'selected' : '' }}>15 Comments</option>
										</select>
									</form>
								</div>
						            </div>
						        </div>
						       
					       	 	</div>

						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- footer section-->

<!-- end of footer section-->



@include('home.footer')



<script src="{{asset ("movies/js/jquery.js")}}"></script>
<script src="{{asset ("movies/js/plugins.js")}}"></script>
<script src="{{asset ("movies/js/plugins2.js")}}"></script>
<script src="{{asset ("movies/js/custom.js")}}"></script>



<script>
	document.addEventListener('DOMContentLoaded', function() {
    const openPopupBtn = document.getElementById('openPopup');
    const popup = document.getElementById('popup');
    const closePopupBtn = document.getElementById('closePopup');

    openPopupBtn.addEventListener('click', function(event) {
        event.preventDefault();
        popup.style.display = 'flex';
    });

    closePopupBtn.addEventListener('click', function() {
        popup.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target === popup) {
            popup.style.display = 'none';
        }
    });
});
</script>
</body>

<!-- moviegrid07:38-->
</html>
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

</head>
<body>
<!--preloading-->
@include('home.preloader')
<!--end of preloading-->
<!--login form popup-->
<!--end of signup form popup-->

<!-- BEGIN | Header -->
<header class="ht-header">
	@include('home.header')
</header>
<!-- END | Header -->

<div class="hero common-hero">
	<div class="container">
		<div class="row">
            <div class="col-md-12">
                <div class="hero-ct">
                    <h1> {{ $categorys->name_en }} </h1>
                    <ul class="breadcumb">
                        <li class="active"><a href="#">Home</a></li>
                    </ul>
                </div>
            </div>
        </div>
	</div>
</div>
<div class="page-single">
    <div class="container">
        <div class="row ipad-width">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="topbar-filter">
                    <p>Found <span>{{ $articles->count() }}</span> in total</p>
					<label>Type</label>

					
					
					<a href="movielist.html" class="list"><i class="ion-ios-list-outline "></i></a>
					<a  href="moviegrid.html" class="grid"><i class="ion-grid active"></i></a>
				</div>
				<div class="flex-wrap-movielist">
					@foreach($articles as $article)
						<div class="movie-item-style-2 movie-item-style-1">
                            @if($article->featured_image)
							<img src="{{ asset('articles/' . $article->featured_image) }}"alt="">
							<div class="hvr-inner">
	            				<a  href="{{url('article_detail', $article->id)}}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
                            @endif
							<div class="mv-item-infor">
								<h6><a href="#">{{ $article->title }}</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							</div>
						</div>					
						@endforeach		
						
					</div>
				<div class="topbar-filter">
					<label>Movies per page:</label>
					<form id="perPageForm" method="GET" action="{{ route('home') }}">
						<select name="per_page" onchange="document.getElementById('perPageForm').submit();">

							<option value="20" {{ request('per_page') == 3 ? 'selected' : '' }}>3 Movies</option>
							<option value="10" {{ request('per_page') == 5 ? 'selected' : '' }}>5 Movies</option>
						</select>
					</form>
						<div class="pagination2">
							<span>{{$articles->onEachSide(1)->links()}}</span>
							
						</div>
					</div>
				</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="sidebar">
					<div class="searh-form">
						<h4 class="sb-title">Top Movie Like</h4>
						
					</div>
					<div class="ads">
						<img src="images/uploads/ads1.png" alt="">
					</div>
					<div class="sb-facebook sb-it">
						<h4 class="sb-title">Find us on Facebook</h4>
						<iframe src="#" data-src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ftemplatespoint.net%2F%3Ffref%3Dts&tabs=timeline&width=340&height=315px&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=true&appId"  height="315" style="width:100%;border:none;overflow:hidden" ></iframe>
					</div>
					<div class="sb-twitter sb-it">
						<h4 class="sb-title">Tweet to us</h4>
						<div class="slick-tw">
							<div class="tweet item" id=""><!-- Put your twiter id here -->
							</div>
							<div class="tweet item" id=""><!-- Put your 2nd twiter account id here -->
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



</body>

<!-- moviegrid07:38-->
</html>
<div class="page-single">
    <div class="container">
        <div class="row ipad-width">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="topbar-filter">
                    <p>Found <span>{{ $articles->count() }}</span> in total</p>
					<label>Type</label>

					
					<select name="category" id="categorySelect" onchange="goToCategory()">
						<option>Select Option</option>
						@foreach ($categories as $category)
							<option value="{{ route('articles_by_category', $category->name_en) }}">{{ $category->name_en }}</option>
						@endforeach
					</select>
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
								<p class="rate"><i class="fa fa-heart"></i><span>{{$article->likes->count()}}</span></p>
							</div>
						</div>					
						@endforeach		
						
					</div>
				<div class="topbar-filter">
					<label>Movies per page:</label>
					<form id="perPageForm" method="GET" action="{{ route('home') }}">
						<select name="per_page" onchange="document.getElementById('perPageForm').submit();">

							<option value="20" {{ request('per_page') == 10 ? 'selected' : '' }}>10 Movies</option>
							<option value="10" {{ request('per_page') == 20 ? 'selected' : '' }}>20 Movies</option>
						</select>
					</form>
						<div class="pagination2">
							{{-- <span>{{$articles->onEachSide(1)->links()}}</span> --}}
							
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="sidebar">
					  <div class="search-form">
						<h4 class="sb-title">Support</h4>
						<div class="widget-content" style="display: flex; flex-direction: column; align-items: center;">
						  <a href="https://link.payway.com.kh/N8284861n" target="_blank">
							<div class="aba-card">
							  <div class="aba-logo">
								<img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgoc19QDGcjX5KAAP-_aqPv_ODy-j5H7XcKMW5SpH0tjS3Cz6TQ5kgixIyrNeExYErE2kSTuL4cZIOCxGcYvBL3skDPtpefYZ2KWrgZJ-wRX3uelnGSJkxymn1Lho3q6uF0yDWzxuuJ4KedlKVcWwXLw_rK_R9EyEwxj1JyQpFT5AC09wG3abEhDytk7g/s512/unnamed.png" style="border-radius: 15px;" width="80px" height="auto"/>
							  </div>
							  <div class="aba-account">
								<div class="account">
								  <div class="acc-name">Payway</div>
								  <div class="acc-num">500 765 320</div>
								</div>
							  </div>
							</div>
						  </a>
				  
						  <a href="https://www.youtube.com/channel/UCZGKXwwtBGpp8wFXAJPKujA" target="_blank">
							<div class="aba-card">
							  <div class="aba-logo">
								<img src="https://static.vecteezy.com/system/resources/thumbnails/023/986/480/small_2x/youtube-logo-youtube-logo-transparent-youtube-icon-transparent-free-free-png.png" style="border-radius: 15px;" width="80px" height="auto"/>
							  </div>
							  <div class="aba-account">
								<div class="account">
								  <div class="acc-name">YouTube</div>
								</div>
							  </div>
							</div>
						  </a>
						</div>
					  </div>
					  
					  <div class="ads">
						<img src="images/uploads/ads1.png" alt="">
					  </div>
					  
					  <div class="sb-facebook sb-it">
						<h4 class="sb-title">Find us on YouTube</h4>
						<iframe src="#" data-src="https://www.youtube.com/embed/42-539BKSE0?si=jWtPHsYl5q7dI7Ak"  height="315" style="width:100%;border:none;overflow:hidden"></iframe>
					  </div>
					  
					</div>
				  </div>
				  
		</div>
	</div>
</div>
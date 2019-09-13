@include("include.header")

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div id="hot-post" class="row hot-post">
				<div class="col-md-8 hot-post-left">
					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="/post/{{ $first_post->slug }}"><img src="{{ $first_post->featured }}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="/category/{{ $first_post->category->id }}">{{ $first_post->category->name }}</a>
							</div>
							<h3 class="post-title title-lg"><a href="/post/{{ $first_post->slug }}">{{ $first_post->title }}</a></h3>
							<ul class="post-meta">
								{{-- <li><a href="#">{{ $first_post->category->name }}</a></li> --}}
								<li>{{ $first_post->created_at->diffForHumans()}}</li>
							</ul>
						</div>
					</div>
					<!-- /post -->
				</div>
				<div class="col-md-4 hot-post-right">
					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="/post/{{ $second_post->slug }}"><img src="{{ $second_post->featured }}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="/category/{{ $second_post->category->id }}">{{ $second_post->category->name }}</a>
							</div>
							<h3 class="post-title"><a href="/post/{{ $second_post->slug}}">{{ $second_post->title}}</a></h3>
							<ul class="post-meta">
								{{-- <li><a href="author.html">John Doe</a></li> --}}
								<li>{{ $second_post->created_at->diffForHumans()}}</li>
							</ul>
						</div>
					</div>
					<!-- /post -->

					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="/post/{{ $third_post->slug }}"><img src="{{ $third_post->featured }}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="/category/{{ $third_post->category->id }}">{{ $third_post->category->name }}</a>
							</div>
							<h3 class="post-title"><a href="/post/{{ $third_post->slug }}">{{ $third_post->title}}</a></h3>
							<ul class="post-meta">
								{{-- <li><a href="author.html">John Doe</a></li> --}}
								<li>{{ $third_post->created_at->diffForHumans()}}</li>
							</ul>
						</div>
					</div>
					<!-- /post -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">Recent posts</h2>
							</div>
						</div>
						<!-- post -->
						
							@foreach($recent_posts as $post)
								<div class="col-md-6">
									<div class="post">
										<a class="post-img" href="/post/{{ $post->slug }}"><img src="{{ $post->featured}}" alt=""></a>
										<div class="post-body">
											<div class="post-category">
												<a href="/category/{{ $post->category->id }}">{{ $post->category->name }}</a>
											</div>
											<h3 class="post-title"><a href="/post/{{ $post->slug }}">{{ $post->title }}</a></h3>
											<ul class="post-meta">
												
												<li>{{ $post->created_at->diffForHumans() }}</li>
											</ul>
										</div>
									</div>
								</div>
							@endforeach
					
					</div>
					<!-- /row -->

					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">Laravel</h2>
							</div>
						</div>
						<!-- post -->
						@foreach($laravel_posts as $laravel)
							<div class="col-md-4">
								<div class="post post-sm">
									<a class="post-img" href="/post/{{ $laravel->slug }}"><img src="{{ $laravel->featured}}" alt=""></a>
									<div class="post-body">
										<div class="post-category">
											<a href="/category/{{ $laravel->category->id }}">{{ $laravel->category->name }}</a>
										</div>
										<h3 class="post-title title-sm"><a href="/post/{{ $laravel->slug }}">{{ $laravel->title }}</a></h3>
										<ul class="post-meta">
											{{-- <li><a href="author.html">John Doe</a></li> --}}
											<li>{{ $laravel->created_at->diffForHumans()}}</li>
										</ul>
									</div>
								</div>
							</div>

						@endforeach
						<!-- /post -->

					</div>
					<!-- /row -->

					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">Java</h2>
							</div>
						</div>
						<!-- post -->
						@foreach($java_posts as $java)
							<div class="col-md-4">
								<div class="post post-sm">
									<a class="post-img" href="/post/{{ $java->slug }}"><img src="{{ $java->featured}}" alt=""></a>
									<div class="post-body">
										<div class="post-category">
											<a href="/category/{{ $java->category->id }}">{{ $java->category->name }}</a>
										</div>
										<h3 class="post-title title-sm"><a href="/post/{{ $java->slug }}">{{ $java->title }}</a></h3>
										<ul class="post-meta">
											{{-- <li><a href="author.html">John Doe</a></li> --}}
											<li>{{ $java->created_at->diffForHumans()}}</li>
										</ul>
									</div>
								</div>
							</div>

						@endforeach
						<!-- /post -->

						<!-- /post -->
					</div>
					<!-- /row -->

					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">Ruby on Rails</h2>
							</div>
						</div>
						<!-- post -->
						@foreach($ruby_posts as $ruby)
							<div class="col-md-4">
								<div class="post post-sm">
									<a class="post-img" href="/post/{{ $ruby->slug }}"><img src="{{ $ruby->featured}}" alt=""></a>
									<div class="post-body">
										<div class="post-category">
											<a href="{{ $ruby->category->id }}">{{ $ruby->category->name }}</a>
										</div>
										<h3 class="post-title title-sm"><a href="/post/{{ $ruby->slug }}">{{ $ruby->title }}</a></h3>
										<ul class="post-meta">
											{{-- <li><a href="author.html">John Doe</a></li> --}}
											<li>{{ $ruby->created_at->diffForHumans()}}</li>
										</ul>
									</div>
								</div>
							</div>

						@endforeach
						<!-- /post -->

					</div>
					<!-- /row -->
				</div>
				<div class="col-md-4">
				
			

					<!-- category widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Categories</h2>
						</div>
						<div class="category-widget">
							<ul>
								@foreach($categories as $category)
									<li><a href="/category/{{ $category->id }}">{{ $category->name }}</a></li>	
								@endforeach
							</ul>
						</div>
					</div>
					<!-- /category widget -->

					<!-- tag widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">All Tags</h2>
						</div>
						
							<ul>
								@foreach($tags as $tag)
									<li><a href="/tag/{{ $tag->id }}" class="badge badge-secondary">{{ $tag->tag }}</a></li>
								
								@endforeach
								
							</ul>
						
					</div>
					<!-- tag widget -->

					<!-- newsletter widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Newsletter</h2>
						</div>
						<div class="newsletter-widget">
							<form>
								<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
								<input class="input" name="newsletter" placeholder="Enter Your Email">
								<button class="primary-button">Subscribe</button>
							</form>
						</div>
					</div>
					<!-- /newsletter widget -->

					<!-- post widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Popular Posts</h2>
						</div>
						<!-- post -->
						@foreach($posts as $post)
							<div class="post post-widget">
								<a class="post-img" href="/post/{{ $post->slug }}"><img src="{{ $post->featured }}" alt=""></a>
								<div class="post-body">
									<div class="post-category">
										<a href="/category/{{ $post->category->id }}">{{ $post->category->name }}</a>
									</div>
									<h3 class="post-title"><a href="/post/{{ $post->slug }}">{{ $post->title }}</a></h3>
								</div>
							</div>
						@endforeach
						<!-- /post -->

					</div>
					<!-- /post widget -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->





	<!-- FOOTER -->
	
	@include("include.footer")

	<!-- /FOOTER -->

</body>

</html>

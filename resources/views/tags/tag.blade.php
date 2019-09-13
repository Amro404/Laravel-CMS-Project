@include("include.header")

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<!-- post -->
			
					<!-- /post -->

				
					

					<!-- post -->
					@foreach($tag->posts as $post)
					<div class="post post-row">
						<a class="post-img" href="/post/{{ $post->slug }}"><img src="{{ $post->featured }}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html"></a>
								
							</div>
							<h3 class="post-title"><a href="/post/{{ $post->slug }}">{{ $post->title }}</a></h3>
							<ul class="post-meta">
								
								<li>{{ $post->created_at->diffForHumans() }}</li>
							</ul>
							<p>{{ $post->content }}</p>
						</div>
					</div>
					@endforeach
					<!-- /post -->

					
				</div>

				<div class="col-md-4">
				

			
					<!-- /social widget -->

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



				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	@include("include.footer")

	
</body>

</html>

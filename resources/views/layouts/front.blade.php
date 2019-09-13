@include("include.header")



		<!-- PAGE HEADER -->
		<div class="page-header">
			<div class="page-header-bg" style="background-image: url('{{ $post->featured }}');" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<h1 class="text-uppercase">{{ $post->title }}</h1>
						<p class="lead">{{ $post->content }}</p>
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->
	</header>
	<!-- /HEADER -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<div class="section-row">
						<div class="section-title">
							<h3 class="title">{{ $post->title }}</h3>
						</div>

						<h1>{{ $post->created_at->diffForHumans() }}</h1>
						<p>{{ $post->content }}.</p>

						@foreach($post->tags as $tag)
							<a href="/tag/{{ $tag->id }}"><span class="badge badge-pill badge-dark">{{ $tag->tag }}</span></a>
						@endforeach

						


					</div>

					<div class="section-title">
						<br>


						@if($prev)
						<a href="/{{ $prev->slug }}" class="badge badge-secondary">{{ $prev->title }}</a>
						@endif

						@if($next)
						<a href="/{{ $next->slug }}" class="badge badge-secondary">{{ $next->title }}</a>
						@endif

					</div>

					@include("include.disqus")





			

				
				</div>

				<div class="col-md-4">
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

	<!-- jQuery Plugins -->


</body>

</html>

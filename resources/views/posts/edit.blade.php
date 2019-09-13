@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post [ {{ $post->title }} ] </div>

                <div class="card-body">
                	@if($errors->any())
						<ul class="nav-item active">	
						@foreach($errors->all() as $error)
							<li class="nav-item active">
								{{ $error }}
							</li>
						@endforeach
						</ul>	
					
						
					@endif
       				<form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">

       					@method("PATCH")
       					@csrf
       					  <div class="form-group">
						    <label for="exampleFormControlSelect1">Category</label>
						    <select class="form-control" id="exampleFormControlSelect1" name="category_id">
						      
						  	@foreach($categories as $category)
						  		@if($category->id ==  $post->category_id)

						  			<option value="{{ $category->id }}" selected>{{ $category->name }}</option>
						  		@else

						  			<option value="{{ $category->id }}">{{ $category->name }}</option>
						  		@endif	
						  	@endforeach
						    </select>
						  </div>

					  	@foreach($tags as $tag)
						<div class="form-check">
					  		<input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id}}" id="defaultCheck1"
					  		@foreach($post->tags as $tagId)
					  			@if($tagId->id == $tag->id)
					  				checked 
					  			@endif
					  		@endforeach
					  		>
					  		<label class="form-check-label" for="defaultCheck1">
					    		{{ $tag->tag }}
					  		</label>
					  	</div>
					  	@endforeach

						<div class="form-group">
						    <label for="title">Title</label>
						    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
						    
						</div>
						
						<div class="form-group">
						    <label for="content">Description</label>
						    <textarea class="form-control" id="content" name="content" rows="8" cols="8">{{ $post->content }}</textarea>
						</div>

					    <div class="form-group">
						    <label for="featured">Photo</label>
						    <input type="file" class="form-control-file" name="featured" id="featured">
						</div>
						
						<button type="submit" class="btn btn-primary">Update</button>
					</form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
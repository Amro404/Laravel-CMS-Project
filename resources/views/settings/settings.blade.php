@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Blog Settings</div>

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
       				<form action="/settings/update" method="POST">

       					@csrf

						<div class="form-group">
						    <label for="title">Blog Name</label>
						    <input type="text" class="form-control" id="title" name="blog_name" value="{{ $settings->blog_name }}">
						    
						</div>

						<div class="form-group">
						    <label for="title">Phone Number</label>
						    <input type="text" class="form-control" id="title" name="phone_number" value="{{ $settings->phone_number }}">
						    
						</div>

						<div class="form-group">
						    <label for="title">Blog Email</label>
						    <input type="email" class="form-control" id="title" name="blog_email" value="{{ $settings->blog_email }}">
						    
						</div>

						<div class="form-group">
						    <label for="title">Blog Address</label>
						    <input type="text" class="form-control" id="title" name="address" value="{{ $settings->address }}">
						    
						</div>
						
						<button type="submit" class="btn btn-primary">Update</button>
					</form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
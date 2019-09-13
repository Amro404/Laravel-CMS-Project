@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Category</div>

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
       				<form action="/category" method="POST">

       					@csrf

						<div class="form-group">
						    <label for="title">Category Name</label>
						    <input type="text" class="form-control" id="title" name="name" placeholder="Enter Name">
						    
						</div>
						
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
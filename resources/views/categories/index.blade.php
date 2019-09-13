@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categories</div>

                <div class="card-body">
                   @if($categories->count() > 0)

                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Name</th>
                              <th scope="col">Edit</th>
                              <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($categories as $category)
                              <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td>
                                  <a href="/category/{{ $category->id }}/edit"><span><i class="fas fa-edit"></i></span></a>
                                </td>
                                <td>

                                  <form id="form-id" action="/category/{{ $category->id }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                  
                                    <button class="btn btn-link"><span><i class="far fa-trash-alt"></i></span></button>

                                  </form>
                                </td>
                              </tr>
                            @endforeach
                          
                        </tbody>
                    </table>

                    @else

                      <p class="text-center">No Categories Yet</p>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


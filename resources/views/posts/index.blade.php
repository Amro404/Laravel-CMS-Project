@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">

                  @if($posts->count() > 0)

                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Title</th>
                              <th scope="col">Image</th>
                              <th scope="col">Created at</th>
                              <th scope="col">Updated at</th>
                              <th scope="col">Edit</th>
                              <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($posts as $post)
                              <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>{{ $post->title }}</td>
                                <td><img src="{{ $post->featured }}" alt="{{ $post->title }}" class="img-thumbnail" style="height: 150px; width: 150px;"></td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->updated_at }}</td>
                                <td>
                                  <a href="/posts/{{ $post->id }}/edit"><span><i class="fas fa-edit"></i></span></a>
                                </td>
                                <td>

                                  <form id="form-id" action="/posts/{{ $post->id }}" method="POST">
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

                      <p class="text-center">No Posts Yet</p>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


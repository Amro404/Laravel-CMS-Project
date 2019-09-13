@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">Posts Soft Deleted</div>
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
                              <th scope="col">Restore</th>
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
                                <td><a href="/post/restore/{{ $post->id }}"><span><i class="fas fa-trash-restore"></i></span></a></td>

                                <td>
                                  <a href="/post/hdelete/{{ $post->id }}"><span></i><i class="far fa-trash-alt"></i></span></a>
                                </td>
                              
                              
                              </tr>
                            @endforeach
                          
                        </tbody>
                    </table>

                    @else

                      <p class="text-center">No Trashed Posts</p>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


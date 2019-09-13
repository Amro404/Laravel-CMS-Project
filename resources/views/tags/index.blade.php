@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tags</div>

                <div class="card-body">
                   @if($tags->count() > 0)

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

                            @foreach($tags as $tag)
                              <tr>
                                <th scope="row">{{ $tag->id }}</th>
                                <td>{{ $tag->tag }}</td>
                                <td>
                                  <a href="/tag/{{ $tag->id }}/edit"><span><i class="fas fa-edit"></i></span></a>
                                </td>
                                <td>

                                  <form id="form-id" action="/tag/{{ $tag->id }}" method="POST">
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

                      <p class="text-center">No Tags Yet</p>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


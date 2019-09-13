@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">

                  @if($users->count() > 0)

                    <table class="table table-striped">
                        <thead>
                            <tr> 
                              <th scope="col">ID</th>
                              <th scope="col">Name</th>
                              <th scope="col">Avatar</th>
                              <th scope="col">Admin status</th>
                              <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($users as $user)
                              <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                @if(isset($user->profile->avatar))
                                  <td><img src="{{ $user->profile->avatar }}" alt="{{ $user->name }}" class="img-thumbnail" style="height: 50px; width: 50px;"></td>
                                @else 
                                  <td><img src="https://www.pngarts.com/files/3/Avatar-PNG-Picture.png" alt="{{ $user->name }}" class="img-thumbnail" style="height: 50px; width: 50px;"></td>
                                @endif  
                                <td>
                                  @if($user->admin)
                                    <a href="/users/delete-admin/{{ $user->id }}">Delete admin</a>
                                  @else
                                    <a href="/users/admin/{{ $user->id }}">Make admin</a>
                                  @endif
                                </td>
                                <td>

                                  <form id="form-id" action="/users/{{ $user->id }}" method="POST">
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

                      <p class="text-center">No Users Yet</p>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


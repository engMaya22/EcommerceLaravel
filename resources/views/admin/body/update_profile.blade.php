@extends('admin.admin_master')

@section('admin')


<div class="card card-default">
      <!-- set the id according id in update password file in profile  -->
        <div class="card-header card-header-border-bottom">
            <h2>User Profile</h2>
        </div>
                        @if(session('success'))

                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong> {{ session('success') }}</strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                       @endif

        <div class="card-body">
            <form class="form-pill" action ="{{route('update.user.profile')}}" method="post" >
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput3">User Name</label>
                    <input type="text" name="name" class="form-control" value="{{$user['name']}}" >
                    
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput3">User Email</label>
                    <input type="email" name="email" class="form-control" value="{{$user['email']}}" >
                    
                </div>
               
              
              <button class="btn btn-primary btn-default" type="submit">Update</button>
            </form>
        </div>
    </div>
    
@endsection
@extends('admin.admin_master')

@section('admin')


<div class="card card-default">
      <!-- set the id according id in update password file in profile  -->
        <div class="card-header card-header-border-bottom">
            <h2>Change Password</h2>
        </div>
        <div class="card-body">
            <form class="form-pill" action ="{{route('password.update')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput3">Current Password</label>
                    <input type="password" name="old_password" class="form-control" id="current_password"  placeholder="Current Password">
                     @error('old_password')
                     <span class="text-danger">{{$message}}</span>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlPassword3"> new Password</label>
                    <input type="password"  name="password" class="form-control"  id="password" placeholder="new Password">
                    @error('password')
                     <span class="text-danger">{{$message}}</span>
                     @enderror
                </div>

                <div class="form-group">
                    <label for="exampleFormControlPassword3"> Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                    @error('password_confirmation')
                     <span class="text-danger">{{$message}}</span>
                     @enderror
                </div>
              
              <button class="btn btn-primary btn-default" type="submit">Save</button>
            </form>
        </div>
    </div>
    
@endsection
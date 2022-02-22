@extends('admin.admin_master')

@section('admin')


    @if(session('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong> {{ session('success') }}</strong> 
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>

   @endif

    <div class="py-12">
        
            <!-- this is documentaion section  -->
            <!-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div> -->
       
<div class="container">
    <div class="row">
 

    
<!-- first  second cird -->
  <div class="col-md-8">
        <div class="card">
       


        <div class="card-header"> Edit Brand</div>
        <div class="card-body">
        <form  action="{{route('update.brand',$brand->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" value="{{$brand->brand_image}}" name="old_image" hidden>
  <div class="form-group">
    <label for="exampleInputEmail1"> Update Brand Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="brand_name" value="{{$brand->brand_name}}">

    @error('brand_name')
   <span class="text-danger"> {{$message}}</span>
   @enderror
  </div>
  

  <div class="form-group">
    <label for="exampleInputEmail1"> Update Brand Image </label>
     <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="brand_image" value="{{$brand->brand_image}}"> 
    
    @error('brand_image')
   <span class="text-danger"> {{$message}}</span>
   @enderror
  </div>

  <div class="form-group">
      <img src="{{asset($brand->brand_image)}}" style="height:200px;width:400px;">

  </div>
  

  <button type="submit" class="btn btn-primary mt-2">Update Brand</button>
       </form>
</div>




        </div>
</div>

<!-- end of second card -->
</div>
</div>


</div>
</div>


</div>

@endsection

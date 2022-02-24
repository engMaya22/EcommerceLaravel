@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        
            <!-- this is documentaion section  -->
            <!-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div> -->
       
  <div class="container">
           <div class="row">
 

              <div class="col-md-8">
        <div class="card">
                  <!-- @if(session('success'))

                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                       <strong> {{ session('success') }}</strong> 
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>
         
                   @endif -->

            <div class="card-header">  All  Brands</div>

                 <table class="table">
                <thead>
                      <tr>
              
                       <th>Sl No</th>
                       <th>Brand Name</th>
                        <th>Brand Image</th>
                       <th>Created At</th>
                       <th>Actions</th>
                     </tr>
                 </thead>
                <tbody>
             <!-- @php($i=1) -->
             @if($brands->count()!==0)
             @foreach($brands as $item)
                     <tr>
                        <th scope="row">
                         
<!-- {{$i++}} -->
                  {{$brands->firstItem() + $loop->index}}
                        </th>
                         <td>{{$item->brand_name}}</td>
                         <td><img src="{{asset($item->brand_image)}}" style="height:40px; width: 70px;"   alt=""></td>
                         <td>
                             @if($item->created_at == NULL){
                 <span class="text-danger"> No Data Set</span>
                            @else
                           {{$item->created_at->diffForHumans()}}
                            @endif

                         </td>

                      <td>
                        <a href="{{route('edit.brand',$item->id)}}" class="btn btn-info">Edit</a>
                        <a href="{{route('delete.brand',$item->id)}}"  onclick="return confirm('Are You Sure to Delete')" class="btn btn-danger">Delete</a>
                      </td>
                     </tr>


                    @endforeach 
                             
                       
                    @endif
   
              </tbody>
             
              </table>
              {{  $brands->links() }}

          </div>
        </div>
<!-- end of first card -->
<!-- first  second cird -->
         <div class="col-md-4">
                 <div class="card">
                   <div class="card-header"> Add Brand </div>
                   <div class="card-body">
                      <form  action="{{route('store.brand')}}" method="POST" enctype="multipart/form-data" >
                            @csrf
                           <div class="form-group">
                               <label for="exampleInputEmail1"> Brand Name</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="brand_name">
                                @error('brand_image')
                               <span class="text-danger"> {{$message}}</span>
                                 @enderror
                            </div>

                            <div class="form-group">
                               <label for="exampleInputEmail1"> Brand Image</label>
                              <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="brand_image">
                                @error('brand_name')
                               <span class="text-danger"> {{$message}}</span>
                                 @enderror
                            </div>
  
               <button type="submit" class="btn btn-primary mt-2">Add Brand</button>
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
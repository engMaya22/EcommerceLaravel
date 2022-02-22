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
        
               
                    <div class="card-group">
                    @foreach($images as $item)
                    <!-- item is row in multipic model -->
                    <div class="col-md-4 mt-5">
                        <div class="card">
                    <img src="{{asset($item->image)}}" >
                    </div>
                    </div>
                        
                         @endforeach 
                    </div>
                   
                



        </div>
<!-- end of first card -->
<!-- first  second cird -->
         <div class="col-md-4">
                 <div class="card">
                   <div class="card-header"> Multi Image </div>
                        <div class="card-body">
                      <form  action="{{route('multi.save')}}" method="POST" enctype="multipart/form-data" >
                            @csrf
                          

                            <div class="form-group">
                               <label for="exampleInputEmail1"> Brand Image</label>
                              <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="image[]" multiple="">
                                @error('image')
                                 <span class="text-danger"> {{$message}}</span>
                                 @enderror
                            </div>
  
                            <button type="submit" class="btn btn-primary mt-2">Add Image</button>
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
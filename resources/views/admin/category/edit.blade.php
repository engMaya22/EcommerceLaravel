<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- {{ __('Dashboard') }} -->

        Edit Category <b> </b>
            
        </h2>
        <b  class="float-end">
            <span  class="badge bg-danger "></span>
            </b>
    </x-slot>

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
        <div class="card-header"> Edit Category </div>
        <div class="card-body">
        <form  action="{{route('update.category',$category->id)}}" method="POST" >
            @csrf
  <div class="form-group">
    <label for="exampleInputEmail1"> Update Category Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="category_name" value="{{$category->category_name}}">
   @error('category_name')
   <span class="text-danger"> {{$message}}</span>
   @enderror
  </div>
  
  <button type="submit" class="btn btn-primary mt-2">Update Category</button>
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


</x-app-layout>

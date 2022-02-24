<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- {{ __('Dashboard') }} -->

       <b></b>
            
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
 

              <div class="col-md-8">
        <div class="card">
                  @if(session('success'))

                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                       <strong> {{ session('success') }}</strong> 
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>
         
                   @endif

            <div class="card-header">  All Category</div>

                 <table class="table">
                <thead>
                      <tr>
              
                       <th>Sl No</th>
                       <th>Category Name</th>
                        <th>User</th>
                       <th>Created At</th>
                       <th>Actions</th>
                     </tr>
                 </thead>
                <tbody>
             <!-- @php($i=1) -->
             @foreach($categories as $item)
                     <tr>
                        <th scope="row">
<!-- {{$i++}} -->
                  {{$categories->firstItem() + $loop->index}}
                        </th>
                         <td>{{$item->category_name}}</td>
                         <td>{{$item->user->name}}</td>
                         <td>
                             @if($item->created_at == NULL)
                 <span class="text-danger"> No Data Set</span>
                            @else
                           {{$item->created_at->diffForHumans()}}
                            @endif

                         </td>

                      <td>
                        <a href="{{url('category/edit/'.$item->id)}}" class="btn btn-info">Edit</a>
                        <a href="{{route('category.softdelete',$item->id)}}" class="btn btn-danger">Delete</a>
                      </td>
                     </tr>


                    @endforeach 
   
   
              </tbody>
             
              </table>
              {{  $categories->links() }}

          </div>
        </div>
<!-- end of first card -->
<!-- first  second cird -->
         <div class="col-md-4">
                 <div class="card">
                   <div class="card-header"> Add Category </div>
                   <div class="card-body">
                      <form  action="{{route('store.category')}}" method="POST" >
                            @csrf
                           <div class="form-group">
                      <label for="exampleInputEmail1">Category Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="category_name">
                        @error('category_name')
                     <span class="text-danger"> {{$message}}</span>
                       @enderror
                    </div>
  
           <button type="submit" class="btn btn-primary mt-2">Add Category</button>
                  </form>
                 </div>




                   </div>
           </div>

<!-- end of second card -->
</div>
</div>


</div>
</div>


<!-- end of the first container  -->



<!-- Trash Part -->



<div class="container">
    <div class="row">
 

    <div class="col-md-8">
        <div class="card">
        

            <div class="card-header">  Trash List</div>

                 <table class="table">
                <thead>
                      <tr>
              
                       <th>Sl No</th>
                       <th>Category Name</th>
                        <th>User</th>
                       <th>Created At</th>
                       <th>Actions</th>
                     </tr>
                </thead>
             <tbody>
             <!-- @php($i=1) -->
             @if($trashCat->count()!==0)
      @foreach($trashCat as $item)
                     <tr>
                        <th scope="row">
<!-- {{$i++}} -->
                  {{$trashCat->firstItem() + $loop->index}}
                        </th>
                         <td>{{$item->category_name}}</td>
                         <td>{{$item->user->name}}</td>
                         <td>
                             @if($item->created_at == NULL)
                 <span class="text-danger"> No Data Set</span>
                            @else
                           {{$item->created_at->diffForHumans()}}
                            @endif

                         </td>

                      <td>
                        <a href="{{url('category/restore/'.$item->id)}}" class="btn btn-info">Restore</a>
                        <a href="{{url('category/pDelete/'.$item->id)}}" class="btn btn-danger"> P Delete</a>
                      </td>
                     </tr>


                    @endforeach 
   
                     @endif
              </tbody>
              </table>
     {{ $trashCat->links() }}

</div>
</div>
<!-- end of first card -->
<!-- first  second cird -->
  <div class="col-md-4">
        
</div>

<!-- end of second card -->
</div>
</div>







<!-- end of trash part  -->






</div>


</x-app-layout>

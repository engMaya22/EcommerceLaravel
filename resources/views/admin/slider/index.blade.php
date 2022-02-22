@extends('admin.admin_master')

@section('admin')


    <div class="py-12">
        
            <div class="container">
               <div class="row">
                    <h2>Home Slider</h2>
                    <br><br>
                    
                    <a href="{{route('add.slide')}}" ><button  class="btn btn-info" >Add Slider</button></a>
                    
                   <div class="col-md-12">
                    <div class="card">
                              @if(session('success'))

                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <strong> {{ session('success') }}</strong> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                    
                              @endif

                                  <div class="card-header">  All  Slider </div>

                                                  <table class="table">
                                                      <thead>
                                                          <tr>
                                                      
                                                              <th scope="col" width="5%">Sl No</th>
                                                              <th scope="col" width="15%"> Slider Title</th>
                                                                <th scope="col" width="25%">Description</th>
                                                              <th scope="col" width="15%">Image</th>
                                                              <th scope="col" width="15%">Actions</th>
                                                            </tr>
                                                      </thead>
                                                      <tbody>
                                                          @php($i=1)  
                                                          @foreach($sliders as $item)
                                                              <tr>
                                                              <th scope="row">
                                                              {{$i++}}  
                                                        
                                                  
                                                                </th>
                                                          <td>{{$item->title}}</td>
                                                          <td>{{$item->description}}</td>
                                                          <td><img src="{{asset($item->image)}}" style="height:40px; width: 70px;"   alt=""></td>
                                                          

                                                        <td>
                                                          <a href="{{route('edit.slide',$item->id)}}" class="btn btn-info">Edit</a>
                                                          <a href="{{route('delete.slide',$item->id)}}"   onclick="return confirm('Are You Sure to Delete')" class="btn btn-danger">Delete</a>
                                                        </td>
                                                      </tr>
                                                

                                                @endforeach 
                                    
                                                  
                                                </tbody>
                                                  
                                              </table>
              

          </div>
        </div>




</div>
</div>

</div>


@endsection
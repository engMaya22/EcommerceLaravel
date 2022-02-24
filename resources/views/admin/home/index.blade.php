@extends('admin.admin_master')

@section('admin')


    <div class="py-12">
        
            <div class="container">
               <div class="row">
                    <h2>Home About</h2>
                    <br><br>
                    
                    <a href="{{route('add.about')}}" ><button  class="btn btn-info" >Add About</button></a>
                    
                   <div class="col-md-12">
                    <div class="card">
                              @if(session('success'))

                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <strong> {{ session('success') }}</strong> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                    
                              @endif

                                  <div class="card-header">  All About  Data </div>

                                                  <table class="table">
                                                      <thead>
                                                          <tr>
                                                      
                                                              <th scope="col" width="5%">Sl No</th>
                                                              <th scope="col" width="15%"> Home Title</th>
                                                                <th scope="col" width="25%"> Short Description</th>
                                                              <th scope="col" width="15%"> Long Description</th>
                                                              <th scope="col" width="15%">Actions</th>
                                                            </tr>
                                                      </thead>
                                                      <tbody>
                                                          @php($i=1)  
                                                          @if($abouthome->count()!==0)
                                                          @foreach($abouthome as $item)
                                                              <tr>
                                                              <th scope="row">
                                                              {{$i++}}  
                                                        
                                                  
                                                                </th>
                                                          <td>{{$item->title}}</td>
                                                          <td>{{$item->short_dis}}</td>
                                                          <td>{{$item->long_dis}}</td>
                                                          

                                                        <td>
                                                           <a href="{{route('edit.about',$item->id)}}" class="btn btn-info">Edit</a> 
                                                          <a href="{{route('delete.about',$item->id)}}"   onclick="return confirm('Are You Sure to Delete')" class="btn btn-danger">Delete</a> 
                                                        </td>
                                                      </tr>
                                                

                                                @endforeach 
                                                @endif
                                    
                                                  
                                                </tbody>
                                                  
                                              </table>
              

          </div>
        </div>




</div>
</div>

</div>


@endsection
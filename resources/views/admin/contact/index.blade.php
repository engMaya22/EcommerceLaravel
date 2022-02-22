@extends('admin.admin_master')

@section('admin')


    <div class="py-12">
        
            <div class="container">
               <div class="row">
                    <h2> Contact Page</h2>
                    <br><br>
                    
                    <a href="{{route('add.contact')}}" ><button  class="btn btn-info" >Add Contact</button></a>
                    
                   <div class="col-md-12">
                    <div class="card">
                              @if(session('success'))

                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <strong> {{ session('success') }}</strong> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                    
                              @endif

                                  <div class="card-header">  All Contact  Data </div>

                                                  <table class="table">
                                                      <thead>
                                                          <tr>
                                                      
                                                              <th scope="col" width="5%">Sl No</th>
                                                              <th scope="col" width="15%"> Contact Email</th>
                                                                <th scope="col" width="25%"> Contact Address</th>
                                                              <th scope="col" width="15%">Conatct Phone</th>
                                                              <th scope="col" width="15%">Actions</th>
                                                            </tr>
                                                      </thead>
                                                      <tbody>
                                                          @php($i=1)  
                                                          @foreach($contacts as $item)
                                                              <tr>
                                                              <th scope="row">
                                                              {{$i++}}  
                                                        
                                                  
                                                                </th>
                                                          <td>{{$item->email}}</td>
                                                          <td>{{$item->address}}</td>
                                                          <td>{{$item->phone}}</td>
                                                          

                                                        <td>
                                                           <a href="{{route('edit.contact',$item->id)}}" class="btn btn-info">Edit</a> 
                                                          <a href="{{route('delete.contact',$item->id)}}"   onclick="return confirm('Are You Sure to Delete')" class="btn btn-danger">Delete</a> 
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
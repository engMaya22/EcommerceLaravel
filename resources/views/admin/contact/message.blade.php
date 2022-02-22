@extends('admin.admin_master')

@section('admin')


    <div class="py-12">
        
            <div class="container">
               <div class="row">
                    <h2> Admin Messages Page</h2>
                    <br><br>
                    

                    
                   <div class="col-md-12">
                    <div class="card">
                              @if(session('success'))

                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <strong> {{ session('success') }}</strong> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                    
                              @endif

                                  <div class="card-header">  All Messages  Data </div>

                                                  <table class="table">
                                                      <thead>
                                                          <tr>
                                                      
                                                              <th scope="col" width="5%">Sl No</th>
                                                              <th scope="col" width="10%">Contact Name</th>
                                                              <th scope="col" width="10%"> Contact Email</th>
                                                                <th scope="col" width="15%"> Contact Subject</th>
                                                              <th scope="col" width="25%">Conatct Message</th>
                                                              <th scope="col" width="15%">Actions</th>
                                                            </tr>
                                                      </thead>
                                                      <tbody>
                                                          @php($i=1)  
                                                          @foreach($messages as $item)
                                                              <tr>
                                                              <th scope="row">
                                                              {{$i++}}  
                                                        
                                                  
                                                                </th>
                                                                <td>{{$item->name}}</td>
                                                          <td>{{$item->email}}</td>
                                                          <td>{{$item->subject}}</td>
                                                          <td>{{$item->message}}</td>
                                                          

                                                        <td>
                                                           
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
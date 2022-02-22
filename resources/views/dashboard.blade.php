<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- {{ __('Dashboard') }} -->

            Hi ... <b>{{Auth::user()->name}}</b>
            
        </h2>
        <b  class="float-end">Total Users
            <span  class="badge bg-danger ">{{count($users)}}</span>
            </b>
    </x-slot>

    <div class="py-12">
        
            <!-- this is documentaion section  -->
            <!-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div> -->
       
<div class="container">
    <div class="row">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Sl No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Created At</th>
    </tr>
  </thead>
  <tbody>
      @foreach($users as $item)
      <tr>
      `
      <th scope="row">{{$item->id}}</th>
      
      <td>{{$item->name}}
      </td>
      <td>{{$item->email}}</td>
      <td>{{$item->created_at->diffForHumans()}}</td>
      <!-- if we use query  builder to define diffForHuman  we use carbon-->
      <!-- <td> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td> -->
      
      </tr>


      @endforeach
   
   
  </tbody>
</table>

    </div>

</div>

    </div>
</x-app-layout>

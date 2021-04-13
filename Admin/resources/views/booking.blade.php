@extends('layout')
@section('body')
<div class="col-lg-10 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">All BOOKING
       
      </h4>
   
      <div class="table-responsive">
        <table class="table table-hover" id="datatable">
          <thead>
            <tr>
              <th>
                ID
              </th>
              <th>
               DATE
              </th>
              <th>
                TIME
              </th>
              <th>
                  DOCTOR
                </th>
              <th>
                STATUS
              </th>
             
              <th>
                  ACTION
              </th>
            </tr>
          </thead>
          <tbody>
              @foreach ($booking as $item)
                  
              
            <tr>
              <td class="py-1">
            #
              </td>
            
              <td>
               
                {{$item->Date}}   
                </td>
              
              <td>
                  {{$item->Time}}   
              
                  
                  {{-- @foreach(explode(',',$item->image) as $row )
                    {{ $row }} </br>
                  @endforeach --}}
                 
              </td>
              <td>
                 {{$item->name}}
              </td>
              <td>
                  {{$item->Status}}
              </td>
             
              <td class="py-1">
                EDIT
                  </td>
            
                @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

  <script>
    $(document).ready(function(){
      $('#btnSave').click(function(){
          
         
         
          
  
              
              
        });
       
        
       
    });
  </script>
@endsection
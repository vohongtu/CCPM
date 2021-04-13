@extends('layout')
@section('body')
<div class="col-lg-10 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">All CALENDAR
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" > Add Calendar</button>
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
                NOTES
              </th>
             
              <th>
                  ACTION
              </th>
            </tr>
          </thead>
          <tbody>
              @foreach ($drr as $item)
                  
              
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
                  {{$item->Notes}}
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Calendar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
       
        <div class="modal-body">
        
          <div class="form-group">
            
            <label for="exampleInputUsername1">Doctor</label>
            <select class="form-control form-control-lg" aria-label="Default select example" name="doctor" id="doctor">
                
              @foreach ($dr as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
              @endforeach
             
            </select>
            <label for="exampleInputUsername1">Date</label>
            <input type="date"  class="form-control" id="Date"  onload="getDate()" name="Date" >
            <label for="exampleInputUsername1">Time</label>
            <select class="form-control form-control-lg" aria-label="Default select example" name="Time" id="Time">
                
                
                  <option >8h30</option>
                  <option >9h30</option>
                  <option >10h30</option>
                  <option >13h30</option>
                  <option >14h30</option>
                  <option >15h30</option>

              
               
              </select>
           
          
            <label for="exampleInputUsername1">Notes</label>
            <textarea  type="text" class="form-control" id="Note" name="Note" placeholder="Note"> </textarea>
          </div>
       
        </div>
      
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button"  class="btn btn-primary" id="btnSave">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function(){
      $('#btnSave').click(function(){
          
         
         
          var doctor = $('#doctor').val();
          var Datee = $('#Date').val();
          var Time = $('#Time').val();
          var Note = $('#Note').val();
        
          var url="{{route('addCalendar')}}";  
        
          $.ajax({
                  url:url,
                  method: 'get',
                  data:{
                      doctor:doctor,
                      Date:Datee,
                      Time:Time,

                      Note:Note
                     
                     },
                  success:function(s){
                         
                   alert (s);
                  }
  
              });
  
              
              
        });
       
        
       
    });
  </script>
@endsection
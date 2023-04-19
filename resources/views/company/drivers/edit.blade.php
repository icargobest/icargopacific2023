
<button type="button" class="btn btn-success btn-sm" data-mdb-toggle="modal" data-mdb-target="#editModal{{$user->id}}">
    EDIT
 </button>
 
 <div class="modal top fade" id="editModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
     <div class="modal-dialog ">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title col-green" id="exampleModalLabel">Edit Driver Information</h5>
           <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
            @endif
             <form action="{{ route('drivers.update',$user->id) }}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <div class="row mb-2">
                 <div class="col">
                   <div class="label-container">
                     <label>Driver Name:</label>
                   </div>
                   <div class="form-outline">
                     <input type="text" id="form6Example1" name="name" value="{{ $user->name }}" class="form-control" placeholder="Driver name"/>
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                 </div>
               </div>
               <div class="row mb-4">
                <div class="label-container">
                    <label>VEHICLE TYPE:</label>
                  </div>
                <select type="text" id="form6Example5" name="vehicle_type"style="width:95% !important; margin:auto;border:1px solid #ced4da; height:33.26px; border-radius:0.375rem;padding: 5.12px 12px; color:#828282;"required>
                  <option value="{{ $user->driverDetail->vehicle_type }}" hidden>{{ $user->driverDetail->vehicle_type }}</option>
                  <option value="Motorcycle">Motorcycle</option>
                  <option value="Van">Van</option>
                  <option value="Truck">Truck</option>
                </select>
                
                    @error('vehicle_type')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
              </div>

               <!-- Email input -->
               <div class="label-container">
                 <label>PLATE NUMBER:</label>
               </div>
               <div class="form-outline mb-2">
                <input type="text" name="plate_no" value="{{ $user->driverDetail->plate_no }}" class="form-control" placeholder="Plate No">
                    @error('plate_no')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
               </div>
 
               <div class="button-modal-container">
 
                   <div class="leftmodal-button-container">
                       <button type="reset" class="btn btn-outline-primary" data-mdb-dismiss="modal">
                           Reset
                       </button>
                   </div>
 
                   <div class="rightmodal-button-container">
         
                     <button type="submit" class="btn btn-primary" id="addModal2"data-mdb-dismiss="modal">
                         Save
                     </button>
 
                     <a href="{{route('drivers.index')}}"><button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                         CANCEL
                       </button>
                     </a>
                   </div>
               </div>

                 </div>
             </form>
           </div>
 
       </div>
     </div>
   </div>
 </div>
 
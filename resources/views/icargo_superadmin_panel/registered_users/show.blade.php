@if(isset($company))
    <button type="button" class="btn btn-warning btn-sm" data-mdb-toggle="modal" data-mdb-target="#showModal{{$company->user->id}}">
        SHOW
     </button>
    
     <div class="modal top fade" id="showModal{{$company->user->id}}" tabindex="-1" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
         <div class="modal-dialog ">
           <div class="modal-content">
             <div class="modal-header mbc1">
               <h5 class="modal-title">VIEW REGISTERED ACCOUNTS</h5>
               <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                <fieldset disabled>
                  <div class="row mb-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person-fill text-secondary"></i>
                        </span>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $company->user->name }}" required autocomplete="name" autofocus placeholder="Name">
                    </div>
                </div>
    
                <div class="row mb-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-envelope-fill text-secondary"></i>
                        </span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $company->user->email}}" required autocomplete="email" placeholder="E-mail Address">
    
                    </div>
                </div>
    
                <hr>
                {{-- contact number --}}
    
                 <!-- Contact input -->
                 <div class="row mb-4">
                    <div class="input-group">
                         <span class="input-group-text">
                            <i class="bi bi-person-fill text-secondary"></i>
                        </span>
                        <input id="contact" 
                        type="text" 
                        class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" 
                        value="{{ $company->contact_no }}" 
                        autocomplete="contact_no"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                        minlength="11" 
                        maxlength="11"
                        @required(true)
                        placeholder="Contact No">
                    </div>
                </div>
    
    
                {{-- contact name --}}
                <div class="row mb-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person-fill text-secondary"></i>
                        </span>
                        <input id="contactnum" type="text" class="form-control @error('contact_name') is-invalid" @enderror" name="contact_name" value="{{ $company->contact_name }}" required autocomplete="contact_name" autofocus placeholder="Contact Name">
                    </div>
                </div>
    
                {{-- company address--}}
                <div class="row mb-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person-fill text-secondary"></i>
                        </span>
                        <input id="contactnum" type="text" class="form-control @error('company_address') is-invalid" @enderror" name="company_address" value="{{$company->company_address  }}" required autocomplete="company_address" autofocus placeholder="Company Address">
                    </div>
                </div>
    
                {{-- Created at --}}
                <div class="form-outline mb-4">
                    <input type="text" name="created_at" value="{{$company->created_at}}" class="form-control" />
                  </div>
    
                  {{-- Updated at --}}
                  <div class="form-outline mb-4">
                    <input type="text" name="updated_at" value="{{$company->updated_at}}" class="form-control" />
                  </div>
    
                </fieldset>
                     <div class="modal-footer">
                        <a class="btn btn-secondary btn-block" data-mdb-dismiss="modal">
                            Back
                        </a>
                     </div>
             </div>
           </div>
         </div>
       </div>
@endif


@if(isset($driver))
    <button type="button" class="btn btn-warning btn-sm" data-mdb-toggle="modal" data-mdb-target="#showModal{{$driver->user->id}}">
        SHOW
     </button>
    
     <div class="modal top fade" id="showModal{{$driver->user->id}}" tabindex="-1" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
         <div class="modal-dialog ">
           <div class="modal-content">
             <div class="modal-header mbc1">
               <h5 class="modal-title">VIEW REGISTERED ACCOUNTS</h5>
               <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                <fieldset disabled>
                  {{--  Driver ID --}}
             <div class="row">
                <div class="col"> 
                 <div class="form-outline mb-4">
                   <input type="text" id="id" name="id" value="{{$driver->user->id}}" class="form-control" />
                   <label class="form-label" for="id">Driver ID</label>
                 </div>
                </div>
              </div>
 
 
              <!-- Name  -->
              <div class="form-outline mb-4">
               <div class="form-outline mb-4">
                 <input type="email" id="email" name="email" value="{{$driver->user->name}}" class="form-control" />
                 <label class="form-label" for="email">Driver Name</label>
               </div>
 
              <!-- Email  -->
              <div class="form-outline mb-4">
                <input type="email" id="email" name="email" value="{{$driver->user->email}}" class="form-control" />
                <label class="form-label" for="email">Driver Email</label>
              </div>
 
              <!-- Vehicle  -->
              <div class="form-outline mb-4">
               <input type="text" id="vehicle_type" name="vehicle_type" value="{{$driver->vehicle_type}}" class="form-control" />
               <label class="form-label" for="vehicle_type">Vehicle Type</label>
              </div>
 
              <!-- Contact No.  -->
              <div class="form-outline mb-4">
               <input type="text" id="contact_no" name="contact_no" value="{{$driver->contact_no}}" class="form-control" />
               <label class="form-label" for="contact_no">Contact No.</label>
              </div>             
 
              <!-- License No.  -->
 
              <div class="form-outline mb-4">
               <input type="text" id="license_number" name="license_number" value="{{$driver->license_number}}" class="form-control" />
               <label class="form-label" for="license_number">Contact No.</label>
              </div>             
 
              <!-- Plate No. -->
 
               <div class="form-outline mb-4">
                <input type="text" id="plate_no" name="plate_no" value="{{$driver->plate_no}}" class="form-control" />
                <label class="form-label" for="plate_no">Plate No.</label>
               </div>
              <!-- Created At. -->
 
              <div class="form-outline mb-4">
                <input type="text" id="created_at" name="created_at" value="{{$driver->created_at}}" class="form-control" />
                <label class="form-label" for="created_at">Created At</label>
              </div>
              <!-- Updated At. -->
              <div class="form-outline mb-4">
                <input type="text" id="updated_at" name="updated_at" value="{{$driver->updated_at}}" class="form-control" />
                <label class="form-label" for="updated_at">Updated At</label>
               </div>
    
                </fieldset>
                     <div class="modal-footer">
                        <a class="btn btn-secondary btn-block" data-mdb-dismiss="modal">
                            Back
                        </a>
                     </div>
             </div>
           </div>
         </div>
       </div>
@endif


@if(isset($dispatcher))
<button type="button" class="btn btn-warning btn-sm" data-mdb-toggle="modal" data-mdb-target="#showModal{{$dispatcher->user->id}}">
    SHOW
 </button>

 <div class="modal top fade" id="showModal{{$dispatcher->user->id}}" tabindex="-1" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
     <div class="modal-dialog ">
       <div class="modal-content">
         <div class="modal-header mbc1">
           <h5 class="modal-title">VIEW REGISTERED ACCOUNTS</h5>
           <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <fieldset disabled>
              {{--  Dispatcher ID --}}
         <div class="row">
            <div class="col"> 
             <div class="form-outline mb-4">
               <input type="text" id="id" name="id" value="{{$dispatcher->user->id}}" class="form-control" />
               <label class="form-label" for="id">Dispatcher ID</label>
             </div>
            </div>
          </div>

            <div class="row mb-4">
              <div class="col"> 
                <div class="form-outline">
                  <input type="text" id="forupdateFullNamem6Example1" name="updateFullName" value="{{ $dispatcher->user->name }}" class="form-control" />
                  <label class="form-label" for="updateFullName">Dispatcher Name</label>
                 </div>
              </div>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="updateEmail" name="updateEmail" value=" {{ $dispatcher->user->email }}" class="form-control" />
              <label class="form-label" for="updateEmail">Dispatcher Email</label>
            </div>

            <div class="form-outline mb-4">
              <input type="text" id="contact_no" name="contact_no" value="{{ $dispatcher->contact_no }}" class="form-control" style="text-transform:capitalize;"/>
              <label class="form-label" for="contact_no">Contact Number</label>
            </div>

            
            <div class="form-outline mb-4">
             <input type="text" id="created_at" name="created_at" value="{{ $dispatcher->created_at }}" class="form-control" style="text-transform:capitalize;"/>
             <label class="form-label" for="contact_no">Created At</label>
           </div>

           <div class="form-outline mb-4">
             <input type="text" id="updated_at" name="updated_at" value="{{ $dispatcher->updated_at }}" class="form-control" style="text-transform:capitalize;"/>
             <label class="form-label" for="updated_at">Updated At</label>
           </div>

            </fieldset>
                 <div class="modal-footer">
                    <a class="btn btn-secondary btn-block" data-mdb-dismiss="modal">
                        Back
                    </a>
                 </div>
         </div>
       </div>
     </div>
   </div>
@endif

@if(isset($staff))
<button type="button" class="btn btn-warning btn-sm" data-mdb-toggle="modal" data-mdb-target="#showModal{{$staff->user->id}}">
    SHOW
 </button>

 <div class="modal top fade" id="showModal{{$staff->user->id}}" tabindex="-1" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
     <div class="modal-dialog ">
       <div class="modal-content">
         <div class="modal-header mbc1">
           <h5 class="modal-title">VIEW REGISTERED ACCOUNTS</h5>
           <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <fieldset disabled>
              {{--  Dispatcher ID --}}
         <!-- 2 column grid layout with text inputs for the first and last names -->
         <div class="row">
            <div class="col"> 
              <div class="form-outline mb-4">
                <input type="text" id="updateFullName" name="updateFullName" value="{{$staff->user->name}}" class="form-control" />
                 <label class="form-label" for="id">Staff ID</label>
               </div>
            </div>
          </div>

          <!-- Email input -->

          <div class="form-outline mb-4">
            <input type="email" id="updateEmail" name="updateEmail" value="{{$staff->user->email}}" class="form-control" />
            <label class="form-label" for="id">Staff Email</label>
           </div>


          <!-- Contact No input -->

          <div class="form-outline mb-4">
            <input type="text" id="updateContactNo" name="updateContactNo" value="{{$staff->contact_no}}" class="form-control" />
            <label class="form-label" for="id">Password</label>
           </div>

          <!-- Contact No input -->

          <div class="form-outline mb-4">
            <input type="text" id="updateStaff" name="updateStaff" value="{{$staff->created_at}}" class="form-control" />
          </div>

          <!-- Contact No input -->

          <div class="form-outline mb-4">
            <input type="text" id="updateStaffAt" name="updateStaffAt" value="{{$staff->updated_at}}" class="form-control" />
          </div>

            </fieldset>
                 <div class="modal-footer">
                    <a class="btn btn-secondary btn-block" data-mdb-dismiss="modal">
                        Back
                    </a>
                 </div>
         </div>
       </div>
     </div>
   </div>
@endif
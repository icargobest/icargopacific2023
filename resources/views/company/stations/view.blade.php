
<button type="button" class="btn btn-warning btn-sm" data-mdb-toggle="modal" data-mdb-target="#showModal{{$station->id}}">
    Show
 </button>

 <div class="modal top fade" id="showModal{{$station->id}}" tabindex="-1" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
     <div class="modal-dialog ">
       <div class="modal-content">
         <div class="modal-header mbc1">
           <h5 class="modal-title">View</h5>
           <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <fieldset disabled>
               <!-- 2 column grid layout with text inputs for the first and last names -->

             <!-- Station ID Input -->
             <div class="row">
              <div class="col">
                <div class="form-outline mb-4">
                  <input type="text" id="stationID" name="station_id" value="{{$station->station_number}}" class="form-control" />
                  <label class="form-label" for="stationID">Station Number</label>
                </div>
              </div>
            </div>
            <!-- Station Name input -->
            <div class="form-outline mb-4">
              <input type="text" id="stationName" name="station_name" value="{{$station->station_name}}" class="form-control" />
              <label class="form-label" for="stationName">Station Name</label>
            </div>

            <!-- Sttation Address input -->
            <div class="form-outline mb-4">
              <input type="text" id="stationAddress" name="station_address" value="{{$station->station_address}}" class="form-control" />
              <label class="form-label" for="stationAddress">Address</label>
            </div>

            <!-- Station Contact No. -->
             <div class="form-outline mb-4">
              <input type="text" id="stationContactNo" name="station_contact_no" value="{{$station->station_contact_no}}" class="form-control" />
              <label class="form-label" for="stationContactNo">Contact No.</label>
            </div>

            <!-- Station Email. -->
             <div class="form-outline mb-4">
              <input type="text" id="stationEmail" name="station_email" value="{{$station->station_email}}" class="form-control" />
              <label class="form-label" for="stationEmail">Email</label>
            </div>

            <!-- Station Email. -->
             <div class="form-outline mb-4">
              <input type="text" id="stationEmail" name="station_email" value="{{$station->created_at}}" class="form-control" />
              <label class="form-label" for="stationEmail">Created At</label>
            </div>

            <!-- Station Email. -->
             <div class="form-outline mb-4">
              <input type="text" id="stationEmail" name="station_email" value="{{$station->updated_at}}" class="form-control" />
              <label class="form-label" for="stationEmail">Updated At</label>
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
 </div>

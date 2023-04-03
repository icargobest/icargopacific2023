@include('partials.navigation', ['waybill' => 'fw-bold'])

<div class="modal-body">
      <fieldset disabled>
        <div class="input-group">
            <span class="input-group-text" style="margin-right: 10px; background-color: #4EA646; font-weight: 600; color: white;">ID</span>
            <input value="{{$ships->id}}" style="border: none;">
       </div></br>
       <div class="input-group">
            <span class="input-group-text" style="margin-right: 10px; background-color: #4EA646; font-weight: 600; color: white;">Pick up</span>
            <input value="{{$ships->sender_name}} , {{$ships->sender_city}}" style="border: none; width: 100%">
        </div></br>
        <div class="input-group">
             <span class="input-group-text" style="margin-right: 10px; background-color: #4EA646; font-weight: 600; color: white;">Drop off</span>
             <input value="{{$ships->recipient_name}} , {{$ships->recipient_city}}" style="border: none; width: 100%">
         </div></br>
         <div class="input-group">
              <span class="input-group-text" style="margin-right: 10px; background-color: #4EA646; font-weight: 600; color: white;">Parcel Size & Weight</span>
              <input value="{{$ships->length}}x{{$ships->width}}x{{$ships->height}} | {{$ships->weight}}Kg" style="border: none; width: 100%">
          </div></br>
          <div class="input-group">
               <span class="input-group-text" style="margin-right: 10px; background-color: #4EA646; font-weight: 600; color: white;">Parcel Item</span>
               <input value="" style="border: none; width: 100%">
           </div></br>
           <div class="input-group">
                <span class="input-group-text" style="margin-right: 10px; background-color: #4EA646; font-weight: 600; color: white;">Freight Charge</span>
                <input value="" style="border: none; width: 100%">
            </div></br>
    </fieldset>

      <div class="modal-footer">
          <a href="{{route('waybillPanel')}}" class="btn btn-success btn-block">
            Back
          </a>
        </div>
    </form>
  </div>

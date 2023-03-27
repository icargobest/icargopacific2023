@include('partials.navigation', ['employee' => 'fw-bold'])

<div class="modal-body">
    <form method="POST" action="{{route('saveUpdatedEmployee')}}">
      @csrf
      <!-- 2 column grid layout with text inputs for the first and last names -->
      <div class="row mb-4">
        <div class="col">
          <div class="form-outline">
            <input type="text" id="form6Example1" name="updateFullName" value="{{$emp->name}}" class="form-control" />
          </div>
        </div>
      </div>
      <input type="hidden" name="id" value="{{$emp->id}}">
        <!--</div>
        <div class="col">
          <div class="form-outline">
            <input type="text" id="form6Example2" class="form-control" />
            <label class="form-label" for="form6Example2">Last name</label>
          </div>
        </div>
      </div>-->

      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" id="form6Example5" name="updateEmail" value="{{$emp->email}}" class="form-control" />
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" id="form6Example5" name="updatePassword" value="{{$emp->password}}" class="form-control" />
      </div>

      <!-- Job -->
      <!--<div class="form-outline mb-4">
        <input type="text" id="form6Example3" class="form-control" />
        <label class="form-label" for="form6Example3">Job</label>
      </div>-->

      <!-- Department -->
      <!--<div class="form-outline mb-4">
        <input type="text" id="form6Example3" class="form-control" />
        <label class="form-label" for="form6Example3">Department</label>
      </div>-->

      <!-- Position -->
       <div class="form-outline mb-4">
        <input type="text" id="form6Example4" name="updateRole" value="{{$emp->role}}" class="form-control" />
      </div>

      <!-- Number input -->
      <!--<div class="form-outline mb-4">
        <input type="number" id="form6Example6" class="form-control" />
        <label class="form-label" for="form6Example6">Phone</label>
      </div>-->

      <!-- Message input -->
       <!--<div class="form-outline mb-4">
        <textarea class="form-control" id="form6Example7" rows="4"></textarea>
        <label class="form-label" for="form6Example7">Additional information</label>
      </div>-->

      <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-block" data-mdb-dismiss="modal">
            Save
          </button>
        </div>
    </form>
  </div>

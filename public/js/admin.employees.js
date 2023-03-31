    // Get the modal element
    var myModal = document.getElementById('exampleModal');

    var editModal = document.getElementById('editModal');


    // Get the button element
    var closeModalButton = document.getElementById('closeModalButton');
    var addModal = document.getElementById('addModal');
    var saveModal = document.getElementById('saveModal');

    var closeModalButton2 = document.getElementById('closeModalButton2');
    var addModal2 = document.getElementById('addModal2');
    var saveModal2 = document.getElementById('saveModal2');
    // Add an event listener to the button


    closeModalButton.addEventListener('click', function() {
      // Hide the modal
      var modal = bootstrap.Modal.getInstance(myModal);
      modal.hide();
    });


    addModal.addEventListener('click', function() {
      // Hide the modal
      var modal = bootstrap.Modal.getInstance(myModal);
      modal.hide();
    });    
    
    saveModal.addEventListener('click', function() {
      // Hide the modal
      var modal = bootstrap.Modal.getInstance(myModal);
      modal.hide();
    });





    closeModalButton2.addEventListener('click', function() {
      // Hide the modal
      var modal = bootstrap.Modal.getInstance(editModal);
      modal.hide();
    });


    addModal2.addEventListener('click', function() {
      // Hide the modal
      var modal = bootstrap.Modal.getInstance(editModal);
      modal.hide();
    });    
    
    saveModal2.addEventListener('click', function() {
      // Hide the modal
      var modal = bootstrap.Modal.getInstance(editModal);
      modal.hide();
    });
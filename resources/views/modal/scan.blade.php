<form id="insertForm" method="post" enctype="multipart/form-data">
  @csrf
  <div class="modal fade" id="scanModal" tabindex="-1" aria-labelledby="scanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="scanModalLabel"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <label for="badge" class="class-control">Badge No.</label> 
          <input type="text" class="form-control" name="badge" id="badge" maxlength="6">
          <label for="fname" class="control-label">Name</label>
          <input type="text" class="form-control" name="fname" id="fname">
          Supervisor
          <input type="text" class="form-control" name="supv" id="supv">
          <label for="area" class="class-control">Area</label>
          <select class="form-control" id="area" name="area">
            <option value=""></option>
            <option value="area1">area1</option>
            <option value="area2">area2</option>
            <option value="area3">area3</option>
          </select>
          <label for="adate" class="class-control">Date</label>
          <input type="date" class="form-control" name="date" id="date">
          <label for="pts" class="class-control">Points</label>
          <input type="number" class="form-control" name="pts" id="pts">
          <label for="remarks" class="class-control">Remarks</label>
          <textarea class="form-control" name="remarks" id="remarks"></textarea>
          <label for="trans_by" class="control-label">Trans By</label>
          <input type="text" class="form-control" id="trans_by" name="trans_by">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="submitButton">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>
<script>
  $(document).ready(function(){
    $('#pts').on('input',function(){
      var sanitizedValue = $(this).val().replace(/[^0-9]/g, '');
      $(this).val(sanitizedValue);
    });
  });
</script>
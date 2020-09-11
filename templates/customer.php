
<div class="modal fade" id="exampleModalCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> ADD MOVIE</h5>
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

    <form id="customer_form" onsubmit="return false">
            
             <!--   <div class="form-group col-md-6">
              <label>Date</label>
              <input type="text" class="form-control" name="added_date" id="added_date" value="<php echo date("d-m-y,h-m-s");?>" readonly/>
              
            </div> -->
            <div class="form-group">
            <label>Movie Name</label>
              <input type="text" class="form-control" name="coustomer" id="customer" placeholder="Enter Movie Name" required/>
          
      </div>
      <div class="form-group">
       <label>Genre/Catagory</label>
       <input type="text" class="form-control" name="c_nam" id="c_nam" placeholder="Enter Movie Catagory Name" required/>
  </div>
  <div class="form-group">
       <label>Release Date </label>
       <input type="text" class="form-control" name="t_n" id="t_n" placeholder="dd-mm-year" required/>
      
</div>
<div class="form-group">
       <label>Rating Catagory</label>
       <input type="text" class="form-control" name="coun_nam" id="coun_nam" placeholder="Rating Catagory" required/>
      
</div>
   
       
  <button type="submit" class="btn btn-success">Add Your Movie </button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>
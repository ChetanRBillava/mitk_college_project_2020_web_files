<?php
include('header.php');
?>
<br><br><br>
<div class="col-md-2">
	
</div>
<div class="card col-md-8">
    <div class="card-header" style="text-align: center;">
         <strong>Add room</strong>
  	</div>
    <div class="card-body card-block">
    <form>
    
        <div class="form-group">
        	<label for="rno" class=" form-control-label">Room No.</label>
        	<input type="rno" id="rno" name="email" placeholder="Enter Room No..." class="form-control">
        </div>
        <div class="form-group">
          <label for="rtype" class=" form-control-label">For</label>
          <select class="form-control" id="forS" name="forS">
          	  <option disabled>Select</option>
		      <option value='Male'>Male</option>
		      <option value='Female'>Female</option>
		   </select>
        </div>
        <div class="form-group">
          <label for="rtype" class=" form-control-label">Type</label>
          <select class="form-control" id="rtype" name="rtype">
          	  <option>Select</option>
		      <option>Attached Bathroom</option>
		      <option>Common Bathroom</option>
		   </select>
        </div>

        <div class="form-group">
          <label for="rent" class=" form-control-label">Rent</label>
          <input type="number" id="rent" name="rent"  class="form-control">
        </div>

        <div class="form-group">
          <label for="cap" class=" form-control-label">Max Capacity</label>
          <input type="number" id="cap" name="cap"  class="form-control">
        </div>

        



        <div class="card-footer" style="text-align: right;">
		  	<button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">
		    <i class="fa fa-dot-circle-o"></i> Submit</button>
		    <button type="reset" class="btn btn-danger btn-sm">
		    <i class="fa fa-ban"></i> Reset</button>
    	</div>
    </form>
    </div>
    
</div>
<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$('#submit').click(function(e){
        e.preventDefault();
        var rno = $("#rno").val();
        var forS = $("#forS").val();
        var rtype = $("#rtype").val();
        var rent = $("#rent").val();
        var cap = $("#cap").val();
   if (rno == "" || rtype == "" || rent == "" || cap == "" )
     {
       alert('Enter all fields.');
     }
        else
          {
           
        $.ajax({
            type: "POST",
            url: "room_insert.php",
            dataType: "json",
            data: {rno:rno, forS:forS, rtype:rtype, rent:rent, cap:cap},
            success : function(data){
                if (data.code == "200"){
                alert(data.msg);
                  window.location = "view_rooms.php";
                } 
                else {
                    
                // html("<div class='alert alert-success' id='alert'><p>error </p></div>");
                   alert(data.msg);
                }
            }
        });
          }

       });
</script>

<div class="col-md-2">
	
</div>
<?php
include('footer.php');
?>
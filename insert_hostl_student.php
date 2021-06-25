<?php
include('header.php');
?>
<br><br><br>
<div class="col-md-2">
	
</div>
<div class="card col-md-8">
    <div class="card-header" style="text-align: center;">
         <strong>Add students to hostel</strong>
  	</div>
    <div class="card-body card-block">
    <form>
    	<div class="form-group">
    		<label for="name" class=" form-control-label">Student Name</label>
    		<input type="text" id="name" name="name" placeholder="Enter name.." class="form-control">
    	</div>
        <div class="form-group">
          <label for="student type" class=" form-control-label">Gender</label>
          <select class="form-control" id="stu_gen" name="stu_gen">
          	  <option disabled>Select gender</option>
		      <option>Male</option>
		      <option>Female</option>
		   </select>
        </div>
        <div class="form-group">
          <label for="student type" class=" form-control-label">Semester</label>
          <select class="form-control" id="stu_sem" name="stu_sem">
          	  <option disabled>Select sem</option>
		      <option>1</option>
		      <option>2</option>
		      <option>3</option>
		      <option>4</option>
		      <option>5</option>
		      <option>6</option>
		      <option>7</option>
		      <option>8</option>
		   </select>
        </div>
        <div class="form-group">
        	<label for="email" class=" form-control-label">Email </label>
        	<input type="email" id="email" name="email" placeholder="Enter Password.." class="form-control">
        </div>

        <div class="form-group">
          <label for="phno" class=" form-control-label">Phone No </label>
          <input type="number" id="no" name="no" placeholder="9880754874.." class="form-control">
        </div>

        <div class="form-group">
          <label for="addd" class=" form-control-label">Address </label>
          <input type="text" id="addr" name="addr"  class="form-control">
        </div>

        <div class="form-group">
          <label for="branch" class=" form-control-label">Branch </label>
          <input type="text" id="branch" name="branch"  class="form-control">
        </div>

        <div class="form-group">
          <label for="guardian_name" class=" form-control-label">Guardian Name </label>
          <input type="text" id="guardian_name" name="guardian_name"  class="form-control">
        </div>

        <div class="form-group">
          <label for="guardian_phone" class=" form-control-label">Guardian Phone </label>
          <input type="text" id="guardian_phone" name="guardian_phone"  class="form-control">
        </div>

        <div class="form-group">
          <label for="guardian_email" class=" form-control-label">Guardian Email </label>
          <input type="email" id="guardian_email" name="guardian_email"  class="form-control">
        </div>

        <div class="form-group">
          <label for="student type" class=" form-control-label">Student Type </label>
          <select class="form-control" id="stu_type" name="stu_type">
          	  <option disabled>Select type</option>
		      <option>Studying</option>
		      <option>Graduated</option>
		      <option>New admission</option>
		   </select>
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
        var name = $("#name").val();
        var gen = $("#stu_gen").val();
        var sem = $("#stu_sem").val();
        var email = $("#email").val();
        var no = $("#no").val();
        var addr = $("#addr").val();
        var branch = $("#branch").val();
        var guardian_name = $("#guardian_name").val();
        var guardian_phone = $("#guardian_phone").val();
        var guardian_email = $("#guardian_email").val();
        var stu_type = $("#stu_type").val();
   if (name == "" || gen == "" || sem == "" || email == "" || no == "" || addr == "" || branch == "" || guardian_phone == "" || guardian_email == "" || stu_type == "")
     {
       alert('Enter all fields.');
     }
        else
          {
           
        $.ajax({
            type: "POST",
            url: "hostl_insert.php",
            dataType: "json",
            data: {name:name, gen:gen, sem:sem, email:email, no:no, addr:addr, branch:branch, guardian_name:guardian_name, guardian_phone:guardian_phone, guardian_email:guardian_email, stu_type:stu_type },
            success : function(data){
                if (data.code == "200"){
                alert(data.msg);
                  window.location = "insert_hostl_student.php";
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
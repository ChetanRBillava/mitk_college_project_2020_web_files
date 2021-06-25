<?php
include('shopkeeper_header.php');
?>
<br><br><br>
<div class="col-md-2">
	
</div>
<div class="card col-md-8">
    <div class="card-header" style="text-align: center;">
         <strong>Add stationary item</strong>
  	</div>
    <div class="card-body card-block">
    <form>
    
        <div class="form-group">
        	<label for="iname" class=" form-control-label">Item name</label>
        	<input type="iname" id="iname" name="email" placeholder="Enter item name..." class="form-control">
        </div>

        
        <div class="form-group">
        	<label for="iamnt" class=" form-control-label">Item amount</label>
        	<input type="iamnt" id="iamnt" name="iamnt" placeholder="Enter amount..." class="form-control">
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
        var iname = $("#iname").val();
        var iamnt = $("#iamnt").val();
   if (iname == "" || iamnt == "")
     {
       alert('Enter all fields.');
     }
        else
          {
           
        $.ajax({
            type: "POST",
            url: "item_insert.php",
            dataType: "json",
            data: {iname:iname, iamnt:iamnt},
            success : function(data){
                if (data.code == "200"){
                alert(data.msg);
                  window.location = "view_stationary_items.php";
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
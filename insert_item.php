<?php
include('header.php');
?>
<br><br><br>
<div class="col-md-3">
	
</div>
<div class="card col-md-6">
    <div class="card-header">
         <strong>Add Items</strong>
  	</div>
    <div class="card-body card-block">
    <form method="POST" >
    	<div class="form-group">
    		<label for="name" class=" form-control-label">Item name</label>
    		<input type="text" id="item_name" name="item_name" placeholder="Enter name.." class="form-control">
    		<span class="help-block">Enter the item name you want to insert!</span>
    	</div>
        <div class="form-group">
        	<label for="amt" class=" form-control-label">Item Amount </label>
        	<input type="text" id="item_amount" name="item_amount" placeholder="Enter Password.." class="form-control">
        	<span class="help-block">Enter the amount per item</span>
        </div>

        <div class="form-group">
          <label for="qty" class=" form-control-label">Item Quantity </label>
          <input type="text" id="item_qty" name="item_qty" placeholder="Enter quantity.." class="form-control">
        </div>

        <div class="card-footer">
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
       
        var item_name = $("#item_name").val();
        var item_amt = $("#item_amount").val();
        var item_qty = $("#item_qty").val();
   if (item_name == "" && item_amt == "" && item_qty == "")
     {
       alert('enter data');
     }
        else
          {
           
        $.ajax({
            type: "POST",
            url: "insert.php",
            dataType: "json",
            data: {item_name:item_name, item_amt:item_amt, item_qty:item_qty},
            success : function(data){
                if (data.code == "200"){
                alert(data.msg);
                  window.location = "insert_item.php";
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

<div class="col-md-3">
	
</div>
<?php
include('footer.php');
?>
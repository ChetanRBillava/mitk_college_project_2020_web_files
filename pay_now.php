<?php
include('header.php');
?>
<br><br><br>
<div class="col-md-2">
	
</div>
<div class="card col-md-8">
    <div class="card-header" style="text-align: center;">
         <strong>Pay Now</strong>
  	</div>
    <div class="card-body card-block">
    <form>
        <div class="form-group">
        	<label for="email" class=" form-control-label">Email </label>
        	<input type="email" id="email" name="email" placeholder="Enter Password.." class="form-control">
        </div>

        <div class="form-group">
          <label for="payment_for" class=" form-control-label">Payment For </label>
          <select class="form-control" id="payment_for" name="payment_for">
            <option>Select</option>
            <option>stationary</option>
            <option>mess_bill</option>
            <option>hostel_rent</option>
            <option>admission_fee</option>
          </select>
        </div>

        <div class="form-group">
          <label for="trans_detail" class=" form-control-label">Transaction Detail </label>
          <input type="text" id="trans_detail" name="trans_detail" class="form-control">
        </div>

        <div class="form-group">
          <label for="trans_type" class=" form-control-label">Transaction Type </label>
          <select class="form-control" id="trans_type" name="trans_type">
            <option>Online</option>
            <option>Offline</option>
          </select>
        </div>

        <div class="form-group">
          <label for="trans_date" class=" form-control-label">Transaction Date </label>
          <input type="date" id="trans_date" name="trans_date"  class="form-control">
        </div>

        <div class="form-group">
          <label for="total_amt" class=" form-control-label">Total Amount </label>
          <input type="number" id="total_amt" name="total_amt"  class="form-control">
        </div>

        <!-- <div class="form-group">
          <label for="trans_status" class=" form-control-label">Transaction Status </label>
          <input type="text" id="trans_status" name="trans_status"  class="form-control">
        </div> -->

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
        var email = $("#email").val();
        var payment_for = $("#payment_for").val();
        var trans_detail = $("#trans_detail").val();
        var trans_type = $("#trans_type").val();
        var trans_date = $("#trans_date").val();
        var total_amt = $("#total_amt").val();

   if (email == "" || payment_for == "" || trans_detail == "" || trans_type == "" || trans_date == "" || total_amt == "" )
     {
       alert('Please enter all fields.');
     }
        else
          {
           
        $.ajax({
            type: "POST",
            url: "insert_pay.php",
            dataType: "json",
            data: {email:email, payment_for:payment_for, trans_detail:trans_detail, trans_type:trans_type, trans_date:trans_date, total_amt:total_amt },
            success : function(data){
                if (data.code == "200"){
                alert(data.msg);
                  window.location = "pay_now.php";
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
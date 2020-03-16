			<?php if(isset($msg)){
				echo $msg;
			}?>
<form name="thriftform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
			<label for="amount">Thrift Amount for <?php echo date("Y"); ?></label> <?php echo $amountErr; ?>
			<br>
			<input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Amount">
			<input type="hidden" name="thriftyear" id="thriftyear" value='<?php echo date("Y");  ?>'>
			<input type="hidden" name="thriftdate" id="thriftdate" value='<?php echo date("l, d M Y");  ?>'>
			<br>
			<input type="submit" name="thriftbtn" id="loanbtn" class="form-control btn btn-success" value="Submit">
			<br>
			</form>

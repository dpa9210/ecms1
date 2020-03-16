calPayBackAmount = function(){
					var amount = document.getElementById('amount').value;
					var period = document.getElementById('loanperiod').value;
					document.getElementById('paybackAmount').value=parseInt(amount)/parseInt(period);
				}
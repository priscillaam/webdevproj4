<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/card.css">

</head>
<body>
	<div class="container">
		<div class="col1">
			<div class="card">
				<div class="front">
					<div class="type">
            <p id="ccType"></p>
						<img class="bankid"/>
					</div>
					<span class="chip"></span>
					<span class="card_number"> &#x2a;&#x2a;&#x2a;&#x2a;
						&#x2a;&#x2a;&#x2a;&#x2a; &#x2a;&#x2a;&#x2a;&#x2a;
					&#x2a;&#x2a;&#x2a;&#x2a;</span>
					<div class="expdate"><span class="date_value">MM / YYYY</span></div>
					<span class="cardholder"> Cardholder Name </span>
				</div>
				<div class="back">
       				 <div class="magneticstrip"></div>
        			<div class="bar"></div>
        			<span class="seccode">&#x2a;&#x2a;&#x2a;</span>
        			<span class="backchip"></span>
        			<span class="disclaimer">This card is not real.</span>
      			</div>
    		</div>
  		
       
    <label>Card Number</label>
    <input class="number" type="text" name="cardnum" ng-model="ncard" maxlength="19" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
    <label>Cardholder Name</label>
    <input class="inputname" type="text" input="cardholder" placeholder=""/>
    <label>Exp Date</label>
    <input class="expire" type="text" name="expdate" placeholder="MM / YYYY"/>
    <label>Security Number</label>
    <input class="ccv" type="text" name="cvv" placeholder="CVV" maxlength="3" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
  </div>
   
    <div class="col2">
    <label> Address</label>
    <input type="text" name="address">
    <label> City</label>
    <input type="text" name="city">
    <label>Zipcode </label>
      <input type="text" name="zipcode">
    <label>Phone Number</label>
    <input type="text" name="pnumber">
<div id="subbutton">
    <button class="buy">Pay</button>
</div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
  </div>
  
</div>
</body>
</html>
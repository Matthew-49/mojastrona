<input id="carorJu" maxlength="2" size="2" value="0" type="text"/>
<label class="proIns">no sugar</label><input id="noSAcarorJu" type="checkbox"/>
<input value="Add to Bakset" onclick="calculateOrder()" type="button" class="button_addtobasket"/>





function ShowHide()
{
     var div = document.getElementById("payment_wrapper");
        if (div.style.display == "block") 
        {
            div.style.display = "none";
        }
        else  
        {
            div.style.display = "block";
        }
		 
    }






// Bakset
// function calculateOrder is resposible for all calcutation	
	

function calculateOrder()
{

 // quantine
	var orangeJus = parseInt(document.getElementById("orangeJu").value);
	var appleJus = parseInt(document.getElementById("appleJu").value);
	var grapeJus = parseInt(document.getElementById("grapeJu").value);
	var carrotJus = parseInt(document.getElementById("carrotJu").value);
	var carorJus = parseInt(document.getElementById("carorJu").value);
	var tropSms = parseInt(document.getElementById("tropSm").value);
	var cranberrySms = parseInt(document.getElementById("cranberrySm").value);
	var bananSms = parseInt(document.getElementById("bananSm").value);
	var proteins = parseInt(document.getElementById("protein").value);
	var supermans = parseInt(document.getElementById("superman").value);


	var orangeJuPrice = 7.89 * orangeJus;
	var appleJuPrice = 7.89 * appleJus;
	var grapeJuPrice = 7.89 * grapeJus;
	var carrotJuPrice = 7.89 * carrotJus;
	var carorJuPrice = 7.89 * carorJus;
	var tropSmPrice = 9.89 * tropSms;
	var cranberrySmPrice = 9.89 * cranberrySms;
	var bananSmPrice = 9.89 * bananSms;
	var proteinPrice = 9.89 * proteins;
	var supermanPrice = 9.89 * supermans;
	
	var totalQuantity = orangeJus + appleJus + grapeJus + carrotJus + carorJus + tropSms + cranberrySms + bananSms + proteins + supermans;
	var totalPrice = orangeJuPrice + appleJuPrice + grapeJuPrice + carrotJuPrice + carorJuPrice + tropSmPrice + cranberrySmPrice + bananSmPrice + proteinPrice + supermanPrice;
	var totalTpay = totalQuantity * totalPrice;
	
	
	 var VAT = 17.5
	 
	 var VatTotalPrice = (totalPrice * (VAT/100));
	
	 var finalTotalprice = totalPrice + VatTotalPrice;
	 
	 var discount = 12.5;
	 
	 var discSum = (totalPrice  * (discount/100));
	 
	 var priceAfterdisc = totalPrice - discSum;
	 
	 var VatPriceAfterdisc = (priceAfterdisc * (VAT/100));
	 
	 var totalpriceDiscVat = priceAfterdisc + VatPriceAfterdisc;
	
	// output of calcutation

	if (totalQuantity < 6)
		{
		document.getElementById("totalCost").innerHTML = "£"+totalPrice.toFixed(2);
		document.getElementById("VAT").innerHTML ="£"+ VatTotalPrice.toFixed(2);
		document.getElementById("totalVAT").innerHTML = "£"+finalTotalprice.toFixed(2);
		}
	else 		
		{				        
		document.getElementById("totalCost").innerHTML ="£"+ totalPrice.toFixed(2);
		document.getElementById("VAT").innerHTML = "£"+VatTotalPrice.toFixed(2);
		document.getElementById("totalVAT").innerHTML = "£"+finalTotalprice.toFixed(2);
		document.getElementById("discount").innerHTML = "Discount: £"+discSum.toFixed(2);
		}
}




// function  resposible for all  customer detalis

function takeDetalis() 
{

	
	  
	var Title = document.getElementById("title").value;
	var firstName = document.getElementById("firstName").value;
	var surName = document.getElementById("surName").value;
	var address = document.getElementById("address").value;
	var addressLine2 = document.getElementById("addressLine2").value;
	var town = document.getElementById("town").value;
	var postCode = document.getElementById("postCode").value;
	
	
	var sendingTitle = document.getElementById("sendingTitle").value;
	var sendingFirstName = document.getElementById("sendingFirstName").value;
	var sendingSurname = document.getElementById("sendingSurname").value;
	var sendingAddress = document.getElementById("sendingAddress").value;
	var sendingAddressLine2 = document.getElementById("sendingAddressLine2").value;
	var sendingTown = document.getElementById("sendingTown").value;
	var sendingPostCode = document.getElementById("sendingPostCode").value;
	
	
	
	var cardType = document.getElementById("cardType").value;
	var cardNumber = document.getElementById("cardNumber").value; 
	var cardholderName = document.getElementById("cardholderName").value;
	var expirationMonth = document.getElementById("expirationMonth").value;
	var expirationYear = document.getElementById("expirationYear").value;
	var cv2 = document.getElementById("cv2").value;
	
	// inputs validation
	
	if ((cardType == null) || (cardType == 0)) 
		{
  alert("Card Type name must be filled out");
  return false;
  }
	if ((cardNumber == null) || (cardNumber == 0)) 
		{
  alert("Card Number must be filled out");
  return false;
  }
		
	if ((cardholderName == null) || (cardholderName == 0)) 
		{
  alert("Cardholder Name name must be filled out");
  return false;
  }
  
  if ((moko == null) || (moko == 0)) 
		{
  alert("3 Digit Verification Number must be filled out");
  return false;
  }
  
	
	if ((firstName == null) || (firstName.length == 0)) 
		{
  alert("First name must be filled out");
  return false;
  }
		
		
		
	if ((surName == null) || (surName.length == 0))
		{
  alert("Surname name must be filled out");
  return false;
  }
		
	if ((address == null) || (address == 0)) 
		{
  alert("Address must be filled out");
  return false;
  }
		
	if ((town == null) || (town == 0)) 
		{
  alert("Town must be filled out");
  return false;
  }
	
	if ((postCode == null) || (postCode == 0)) 
		{
  alert("Post Code must be filled out");
  return false;
  }
	
// output for all customer and address details
		
document.getElementById("dispTitle").innerHTML = Title; 
	document.getElementById("dispFirstName").innerHTML = firstName; 
	document.getElementById("dispSurname").innerHTML = surName;   
	document.getElementById("dispAddress").innerHTML = address;  
	document.getElementById("dispAddressLine2").innerHTML = addressLine2; 
	document.getElementById("dispTown").innerHTML = town;
	document.getElementById("dispPostCode").innerHTML = postCode;
	
	document.getElementById("dispSenTitle").innerHTML = sendingTitle; 
	document.getElementById("dispSenFirstName").innerHTML = sendingFirstName; 
	document.getElementById("dispSenSurname").innerHTML = sendingSurname;   
	document.getElementById("dispSenAddress").innerHTML = sendingAddress;  
	document.getElementById("dispSenAddressLine2").innerHTML = sendingAddressLine2; 
	document.getElementById("dispSenTown").innerHTML = sendingTown;
	document.getElementById("dispSenPostCode").innerHTML = sendingPostCode;
	
	document.getElementById("dispCardType").innerHTML = cardType; 
	document.getElementById("dispCardNumber").innerHTML = cardNumber; 
	document.getElementById("dispcardholderName").innerHTML = cardholderName;   
	document.getElementById("dispexpirationMonth").innerHTML = expirationMonth;
	document.getElementById("dispexpirationYear").innerHTML = expirationYear;
	document.getElementById("dispcv2").innerHTML = cv2; 
	}
	
	
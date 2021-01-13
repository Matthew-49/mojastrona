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
    
    
    
    var VAT = 23
	 
    var VatTotalPrice = (totalPrice * (VAT/100));
   
    var finalTotalprice = totalPrice + VatTotalPrice;
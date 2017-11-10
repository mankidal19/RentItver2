
function validateLogin(){
	var password = document.getElementById("passwordInput");
	var email = document.getElementById("emailInput");
	var atpos = emailInput.value.indexOf("@");
	var dotpos = emailInput.value.lastIndexOf(".");
	// var userType = document.getElementByName("usertype");
	// var isChecked = false;

	if (atpos < 1 || ( dotpos - atpos < 2))
	{
		alert("Please enter a valid email");
		email.focus();
		return false;	
	}
	if (password.value==""|| password.length<6 ||length>12) 
	{
		alert('Please enter a password length between 6-12');
		password.focus();
		return false;
	}
	
	return true;
}

function validateRegisterRentalMaster(){
	// var companyName = document.getElementById("companyName");
	// var establishDate = document.getElementById("establishDate");
	// var address1 = document.getElementById("address1");
	// var address2 = document.getElementById("address2");
	// var postcode = document.getElementById("postcode");
	// var country = document.getElementById("countryId");
	// var state = document.getElementById("stateId");
	// var city = document.getElementById("cityId");
	// var Cemail = document.getElementById("CEMail");
	// var Cphone = document.getElementById("CPhone");
	// var title = document.getElementById("title");
	// var firstName = document.getElementById("firstName");
	// var lastName = document.getElementById("lastName");
	// var gender = document.getElementById("gender");
	// var position = document.getElementById("position");
	// var email= document.getElementById("EMail");
	// var password = document.getElementById("password_div2");
	// var rPassword = document.getElementById("confirm_password_div2");

	// if (companyName=="")
	// {
	// 	alert("Please complete the form");
	// 	companyName.focus();
	// 	return false;
	// }
	// if (establishDate=="")
	// {
	// 	alert("Please complete the form");
	// 	establishDate.focus();
	// 	return false;
	// }
	// if (address1=="")
	// {
	// 	alert("Please complete the form");
	// 	address1.focus();
	// 	return false;
	// }
	// if (address2=="")
	// {
	// 	alert("Please complete the form");
	// 	address2.focus();
	// 	return false;
	// }
	// if (postCode=="")
	// {
	// 	alert("Please complete the form");
	// 	companyName.focus();
	// 	return false;
	// }
	// if (countryId=="")
	// {
	// 	alert("Please complete the form");
	// 	countryId.focus();
	// 	return false;
	// }
	// if (state=="")
	// {
	// 	alert("Please complete the form");
	// 	state.focus();
	// 	return false;
	// }
	// if (city=="")
	// {
	// 	alert("Please complete the form");
	// 	city.focus();
	// 	return false;
	// }
	// if (Cemail=="")
	// {
	// 	alert("Please complete the form");
	// 	Cemail.focus();
	// 	return false;
	// }
	// if (Cphone=="")
	// {
	// 	alert("Please complete the form");
	// 	Cphone.focus();
	// 	return false;
	// }
	// if (postCode=="")
	// {
	// 	alert("Please complete the form");
	// 	companyName.focus();
	// 	return false;
	// }
	// if (title=="")
	// {
	// 	alert("Please complete the form");
	// 	title.focus();
	// 	return false;
	// }
	// if (firstName=="")
	// {
	// 	alert("Please complete the form");
	// 	firstName.focus();
	// 	return false;
	// }
	// if (lastName=="")
	// {
	// 	alert("Please complete the form");
	// 	lastName.focus();
	// 	return false;
	// }
	// if (gender=="")
	// {
	// 	alert("Please complete the form");
	// 	gender.focus();
	// 	return false;
	// }
	// if (position=="")
	// {
	// 	alert("Please complete the form");
	// 	position.focus();
	// 	return false;
	// }
	// if (email=="")
	// {
	// 	alert("Please complete the form");
	// 	email.focus();
	// 	return false;
	// }
	// if (phone=="")
	// {
	// 	alert("Please complete the form");
	// 	phone.focus();
	// 	return false;
	// }
	// if (password==""||password.length<8||password.length>15)
	// {
	// 	alert("Please enter password with length 8 - 15");
	// 	password.focus();
	// 	return false;
	// }
	// if (rPassword=="")
	// {
	// 	alert("Please complete the form");
	// 	rPassword.focus();
	// 	return false;
	// }
	// if(password != rPassword)
	// {
	// 	alert("Password Confirmation Incorrect");
	// 	rPassword.focus();
	// 	return false
	// }

}


//to change form based on dropdown menu
function handleSelection(choice) {
   // document.getElementById('usertype').disabled=false;
    document.getElementById(choice).style.display="block";
    
}

function hideForm(select){
    if(select==1){
         document.getElementById("form1").style.display="block";
         document.getElementById("form2").style.display="none";
          document.getElementById('choose').disabled=true;
    }
    
    else if(select==2){
         document.getElementById("form2").style.display="block";
         document.getElementById("icon2").style.display="block";
         document.getElementById("form1").style.display="none";
         document.getElementById('choose').disabled=true;
    }
}

//check password matching
function check(select) {
  //  var div = document.getElementById('usertype').value;
   // var pwd = 'password_' + div;
    //var confirm_pwd = 'confirm_password_' + div;
    
    if(select==1){
        if (document.getElementById("password_div1").value ==
    document.getElementById("confirm_password_div1").value) {
        
        document.getElementById('registerButton1').disabled = false;
        document.getElementById('message1').style.color = 'green';
        document.getElementById('message1').innerHTML = 'matching';
  }
    
    else{
        
        document.getElementById('registerButton1').disabled = true;
        document.getElementById('message1').style.color = 'red';
        document.getElementById('message1').innerHTML = 'not matching';
        
     }
    }
  
    if(select==2){
        if(document.getElementById("password_div2").value ==
            document.getElementById("confirm_password_div2").value) {
    
        document.getElementById('registerButton2').disabled = false;
        document.getElementById('message2').style.color = 'green';
        document.getElementById('message2').innerHTML = 'matching';
    }
    
    else{
        
        document.getElementById('registerButton2').disabled = true;
        document.getElementById('message2').style.color = 'red';
        document.getElementById('message2').innerHTML = 'not matching';
        }
    }
  
  
  
  
}
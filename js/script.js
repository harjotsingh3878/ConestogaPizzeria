function isEmpty(string)
{
	/// <summary>Trims given string and determines whether it is empty.</summary>
	/// <param name="string">The string.</param>
	/// <returns type="Boolean">Returns true if string is empty, false otherwise.</returns>
	return string.trim() === "";
}

function isZero(string)
{
	
	return string.trim() === "0";
}

function areEquivalent(value1, value2)
{
	/// <summary>Determines whether two given values are strictly equivalent.</summary>
	/// <param name="value1">First value.</param>
	/// <param name="value2">Second value.</param>
	/// <returns type="Boolean">Returns true if values are equivalent, false otherwise.</returns>
	
	return value1 === value2;
}

function isChecked(inputSet)
{
	/// <summary>Determines whether at least one element in input set is checked.</summary>
	/// <param name="inputSet">The input set.</param>
	/// <returns type="Boolean">Returns true if at least one element is checked, false otherwise.</returns>
	
	var result = false;
	
	for(var i = 0; i < inputSet.length; i++)
		if(inputSet[i].checked === true)
		{
			result = true;
			break;
		}
	
	return result;
}

function isEmailValid(email)
{
	/// <summary>Determines whether given email address is valid.</summary>
	/// <param name="email">The email address.</param>
	/// <returns type="Boolean">Returns true if email is valid, false otherwise.</returns
	
	var emailRegularExpression = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*\.(\w{2}|(com))$/;
	var result = true;
	
	if(emailRegularExpression.test(email) === false) result = false;
	
	return result;
}

function isPostalCodeValid(postalCode)
{

	
	var postalCodeRegularExpression = /^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ]( )?\d[ABCEGHJKLMNPRSTVWXYZ]\d$/i;
	var result = true;
	
	if(postalCodeRegularExpression.test(postalCode) === false) result = false;
	
	return result;
}

function isRegistrationFormValid()
{
        /// <summary>Determines whether the input into the local Web form is valid.</summary>
        /// <returns type="Boolean">Returns true if input is valid, false otherwise.</returns>
    var errors = new Array();
    var errorMessage = "Please correctly provide the following information.\n";
    
    var temp = document.getElementById('error');
    
    var forename = document.getElementById("forename");
    var surname = document.getElementById("surname");
    var address = document.getElementById("address");
    var city = document.getElementById("city");
    var postalcode = document.getElementById("postalcode");
    var province = document.getElementById("province");
    var phone = document.getElementById("phone");
    var email = document.getElementById("email");
    var numberOfPizza = document.getElementById("numberOfPizza");   
    
    if(isEmpty(forename.value) === true) errors.push("Forename");
    if(isEmpty(surname.value) === true) errors.push("Surname");
    if(isEmpty(address.value) === true) errors.push("Address");
    if(isEmpty(city.value) === true) errors.push("City");
    if(isEmpty(postalcode.value) === true || isPostalCodeValid(postalcode.value) === false) errors.push("Postal Code");
    if(isEmpty(province.value) === true)  errors.push("Province");
    if(isEmpty(phone.value) === true) errors.push("Telephone Number");
    if(isEmpty(email.value) === true || isEmailValid(email.value) === false) errors.push("Email");
    if(isEmpty(numberOfPizza.value) === true || isZero(numberOfPizza.value) === true) errors.push("Number Of Pizza");

    if(errors.length !== 0)
    {
            for(var i = 0; i < errors.length; i++) errorMessage += "\n - " + errors[i];
            var temp = document.getElementById('error');
            temp.innerHTML = errorMessage;
           //             alert(errorMessage);
            return false;
    }
    else
    {
        temp.innerHTML = "";
        return true;
    }
     
}






// password confirm_password eye validation


    function togglePW1() {
        var a = document.getElementById("password");
        var y = document.getElementById("eye1");
        if (a.type === "password") {
            a.type = "text";
            y.className = "fa fa-eye-slash";
        } else {
            a.type = "password";
            y.className = "fa fa-eye";
        }
    }

  

    // Validation for matching passwords
    var password = document.getElementById("password");
    var confirm_password = document.getElementById("confirm_password");

    function validatePassword() {
        if (password.value !== confirm_password.value) {
            alert("Passwords do not match");
        } else {
            alert("Passwords match");
        }
    }

    // Attach the validation function to the input fields' onchange event
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;


 


  // name validation
  function validateName(input) {
    var name = input.value;
    var regex = /^[a-zA-Z ]+$/; 
    if (!regex.test(name)) {
        document.getElementById('name-error').textContent = "Alphabet only allowed ";
    } else {
        document.getElementById('name-error').textContent = "";
    }
}



// email validation


function validateEmail(input) {
  var email = input.value;
  var regex = /^[a-z]+[0-9]+@[lead.com]+$/i; // Regular expression for email validation

  if (!regex.test(email)) {
      document.getElementById('email-error').textContent = "Email should be in the format 'example123@lead.com'";
  } else {
      document.getElementById('email-error').textContent = "";
  }
}





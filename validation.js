function validateForm() {
  // Get the value of the input field with id="email"
  let email = document.getElementById("email").value;
  // Get the value of the input field with id="password"
  let password = document.getElementById("password").value;
  // Regular expression to check if the email is in the correct format
  let emailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

  // Check if the email is empty
  if (email == "") {
    ("Email field must be filled out");
    
  }

  
   
  // Check if the email is in the correct format
  if (!email.match(emailformat)) {
    preventDefault(); // Prevent form submission
    emailError.textContent = 'Please enter a valid email address';
  } else {
    emailError.textContent = ''; // Clear any previous error message
  }
   
    
  

  // Check if the password is empty
  if (password == "") {
    alert("Password field must be filled out");
    
  }

  


  return true;
}



function validatePassword() {
  // Get the value of the input field with id="password"
  let password = document.getElementById("password").value;

  // Get the value of the input field with id="passwordConfirm"
  let passwordConfirm = document.getElementById("passwordConfirm").value;

  // Regular expression to check if the password is strong enough

  let passwordformat = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
  // Check if the password is empty
  if (password == " ") {
    alert("Password field must be filled out");
    
  }

  // Check if the password is strong enough
 /* if (!password.match(passwordformat)) {
    alert("Password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, and one number");
    
  }*/

  // Check if the password confirmation is empty
  if (passwordConfirm == " ") {
    alert("Password confirmation field must be filled out");
    
  }

  // Check if the passwords match
  if (passwordConfirm != password) {
    alert("Passwords do not match")
    
  }


  
}


function validatename(){
  let nameform = /^[a-zA-Z]+ [a-zA-Z]+$/;
  let name = document.getElementById('name').value;

  if(!nameform.test(name)){
    alert('Invalid name given.');
  }

    

}

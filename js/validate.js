const errMsgEmail = document.querySelector("#errMsgEmail");
const errMsgPassword = document.querySelector("#errMsgPassword");
const errMsgCpassword = document.querySelector("#errMsgCpassword");
const errMsgRole = document.querySelector("#errMsgRole");
const errMsgUname = document.querySelector("#errMsgUname");
const errMsgMob = document.querySelector("#errMsgMob");
const errMsgDob = document.querySelector("#errMsgDob");

const nextBtn1 = document.querySelector("#next1");
const txtEmail = document.querySelector("#email");
const txtPassword = document.querySelector("#password");
const txtConfirmPassword = document.querySelector("#cpassword");
const role = document.querySelector('#role');
const username = document.querySelector('#uname');
const mobile = document.querySelector('#mob');
const dateOfBirth = document.querySelector('#dob');
const signUpForm = document.querySelector('#msform');

txtEmail.addEventListener("blur", () => {
  if (txtEmail.value.length < 1) {
    errMsgEmail.classList.add("showMsg");
    errMsgEmail.innerHTML = "Email is required";
  } else if (!emailValidate(txtEmail.value)) {
    errMsgEmail.classList.add("showMsg");
    errMsgEmail.innerHTML = "Email is not valid";
  } else if (whiteSpaceValidate(txtEmail.value)) {
    errMsgEmail.classList.add("showMsg");
    errMsgEmail.innerHTML = "Email is required";
  } else {
    errMsgEmail.classList.remove("showMsg");
  }
});

txtPassword.addEventListener("blur", () => {
  if (txtPassword.value.length < 1) {
    errMsgPassword.classList.add("showMsg");
    errMsgPassword.innerHTML = "Password is required";
  } else if (!passwordValidate(txtPassword.value)) {
    errMsgPassword.classList.add("showMsg");
    errMsgPassword.innerHTML = "Password is not valid";
  } else {
    errMsgPassword.classList.remove("showMsg");
  }
});

txtConfirmPassword.addEventListener("blur", () => {
  if (txtConfirmPassword.value.length < 1) {
    errMsgCpassword.classList.add("showMsg");
    errMsgCpassword.innerHTML = "Confirm Password is required";
  } else if (txtConfirmPassword.value !== txtPassword.value) {
    errMsgCpassword.classList.add("showMsg");
    errMsgCpassword.innerHTML = "Password does not match";
  } else {
    errMsgCpassword.classList.remove("showMsg");
  }
});

username.addEventListener("blur", () => {
  if (username.value.length < 1) {
    errMsgUname.classList.add("showMsg");
    errMsgUname.innerHTML = "Username is required";
  } else if (whiteSpaceValidate(username.value)) {
    errMsgUname.classList.add("showMsg");
    errMsgUname.innerHTML = "Username is required";
  } else {
    errMsgUname.classList.remove("showMsg");
  }
});

role.addEventListener("blur", () => {
  if (role.value.length < 1) {
    errMsgRole.classList.add("showMsg");
    errMsgRole.innerHTML = "Role is required";
  } else {
    errMsgRole.classList.remove("showMsg");
  }
});

mobile.addEventListener("blur", () => {
  if (mobile.value.length < 1) {
    errMsgMob.classList.add("showMsg");
    errMsgMob.innerHTML = "Mobile Number is required";
  } else if (!mobileValidate(mobile.value)) {
    errMsgMob.classList.add("showMsg");
    errMsgMob.innerHTML = "Mobile Number is not valid";
  } else {
    errMsgMob.classList.remove("showMsg");
  }
});


dateOfBirth.addEventListener("blur", () => {
  if (dateOfBirth.value.length < 1) {
    errMsgDob.classList.add("showMsg");
    errMsgDob.innerHTML = "Date of Birth is required";
  } 
  else {
    errMsgDob.classList.remove("showMsg");
  }
});

signUpForm.addEventListener("submit", (e) => {
  if (
    errMsgEmail.classList.contains("showMsg") ||
    errMsgPassword.classList.contains("showMsg") ||
    errMsgCpassword.classList.contains("showMsg") ||
    errMsgRole.classList.contains("showMsg") ||
    errMsgUname.classList.contains("showMsg") ||
    errMsgMob.classList.contains("showMsg") ||
    errMsgDob.classList.contains("showMsg")
  ) {
    e.preventDefault();
  }
});

// document.addEventListener("load", () => {
//   if (count == 3) {
//     nextBtn1.disabled = false;
//   } else {
//     errMsgEmail.classList.add("showMsg");
//     errMsgEmail.innerHTML = "Email is required";
//     errMsgPassword.classList.add("showMsg");
//     errMsgPassword.innerHTML = "Password is required";
//     errMsgCpassword.classList.add("showMsg");
//     errMsgCpassword.innerHTML = "Confirm Password is required";
//   }
// });
const passwordValidate = (password) => {
  let regex =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
  return regex.test(password);
};

const emailValidate = (email) => {
  const re = /^([a-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,6})$/;
  return re.test(email);
};

const whiteSpaceValidate = (str) => {
  return str.trim() === "";
};

const mobileValidate = (mobile) => {
  const re = /^[6-9]\d{9}$/;
  return re.test(mobile);
};


$("#email").blur(function() {

  let email	=	$("#email").val();

  // if email field is null then return
  if(email == "") {
    return;
  }


  // send ajax request if email is not empty
  $.ajax({
      url: './checkEmail.php',
      type: 'post',
      data: {
        'email':email,
        'email_check':1,
    },

    success:function(response) {	

      // clear span before error message
      $("#email_error").remove();

      // adding span after email textbox with error message
      // $("#email").after("<span id='email_error' class='text-danger'>"+response+"</span>");
      if(response != "ok"){
        errMsgEmail.classList.add("showMsg");
        errMsgEmail.innerHTML = response;
      }
      else{
        errMsgEmail.classList.remove("showMsg");
      }
    },

    error:function(e) {
      $("#result").html("Something went wrong");
    }

  });
});



// const dateValidate = (date) => {
//   const re = /^([0-9]{2})-([0-9]{2})-([0-9]{4})$/;
//   return re.test(date);
// };

// const validate = () => {
//   if (
//     errMsgEmail.classList.contains("showMsg") ||
//     errMsgPassword.classList.contains("showMsg") ||
//     errMsgCpassword.classList.contains("showMsg") ||
//     errMsgRole.classList.contains("showMsg") ||
//     errMsgUname.classList.contains("showMsg") ||
//     errMsgMob.classList.contains("showMsg")
//   ) {
//     return false;
//   } else {
//     return true;
//   }
// };

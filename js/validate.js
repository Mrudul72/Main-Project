const errMsgEmail = document.querySelector("#errMsgEmail");
const errMsgPassword = document.querySelector("#errMsgPassword");
const errMsgCpassword = document.querySelector("#errMsgCpassword");

const nextBtn1 = document.querySelector("#next1");
const txtEmail = document.querySelector("#email");
const txtPassword = document.querySelector("#password");
const txtConfirmPassword = document.querySelector("#cpassword");


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

document.addEventListener("load", () => {
  if (count == 3) {
    nextBtn1.disabled = false;
  } else {
    errMsgEmail.classList.add("showMsg");
    errMsgEmail.innerHTML = "Email is required";
    errMsgPassword.classList.add("showMsg");
    errMsgPassword.innerHTML = "Password is required";
    errMsgCpassword.classList.add("showMsg");
    errMsgCpassword.innerHTML = "Confirm Password is required";
  }
});
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

<?php
session_start();
include('./config/connect.php');
if (isset($_SESSION["pmsSession"]) == session_id()) {
    header("Location: ./dashboard.php");
    die();
} else {
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./stylesheets/css/style.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="icon" href="./assets/images/logo2.png" type="image/icon type" />
</head>

<body>
    <!-- Alert for Register -->
    <?php
  if (isset($_SESSION['loginMessage'])) {
    echo "<div class='d-flex justify-content-end' style='width:66vw;'><div style='z-index:2;' class='alert bg-danger text-light alert-dismissible position-fixed mt-3 fade show col-3' role='alert'>
                                <center><strong>" . $_SESSION['loginMessage'] . "</strong></center>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div></div>";
    unset($_SESSION['loginMessage']);
  }

  ?>
    <div class="main">
        <div class="logo">
            <img src="./assets/images/logo.svg" alt="Ease-iT-logo" />
        </div>
        <div class="lg-container">
            <div class="left-lg-container">
                <h1 class="lft-heading">Ease your workflow with Ease iT</h1>
                <p class="lft-text">
                    Collaborate, manage projects, and reach new productivity peaks. From
                    high rises to the home office, the way your team works is unique <br> —
                    accomplish it all with <b>Ease iT</b>
                </p>
            </div>

            <div class="right-lg-container">
                <div class="form-container">
                    <form id="loginForm" action="./auth/authentication.php" method="post">
                        <h1 class="lg-frm-heading">Welcome back</h1>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="john@example.com" required autocomplete="off" />
                                <small id="errMsgEmail" class="errMsg"></small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="**********" />
                                <small id="errMsgPassword" class="errMsg"></small>
                        </div>
                        <div class="form-group">
                            <a class="forgot-pass" href="">Forgot Password ?</a>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-primary" name="LoginSubmit">Sign in</button>
                        </div>
                        <div class="form-group">
                            <p class="sign-up-link">Don't have an account ? <a href="./auth/signup.php">Sign up</a></p>
                        </div>
                        <!-- <div class="form-group">
                            <p class="or">or</p>
                        </div>
                        <div class="form-group">
                            <div class="btn-secondary">
                                <img src="./assets/images/google-logo.svg" alt="Google-logo" />
                                <span>Sign in with Google</span>
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script>
        const errMsgEmail = document.querySelector("#errMsgEmail");
const errMsgPassword = document.querySelector("#errMsgPassword");

const txtEmail = document.querySelector("#email");
const txtPassword = document.querySelector("#password");
const loginForm = document.querySelector("#loginForm");


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

loginForm.addEventListener("submit", (e) => {
  if (
    errMsgEmail.classList.contains("showMsg") ||
    errMsgPassword.classList.contains("showMsg")
  ) {
    e.preventDefault();
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

    </script>
</body>

</html>
<?php
}
?>
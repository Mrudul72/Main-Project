<?php
session_start();
include('./config/connect.php');
if (isset($_SESSION["pmsSession"]) == session_id()) {
  header("Location: ./dashboard.php");
  die();
} else if (isset($_SESSION["pmsSessionAdmin"]) == session_id()) {
  header("Location: ./adminDashboard.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="icon" href="./assets/images/logo2.png" type="image/icon type" />
  </head>

  <body>
    <!-- Alert for Register -->
    <?php
    if (isset($_SESSION['emailSendStatus'])) {
      echo "<div class='d-flex justify-content-end' style='width:66vw;'><div style='z-index:2;' class='alert bg-danger text-light alert-dismissible position-fixed mt-3 fade show col-3' role='alert'>
                                <center><strong>" . $_SESSION['emailSendStatus'] . "</strong></center>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div></div>";
      unset($_SESSION['emailSendStatus']);
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

            <form action="./server/resetPass.php" method="post" id="reserPass">
              <h1 class="lg-frm-heading">Let's reset your password</h1>
              <div class="form-group">
                <label for="otp">OTP</label>
                <input type="text" name="otp" id="otp" class="form-control" placeholder="**********" />
                <small id="errMsgOtp" class="errMsg"></small>
              </div>
              <div class="form-group">
                <label for="password">Password <sup>*</sup></label>
                <input type="password" name="password" id="password" class="form-control" placeholder="**********" />
                <small id="errMsgPassword" class="errMsg"></small>
              </div>
              <div class="form-group">
                <label for="password">Confirm Password <sup>*</sup></label>
                <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="**********" />
                <small id="errMsgCpassword" class="errMsg"></small>
              </div>

              <div class="form-group">
                <button type="submit" class="btn-primary" id="resetPassword" name="resetPassword">Reset Password</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script>
      const errMsgOtp = document.querySelector("#errMsgOtp");
      const errMsgPassword = document.querySelector("#errMsgPassword");
      const errMsgCpassword = document.querySelector("#errMsgCpassword");

      const txtOtp = document.querySelector("#otp");
      const reserPass = document.querySelector("#reserPass");
      const txtPassword = document.querySelector("#password");
      const txtConfirmPassword = document.querySelector("#cpassword");


      txtOtp.addEventListener("blur", () => {
        if (txtOtp.value.length < 1) {
          errMsgOtp.classList.add("showMsg");
          errMsgOtp.innerHTML = "OTP is required";
        } else {
          errMsgOtp.classList.remove("showMsg");
          let otp = $("#otp").val();

          // if email field is null then return
          if (otp == "") {
            return;
          }

          // send ajax request if email is not empty
          $.ajax({
            url: './server/validateOtp.php',
            type: 'post',
            data: {
              'otp': otp,
            },

            success: function(response) {

              // clear span before error message
              errMsgOtp.innerHTML = "";

              // adding span after email textbox with error message
              // $("#email").after("<span id='email_error' class='text-danger'>"+response+"</span>");
              if (response != "ok") {
                errMsgOtp.classList.add("showMsg");
                errMsgOtp.innerHTML = response;
              } else {
                errMsgOtp.classList.remove("showMsg");
              }

            },

            error: function(e) {
              console.log(e);
            }

          });
        }
      });
      txtPassword.addEventListener("blur", () => {
        if (txtPassword.value.length < 1) {
          errMsgPassword.classList.add("showMsg");
          errMsgPassword.innerHTML = "Password is required";
        } else if (!passwordValidate(txtPassword.value)) {
          errMsgPassword.classList.add("showMsg");
          errMsgPassword.innerHTML = "Invalid Password. Should be minimum 8 characters and include 1 uppercase letter and special character";
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

      reserPass.addEventListener("submit", (e) => {
        if (
          errMsgCpassword.classList.contains("showMsg") ||
          errMsgOtp.classList.contains("showMsg") || errMsgPassword.classList.contains("showMsg")
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
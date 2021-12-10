<?php
session_start();
include('../config/connect.php');
if (isset($_SESSION["pmsSession"]) == session_id()) {
    header("Location: ../dashboard.php");
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
    <link rel="stylesheet" href="../stylesheets/css/style.css" />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
      integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
      crossorigin="anonymous"
    />
  </head>
  <body>
  <?php
  if (isset($_SESSION['loginMessage'])) {
    echo "<div class='d-flex justify-content-center' style='width:100vw;'><div style='z-index:2;' class='alert bg-danger text-light alert-dismissible position-fixed mt-3 fade show col-4' role='alert'>
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
        <img src="../assets/images/logo.svg" alt="Ease-iT-logo" />
      </div>
      <div class="lg-container">
        <div class="left-lg-container">
          <h1 class="lft-heading">Ease your workflow with Ease iT</h1>
          <p class="lft-text">
            Collaborate, manage projects, and reach new productivity peaks. From
            high rises to the home office, the way your team works is unique
            <br />
            — accomplish it all with <b>Ease iT</b>
          </p>
        </div>

        <div class="right-lg-container">
          <div class="form-container">
            <form id="msform" action="../auth/authentication.php" method="post">
              <h1 class="lg-frm-heading">Get started</h1>
              <!-- progressbar -->
              <div class="progress-container">
                <div class="line"></div>
                <div class="line2"></div>
                <ul class="progressbar">
                  <li class="active-bubble selected">1</li>
                  <li>2</li>
                  <li>3</li>
                </ul>
              </div>

              <fieldset class="fieldset active-frm">
                <div class="form-group">
                  <label for="email">Email <sup>*</sup></label>
                  <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control"
                    placeholder="john@example.com"
                    autocomplete="off"
                  />
                  <small id="errMsgEmail" class="errMsg"></small>
                </div>
                <div class="form-group">
                  <label for="password">Password <sup>*</sup></label>
                  <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                    placeholder="**********"
                  />
                  <small id="errMsgPassword" class="errMsg"></small>
                </div>
                <div class="form-group">
                  <label for="password">Confirm Password <sup>*</sup></label>
                  <input
                    type="password"
                    name="cpassword"
                    id="cpassword"
                    class="form-control"
                    placeholder="**********"
                  />
                  <small id="errMsgCpassword" class="errMsg"></small>
                </div>

                <div class="form-group">
                  <button id="next1" class="next btn-primary mt-4">Next</button>
                </div>

                <div class="form-group">
                  <p class="sign-up-link">
                    Already have an account ? <a href="../index.php">Login</a>
                  </p>
                </div>

                <!-- <div class="form-group">
                  <p class="or mt-n2">or</p>
                </div>
                <div class="form-group">
                  <div class="btn-secondary">
                    <img
                      src="../assets/images/google-logo.svg"
                      alt="Google-logo"
                    />
                    <span>Sign in with Google</span>
                  </div>
                </div> -->
              </fieldset>

              <fieldset class="fieldset">
                <img
                  class="back-btn"
                  src="../assets/icons/back.svg"
                  alt="back-btn"
                />
                <div class="form-group">
                  <label for="role">Select your role <sup>*</sup></label>
                  <select name="role" id="role" class="form-control">
                  <option value="" disabled selected>Select your role</option>
                  <?php
                                $sql = "SELECT * FROM tbl_user_role WHERE role_id != 1";
                                $result = mysqli_query($connect, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $role_id = $row['role_id'];
                                    $role_name = $row['role_name'];
                                    echo '<option value="' . $role_id . '">' . $role_name . '</option>';
                                }
                                ?>
                   
                  </select>
                  <small id="errMsgRole" class="errMsg"></small>
                </div>
                <div class="form-group">
                  <label for="referral">Referral code(if any)</label>
                  <input
                    type="text"
                    name="referral"
                    id="referral"
                    class="form-control"
                    placeholder="RXL23"
                  />
                </div>

                <div class="form-group">
                  <button id="next2" class="next btn-primary mt-4">Next</button>
                </div>
              </fieldset>

              <fieldset class="fieldset">
                <img
                  class="back-btn"
                  src="../assets/icons/back.svg"
                  alt="back-btn"
                />
                <div class="form-group">
                  <label for="uname">Name <sup>*</sup></label>
                  <input
                    type="text"
                    name="uname"
                    id="uname"
                    class="form-control"
                    placeholder="John Wick"
                    
                    autocomplete="off"
                  />
                  <small id="errMsgUname" class="errMsg"></small>
                </div>
                <div class="form-group">
                  <label for="mob">Mobile <sup>*</sup></label>
                  <input
                    type="number"
                    name="mob"
                    id="mob"
                    class="form-control"
                    placeholder="8590456210"
                    autocomplete="off"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10"
                  />
                  <small id="errMsgMob" class="errMsg"></small>
                </div>
                <div class="form-group">
                  <label for="name">Date of birth <sup>*</sup></label>
                  <input
                    type="date"
                    name="dob"
                    id="dob"
                    class="form-control"
                    required
                    autocomplete="off"
                  />
                  <small id="errMsgDob" class="errMsg"></small>
                </div>

                <div class="form-group">
                  <button type="submit" name="registerSubmit" class="btn-primary mt-4">Submit</button>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
      crossorigin="anonymous"
    ></script>

    <script src="../js/signupAnim.js"></script>
    <script src="../js/validate.js"></script>

    <script>
      
    </script>
  </body>
</html>
<?php
}
?>
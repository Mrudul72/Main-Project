<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./stylesheets/css/style.css" />
    <link
      rel="icon"
      href="./assets/images/logo2.png"
      type="image/icon type"
    />
  </head>
  <body>
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
            <form action="auth.php" method="post">
              <h1 class="lg-frm-heading">Welcome back</h1>
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="email"
                  name="email"
                  id="email"
                  class="form-control"
                  placeholder="john@example.com"
                  required
                  autocomplete="off"
                />
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input
                  type="password"
                  name="password"
                  id="password"
                  class="form-control"
                  placeholder="**********"
                />
              </div>
              <div class="form-group">
                <a class="forgot-pass" href="">Forgot Password ?</a>
              </div>
              <div class="form-group">
                <button type="submit" class="btn-primary">Sign in</button>
              </div>
              <div class="form-group">
                <p class="sign-up-link">Don't have an account ? <a href="./signup.php">Sign up</a></p>
              </div>
              <div class="form-group">
                <p class="or">or</p>
              </div>
              <div class="form-group">
                <div class="btn-secondary">
                  <img src="./assets/images/google-logo.svg" alt="Google-logo" />
                    <span>Sign in with Google</span> 
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="" async defer></script>
  </body>
</html>

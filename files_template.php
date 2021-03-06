<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./stylesheets/css/style.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./stylesheets/css/bootstrap.min.css" />
    <link rel="icon" href="./assets/images/logo2.png" type="image/icon type" />
  </head>

  <body class="dashboard-body">
    <div class="dashboard-container">
        <!--sidebar goes here-->
        <?php include_once("./layouts/sidebar.php"); ?>
        <!--sidebar end-->

        <!--header starts-->
        <?php include_once("./layouts/header.php"); ?>
        <!--header ends-->

        <!--Dashboard contents-->
        <div class="dashboard-contents">
            <div class="row">
                <!--tab start-->
                <?php include_once("./layouts/tab.php"); ?>
                <!--tab end-->
                
            </div>
            <div class="row">
          <!--col 2 start-->
          <div class="col-12">
            <div class="d-flex flex-column">
              <div class="files-card">
                <h1 class="content-heading">Files</h1>
                <!---table start-->
                <table class="table files-table">
                  <thead>
                    <tr class="t-head">
                      <th>Name</th>
                      <th>Size</th>
                      <th>Uploaded By</th>
                      <th>Tag</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Redesign Brief 2019.pdf</td>
                      <td>159 KB</td>
                      <td>Mattie Blooman</td>
                      <td><div class="tag">Marketing</div> </td>
                      <td>08 Jan 2019</td>
                      <td>
                        <button
                          class="dropdown-toggle action-btn"
                          id="dropdownMenuOffset"
                          data-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                          data-offset="5,10"
                        >
                          Action
                        </button>
                        <div
                          class="dropdown-menu"
                          aria-labelledby="dropdownMenuOffset"
                        >
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#" >Something 1</a>
                        </div>
                        <img class="dwnld-ico" src="./assets/icons/download-ico.svg" alt="download-ico">
                      </td>
                    </tr>
                    <tr>
                        <td>Redesign Brief 2019.pdf</td>
                        <td>159 KB</td>
                        <td>Mattie Blooman</td>
                        <td><div class="tag">Marketing</div> </td>
                        <td>08 Jan 2019</td>
                        <td>
                          <button
                            class="dropdown-toggle action-btn"
                            id="dropdownMenuOffset"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            data-offset="5,10"
                          >
                            Action
                          </button>
                          <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownMenuOffset"
                          >
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#" >Something 2</a>
                          </div>
                          <img class="dwnld-ico" src="./assets/icons/download-ico.svg" alt="download-ico">
                        </td>
                      </tr>
                      <tr>
                        <td>Redesign Brief 2019.pdf</td>
                        <td>159 KB</td>
                        <td>Mattie Blooman</td>
                        <td><div class="tag">Marketing</div> </td>
                        <td>08 Jan 2019</td>
                        <td>
                          <button
                            class="dropdown-toggle action-btn"
                            id="dropdownMenuOffset"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            data-offset="5,10"
                          >
                            Action
                          </button>
                          <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownMenuOffset"
                          >
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#" >Something else here</a>
                          </div>
                          <img class="dwnld-ico" src="./assets/icons/download-ico.svg" alt="download-ico">
                        </td>
                      </tr>
                      <tr>
                        <td>Redesign Brief 2019.pdf</td>
                        <td>159 KB</td>
                        <td>Mattie Blooman</td>
                        <td><div class="tag">Marketing</div> </td>
                        <td>08 Jan 2019</td>
                        <td>
                          <button
                            class="dropdown-toggle action-btn"
                            id="dropdownMenuOffset"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            data-offset="5,10"
                          >
                            Action
                          </button>
                          <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownMenuOffset"
                          >
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#" >Something else here</a>
                          </div>
                          <img class="dwnld-ico" src="./assets/icons/download-ico.svg" alt="download-ico">
                        </td>
                      </tr>
                      <tr>
                        <td>Redesign Brief 2019.pdf</td>
                        <td>159 KB</td>
                        <td>Mattie Blooman</td>
                        <td><div class="tag">Marketing</div> </td>
                        <td>08 Jan 2019</td>
                        <td>
                          <button
                            class="dropdown-toggle action-btn"
                            id="dropdownMenuOffset"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            data-offset="5,10"
                          >
                            Action
                          </button>
                          <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownMenuOffset"
                          >
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#" >Something else here</a>
                          </div>
                          <img class="dwnld-ico" src="./assets/icons/download-ico.svg" alt="download-ico">
                        </td>
                      </tr>
                      <tr>
                        <td>Redesign Brief 2019.pdf</td>
                        <td>159 KB</td>
                        <td>Mattie Blooman</td>
                        <td><div class="tag">Marketing</div> </td>
                        <td>08 Jan 2019</td>
                        <td>
                          <button
                            class="dropdown-toggle action-btn"
                            id="dropdownMenuOffset"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            data-offset="5,10"
                          >
                            Action
                          </button>
                          <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownMenuOffset"
                          >
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#" >Something else here</a>
                          </div>
                          <img class="dwnld-ico" src="./assets/icons/download-ico.svg" alt="download-ico">
                        </td>
                      </tr>
                      
                  </tbody>
                </table>

                <!---table end-->
                <h3 class="view-more-btn">View More >></h3>
              </div>
            </div>
          </div>
          <!--col 2 end-->
        </div>
      </div>
    </div>

    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
      crossorigin="anonymous"
    ></script>
    <script src="./js/app.js"></script>
  </body>
</html>

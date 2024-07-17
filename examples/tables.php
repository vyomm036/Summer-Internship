<!DOCTYPE html>
<?php
include 'db.php';
$sql = "SELECT * FROM forms ";
$result = $conn->query($sql);
if ($result === false) {
  echo "error";
}
?>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Paper Dashboard 2 by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: rgb(238, 246, 253);
      text-align: center;
    }

    .form-group .form-control+.input-group-prepend .input-group-text,
    .form-group .form-control+.input-group-append .input-group-text,
    .input-group .form-control+.input-group-prepend .input-group-text,
    .input-group .form-control+.input-group-append .input-group-text {
      padding: 10px 10px 10px 0;
    }

    h1 {
      text-align: left;
    }

    .btn {
      background-color: #51cbce;
      border-radius: 25px;
      color: white;
      padding: 10px 20px;
      text-align: center;
      display: inline-block;
      font-size: 14px;
      margin: 4px 2px;
    }

    .btn-round {
      background-color: #51cbce;
      color: white;
      margin-right: 10px;
    }

    .btn-round:hover {
      background-color: #259ab4;
    }

    .btn-warning {
      background-color: #ffc107;
      color: white;
    }

    .btn-warning:hover {
      background-color: #e0a800;
      color: white;
    }

    .nc-basket {
      background-color: #b2b0ad;
      border-radius: 25px;
      color: white;
      padding: 10px 13px;
      text-align: center;
      display: inline-block;
      border: 1px solid #4a4947;

      cursor: pointer;
    }

    .nc-basket:hover {
      background-color: #4a4947;
    }

    .bi-pencil {
      color: #b2b0ad;
    }

    .bi-pencil:hover {
      background-color: #848281;
      color: white;
      border-radius: 4px;
    }

    .datatable-table th button,
    .datatable-pagination-list button {
      color: inherit;
      border: 0;
      background-color: inherit;
      cursor: pointer;
      text-align: left;
      font-weight: inherit;
      font-size: inherit;
    }

    tbody {
      text-align: left;
    }

    div.wrapper {
      background-color: #f4f3ef;
    }

    #title {
      text-align: left;
    }
  </style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./dashboard.html">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="./new_form.html">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Create new form</p>
            </a>
          </li>
          <li>
            <a href="./preview.html">
              <i class="nc-icon nc-paper"></i>
              <p>Preview form</p>
            </a>
          </li>
          <li>
            <a href="./user.html">
              <i class="nc-icon nc-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="active ">
            <a href="./tables.php">
              <i class="nc-icon nc-tile-56"></i>
              <p>Table List</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Paper Dashboard 2</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="javascript:;">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="javascript:;">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Forms Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead id="title" class=" text-primary">
                      <th>
                        Form Number
                      </th>
                      <th>
                        Form Name
                      </th>
                      <th>
                        Description
                      </th>
                      <!-- <th>
                        Responses
                      </th> -->
                    </thead>
                    <tbody>
                      <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                          <td style='padding-left:39px;'> <?= $row['FormID'] ?></td>
                          <td style='padding-left:39px;'> <?= $row['Title'] ?></td>
                          <td style='padding-left:29px;'><?= $row['Description'] ?></td>
                          <!-- <td><a href="#" class="btn btn-primary btn-round">Edit</td> -->
                          <td>
                            <!-- Generate dynamic link based on row number -->
                          <a href="edit.php?formID=<?= $row['FormID'] ?>" class="btn btn-primary btn-round">Edit</a>
                          </td>
                          <td>
                            <div>
                              <i class="nc-icon nc-basket" onclick="deleteForm(<?= $row['FormID'] ?>)"></i>
                            </div>
                          </td>

                        </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-plain">
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer footer-black  footer-white ">
      <div class="container-fluid">
        <div class="row">
          <nav class="footer-nav">
            <ul>
              <li><a href="https://www.creative-tim.com" target="_blank">Creative Tim</a></li>
              <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
              <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
            </ul>
          </nav>
          <div class="credits ml-auto">
            <span class="copyright">
              <script>
                function deleteForm(formID) {
                  if (confirm('Are you sure you want to delete this form?')) {
                    fetch('delete.php', {
                        method: 'POST',
                        headers: {
                          'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                          formID: formID
                        })
                      })
                      .then(response => response.json())
                      .then(data => {
                        if (data.status === 'success') {
                          alert('Form deleted successfully');
                          location.reload(); // Reload the page to update the table
                        } else {
                          alert('Failed to delete form');
                        }
                      })
                      .catch(error => console.error('Error deleting form:', error));
                  }
                }
                function editForm(formID) {
                  // Generate the dynamic URL based on the formID
                  var editUrl = "edit.php?formID=" + formID;
                  // Redirect to the edit page
                  window.location.href = editUrl;
                }
              </script>
            </span>
          </div>
        </div>
      </div>
    </footer>
  </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPES Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/00dd2119dc.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body style=" background: linear-gradient(90deg in oklab, #2c0267,#550083 ,#9b5cb4);">

<section class="vh-100">
  <div class="container h-100">
  <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow text-center bg-light p-5">
        <div class="card-body">
        <h2 class="card-title fw-bold mb-4 text-purple">LOGIN</h2>
        <h6 class="card-subtitle mb-3 text-secondary pb-4">Please Enter Login Details.</h6>               
          <form method="post" action="loginProcess.php?op=in">
          <div class="col-auto">              
          <input type="text" class="form-control mb-3" id="userCode" name="userCode" placeholder="Enter Agent Code" >
          <input type="password" class="form-control " id="userPwd" name="userPwd" placeholder="Enter Password">
          <button type="submit" name="logSubmit" id="logSubmit" class="btn  btn-outline-light px-5 mt-3 mb-3">LOGIN</button>
          </div>
          </form>
        </div>
        </div>
      </div>
  </div>
  </div>
</section>

</body>
</html>





<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Bootstrap </title>
   <?php 
   require_once('includes/db.php');
   require_once('includes/csslinks.php'); ?>  
 <style type="text/css">
   
  #imgbg{
    background-image: url('student_img/go.jpg');
     background-size: cover;
    background-position:center;
    background-repeat: no-repeat;
    min-height: 100vh;
    border-radius: 0;
  }
  #main_text{
    position: absolute;
    top: 40%;
    left: 30%;
    color: white;
  }
   nav .nav-link:hover{
    border-radius: 5px;
    background-color: red;
    color: white;
    border-radius: 5px;
  }
  @media (max-width: 500px) {
    #main_text{
    position: absolute;
    top: 40%;
    left: 20px;
    color: white;
  }
  }
 </style>
</head>
<body>
  
    <!-- main container start -->
     <nav class="navbar navbar-expand-lg bg-dark sticky-top container-fluid" style="opacity: 0.5; position: fixed;">
          <a class="navbar-brand text-white " href="index.php" style="font-size: 30px!important">My School <small style="font-size: 15px!important">Learn And Implement</small></a>
          <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarToggler"  style="opacity:1">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                <a class="nav-link mx-2 text-white text-center" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2 text-white text-center" href="courses.php">Courses</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link mx-2 text-white text-center" href="#ok">Payment Status</a>
              </li>
              <?php if (isset($_SESSION['email'])) { ?>
              <li class="nav-item">
                <a class="nav-link mx-2 text-white text-center" href="../logout.php">Logout</a>
              </li>
              <?php } else { ?>
               <li class="nav-item">
                <a class="nav-link mx-2 text-white text-center" href="student_area/login.php">Login</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link mx-2 text-white text-center" href="student_area/signup.php">SignUp</a>
              </li>
            <?php } ?>
              <li class="nav-item active">
                <a class="nav-link mx-2 text-white text-center" href="#fb">Feedback</a>
              </li>
              <li class="nav-item active">
                  <a class="nav-link mx-2 text-white text-center" href="#contact">Contact</a>
              </li>
          </nav> 
  <div class="container-fluid p-0" id="home">
      <div id="imgbg">
       
        <div id="main_text" class="text-center">
            <h1>Welcome To My School</h1>
            <p>Learn And Implement</p>
            <p><a href="#courses" class="btn btn-danger">Get Started</a></p>
           
          </div>
        </div>
      </div>

    <div class="w-100 h-25 bg-danger text-white py-2 m-0 row text-center">
      <span class="col-3">100+ Online Courses</span>
      <span class="col-3">Expert Instructors</span>
      <span class="col-3">Lifetime Access</span>
      <span class="col-3">Money Back Guarantee</span>
    </div> 

    <div class="container" id="courses">
        <h1 class="text-center my-5">Populer Course</h1>
        <div class="container">
        <div class="row m-0 p-0">
          <?php $run = $conn->query("SELECT * FROM course ORDER BY c_id DESC LIMIT 0,6 ");
                while ($row = $run->fetch_assoc()) {
                echo "<div class='col-md-4 my-2'>
                     <div class='card h-100'>
                      <img src='course_img/".$row['c_img']."' class='card-img-top img-fluid'>
                      <div class='card-body'>
                      <h2>".$row['c_name']."</h2>
                       <p>".$row['c_desc']." </p>
                      <span>Price :<i class='fa fa-rupee' ></i><del class='mr-3'>".$row['c_oprice']."</del><i class='fa fa-rupee'></i>".$row['c_sprice']." </span><a href='checkout.php?c_id=".$row['c_id']."' class='btn btn-primary float-right'>Enroll</a>
                     </div>
                   </div>
                   </div>";
                }
           ?>
           </div>
          <!-- 
           <div class="card col-md-4 p-0 my-2">
            
               <img src="student_img/go.jpg" class="card-img-top img-fluid">
            
             <div class="card-body">
              <h2>Title</h2>
               <p>Bootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas </p>
              <span>Price : </span><a href="" class="btn btn-primary">Enroll</a>
             </div>
           </div> -->

            

           <div class="w-100 text-center my-5">
              <a href="courses.php" class="btn btn-danger" >View All Courses</a>
           </div>
        </div>
    </div>
    <hr>
    <div class="container" id="contact">
      <h2 class="text-center">Contact Us</h2>
      <div class="row">
        <div class="col-md-8">
          <div class="card border-0">
            <div class="card-body">
              <form>
                <div class="form-group">
                  <input type="text" name="" placeholder="Name.." class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" name="" placeholder="Subject.." class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" name="" placeholder="E-mail.." class="form-control">
                </div>
                <div class="form-group">
                  <textarea name="" placeholder="Name.." class="form-control"></textarea> 
                </div>
                <div class="form-group">
                  <input type="submit" name="" class="btn btn-sm btn-info" value="Send">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-10 font-weight-bold h-25">
          <address class="text-center mt-md-5">
            Ajmaking Group <br>
            chopda-425107 <br>
            Phone: +52482 <br>
            www.ajmaking.com
          </address>
        </div>
      </div>
    </div>

      
    <div class="container-fluid bg-info h-50 p-0" id="fb">
      <h1></h1>
      <marquee class="my-5 mx-0 ">
        <div class="media col-4 h-25 d-inline-block border-dark">
          <img src="student_img/go.jpg" width="200" class="mr-3 img-fluid img-thumbnail" alt="...">
          <div class="media-body text-wrap text-white">
            <h5 class="mt-0 text-dark">Media heading</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div>

         <div class="media col-4 h-25 d-inline-block border-dark">
          <img src="student_img/go.jpg" width="200" class="mr-3 img-fluid img-thumbnail" alt="...">
          <div class="media-body text-wrap text-white">
            <h5 class="mt-0 text-dark">Media heading</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div>

         <div class="media col-4 h-25 d-inline-block border-dark">
          <img src="student_img/go.jpg" width="200" class="mr-3 img-fluid img-thumbnail" alt="...">
          <div class="media-body text-wrap text-white">
            <h5 class="mt-0 text-dark">Media heading</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div>

         <div class="media col-4 h-25 d-inline-block border-dark">
          <img src="student_img/go.jpg" width="200" class="mr-3 img-fluid img-thumbnail" alt="...">
          <div class="media-body text-wrap text-white">
            <h5 class="mt-0 text-dark">Media heading</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div>
        
      </marquee>
    </div>


    <div class="w-100 h-25 bg-danger text-white py-2 m-0 row text-center">
      <style type="text/css">
        span a{
          text-decoration: none;
        }
       
      </style>
      <span class="col-3"><a href="#" class="d-block text-white">Facebook</a></span>
      <span class="col-3"><a href="#" class="d-block text-white">Twitter</a></span>
      <span class="col-3"><a href="#" class="d-block text-white">WhatsApp</a></span>
      <span class="col-3"><a href="#" class="d-block text-white">Instagram</a></span>
    </div> 

  </div>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-4">
          <h2>About Us</h2>         
          <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue</p>
      </div>
      
      <div class="col-md-4 text-md-center">
        <hr class="d-md-none">
        <h2>Category</h2>
        <p><a href="#">Web Development</a></p>
         <p><a href="#">Web Development</a></p>
          <p><a href="#">Web Development</a></p>
           <p><a href="#">Web Development</a></p>
      </div>
      
      <div class="col-md-4">
        <hr class="d-md-none">
        <h2>Contact Us</h2>
        <address>
          Ajmaking Pvt Ltd,<br>
          Adgoan, tal- chopda<br>
          dist- jalgoan
        </address>
      </div>
    </div>
  </div>
  <div class="container-fluid bg-dark m-0">
    <p class="text-center text-white m-0">Copyright &copy; 2020 || Ajmaking & GeekyShows || <a href="login.php">Admin</a></p>
  </div>
   <!-- main container End -->
    <?php require_once('includes/jslinks.php'); ?>  
</body>
</html>

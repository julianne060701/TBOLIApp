<!-- <?php 
      session_start();
      $user_id = $_SESSION['user_id'];

      if (isset($_GET['logout'])) {
      session_unset();
      session_destroy();
      header("Location: homepage.php?Logout");
      exit();
      }
?> -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Quiz</title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
	    <!----css3---->
        <link rel="stylesheet" href="css/custom.css">
		
		
		<!--google fonts -->
	
	    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	
	
	<!--google material icon-->
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">

  </head>
  <body>
  

<div class="wrapper">


        <div class="body-overlay"></div>
		
		<!-------------------------sidebar------------>
		     <!-- Sidebar  -->
             <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img src="img/logoT.png" class="img-fluid"/><br>T'Boli</br></h3>
            </div>
            <ul class="list-unstyled components">
			<li  class="active">
                    <a href="admin_dashboard.php" class="dashboard"><i class="material-icons">dashboard</i>
					<span>Dashboard</span></a>
                </li>

                <li class="">
                    <a href="admin_add.php"><i class="fas fa-user"></i><span>Admin</span></a>
                </li>
		
                <li class="">
                    <a href="admin_student.php"><i class="fas fa-user"></i><span>Student</span></a>
                </li>

                <li class="">
                    <a href="admin_teacher.php"><i class="fas fa-user"></i><span>Teachers</span></a>
                </li>

                <li class="">
                    <a href="admin_upload.php"><i class="fas fa-user"></i><span>Upload Lesson/Content</span></a>
                </li>

                <li class="">
                    <a href="admin_Quiz.php"><i class="fas fa-user"></i><span>Quiz</span></a>
                </li>

                <li class="">
                    <a href="admin_modulerequest.php"><i class="fas fa-user"></i><span>Module request</span></a>
                </li>
                
              
                <li class="dropdown">
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">school</i> Reports
                    </a>
                    
                    <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                        <li>
                            <a href="admin_ABM.php">List of Student</a>
                        </li>
                        <li>
                            <a href="admin_STEM.php">List of Teachers</a>
                        </li>
                        <li>
                            <a href="admin_HUMMS.php">List of Area</a>
                        </li>
                        <li>
                            <a href="admin_EIM.php">List of Lesson</a>
                        </li>
                        <li>
                            <a href="admin_FBS.php">List of Class w/Teacher</a>
                        </li>
                    </ul>
                </li>
                    </ul>
                </li>           
            </ul>          
        </nav>
		
		
		
		
		
		<!--------page-content---------------->
		
		<div id="content">
		   
		   <!--top--navbar----design--------->
		   
		   <div class="top-navbar">
		      <div class="xp-topbar">

                <!-- Start XP Row -->
                <div class="row"> 
                    <!-- Start XP Col -->
                    <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
                        <div class="xp-menubar">
                               <span class="material-icons text-white">signal_cellular_alt
							   </span>
                         </div>
                    </div> 
                    <!-- End XP Col -->

                    <!-- Start XP Col -->
                    <div class="col-md-5 col-lg-3 order-3 order-md-2">
                        <div class="xp-searchbar">
                           
                        </div>
                    </div>
                    <!-- End XP Col -->

                    <!-- Start XP Col -->
                    <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
                        <div class="xp-profilebar text-right">
                    <nav class="navbar p-0">
                              <ul class="nav navbar-nav flex-row ml-auto">   
                                
                                  </li>
                                  <li class="nav-item">
                          
                                  </li>
                                  <li class="nav-item dropdown">
                                      <a class="nav-link" href="#" data-toggle="dropdown">
                      <img src="img/admin.png" style="width:40px; border-radius:50%;"/>
                      <span class="xp-user-live"></span>
                      </a>
                      <ul class="dropdown-menu small-menu">
                          <li>
                            <a href="profile.php?user_id=<?php echo $_SESSION['user_id']?>">
                            <span class="material-icons">person_outline</span>Profile</a>
                          </li>
                          <li>
                              <a href="homepage.php?logout=true"><span class="material-icons">logout</span>Logout</a>
                          </li>
                      </ul>
                          </li>
                      </ul>   
                    </nav>
							
                        </div>
                    </div>
                    <!-- End XP Col -->

                </div> 
                <!-- End XP Row -->

            </div>
		   
			
		   </div>
		   
		   
		   
		   <!--------main-content------------->
		  <!--------main-content------------->
		   
          <div class="main-content">
			  <div class="row">
			    
				<div class="col-md-12">
				<div class="table-wrapper">
    <div class="table-title">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
      <div class="row">
        <div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">
          <h2 class="ml-lg-2">Manage Quiz</h2>
        </div>
        <div class="col-sm-6 p-0 d-flex justify-content-lg-end justify-content-center">
          <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
		  <i class="material-icons">&#xE147;</i> <span>Add New Quiz</span></a>

        </div>
      </div>
    </div>
    <?php
      include 'dbcon.php';
      $limit = 10; 
      $page = isset($_GET['page']) ? $_GET['page'] : 1;

      $sqlCount = "SELECT COUNT(*) AS total FROM tbl_userinfo
             JOIN tbl_user_level ON tbl_user_level.user_level_id = tbl_userinfo.user_id
             WHERE tbl_user_level.level = 'STUDENT'";
      $resultCount = mysqli_query($conn, $sqlCount);
      $rowCount = mysqli_fetch_assoc($resultCount)['total'];
      $totalPages = ceil($rowCount / $limit);
      $offset = ($page - 1) * $limit;

      $sql = "SELECT tbl_userinfo.user_id, tbl_userinfo.firstname, tbl_userinfo.middlename, tbl_userinfo.lastname, tbl_userinfo.suffix, tbl_enrollment.userinfo_id, tbl_enrollment.admit_type, tbl_enrollment.grade, tbl_enrollment.program, tbl_enrollment.term, tbl_enrollment.lrn, tbl_enrollment.lsa, tbl_user_status.status, tbl_user_level.level
              FROM tbl_userinfo
              JOIN tbl_enrollment ON tbl_userinfo.user_id = tbl_enrollment.userinfo_id
              JOIN tbl_user_status ON tbl_userinfo.user_id = tbl_user_status.userinfo_id
              JOIN tbl_user_level ON tbl_userinfo.user_id = tbl_user_level.userinfo_id
              WHERE tbl_user_level.level = 'STUDENT'
              LIMIT $limit OFFSET $offset";

      $result = mysqli_query($conn, $sql);
      ?>

      <table class="table table-striped table-hover" id="student_table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Category</th>
            <th>Module</th>
            <th>Points</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Survival Quiz</td>
                <td>A</td>
                <td>Letters</td>
                <td>Module 01</td>
                <td>10</td>
                <td>Give</td>
                <td>
                    <a href="#" class="view"><i class="fa fa-eye"></i></a>
                    <a href="#" class="edit"><i class="fa fa-pencil"></i></a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Basic Quiz</td>
                <td>Finish</td>
                <td>Numbers</td>
                <td>Module 01</td>
                <td>15</td>
                <td>Give</td>
                <td>
                    <a href="#" class="view"><i class="fa fa-eye"></i></a>
                    <a href="#" class="edit"><i class="fa fa-pencil"></i></a>
                </td>
            </tr>
            </tr>
            <tr>
                <td>3</td>
                <td>Advance Quiz</td>
                <td>N/A</td>
                <td>Letters</td>
                <td>Module 02</td>
                <td>10</td>
                <td>Not yet give</td>
                <td>
                    <a href="#" class="view"><i class="fa fa-eye"></i></a>
                    <a href="#" class="edit"><i class="fa fa-pencil"></i></a>
                </td>
            </tr>
        </tbody>
      </table>
        
</div>
</div>

<!----------html code compleate----------->








  
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="js/jquery-3.3.1.slim.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery-3.3.1.min.js"></script>
  
  
  <script type="text/javascript">
        
		$(document).ready(function(){
		  $(".xp-menubar").on('click',function(){
		    $('#sidebar').toggleClass('active');
			$('#content').toggleClass('active');
		  });
		  
		   $(".xp-menubar,.body-overlay").on('click',function(){
		     $('#sidebar,.body-overlay').toggleClass('show-nav');
		   });
		  
		});
		
</script>
  
  



  </body>
  
  </html>



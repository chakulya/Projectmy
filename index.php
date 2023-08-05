
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql ="SELECT * FROM tbladmin WHERE UserName=:username and Password=:password";
    $query=$dbh->prepare($sql);
    $query-> bindParam(':username', $username, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
        foreach ($results as $result) 
        {
            $_SESSION['odmsaid']=$result->ID;
            $_SESSION['login']=$result->username;
            $_SESSION['permission']=$result->AdminName;
            $get=$result->Status;
        }
        $aa= $_SESSION['odmsaid'];
        $sql="SELECT * from tbladmin  where ID=:aa";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':aa',$aa,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
            foreach($results as $row)
            {            
                if($row->Status=="1")
                { 
                    echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";                  

                } else
                { 
                    echo "<script>
                    alert('Your account was disabled Approach Admin');document.location ='index.php';
                    </script>";
                }
            } 
        } 
    } else{
        echo "<script>alert('Invalid Details');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            body{
                 background-image: url(event.jpg);
                 background-repeat: no-repeat;
                 background-size: cover;
                }
        </style>
    </head>
<?php @include("includes/head.php");?>
<body>


    <div class="container-scroller">
    <h1 style="margin-top: 30px; color:white; text-align: center">Event Administration System</h1><br><br>
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <!-- <div class="content-wrapper d-flex align-items-center auth p-0"> -->
                <div class="row flex-grow">
                    <div class="col-md-4 p-0">
                        <div class="auth-form-light text-left p-5">
                         <h4 style="text-align:center ; color:white">Welcome ....! </h4>
                            <form role="form" id=""  method="post" enctype="multipart/form-data" class="">  
                                <div class="form-group first">
                                    <input type="text" class="form-control form-control-lg" name="username" id="exampleInputEmail1" placeholder="Username" required>
                                </div>
                                <div class="form-group last">
                                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                                </div>
                                <div class="mt-3">
                                    <button name="login" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">Login</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> 
                                    <a href="forgot_password.php" class="text-secondary"> 
                                        Forgot Password
                                    </a><br>
                                 <span style="color:aliceblue"> For New User click here ...</span> <a href="#" data-toggle="modal" data-target="#registeruser"><i class="fas fa-plus"></i> Register User
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- slider    -->
                    
    <div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img1.jpg" width="600px"; height="300px" class="d-block w-10 h-10" style="box-shadow: 6px 6px 5px 5px; border-radius: 20px;">">
        <div class="carousel-caption d-none d-md-block">
          <h5>One Of The Best Arrengement</h5>
          <p>The are unlimited space and compatable function management</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img2.jpg" width="600px"; height="300px" class="d-block w-10 h-10" style="box-shadow: 6px 6px 5px 5px; border-radius: 20px;">">
        <div class="carousel-caption d-none d-md-block">
          <h5>Food Facilities</h5>
          <p>We are providing a best dishes and drink</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img3.jpg" width="600px"; height="300px" class="d-block w-10 h-10" style="box-shadow: 6px 6px 5px 5px; border-radius: 20px;">
        <div class="carousel-caption d-none d-md-block">
          <h5>Birthday Party</h5>
          <p>There are perfect location in birthday celebration diffrent services</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
                <!--  end slider --> 
        
        
          <!-- <div class="container-fluid add">
              <div class="row">
            <div class="col-3 offset-8" style=" width: 780px;">
                <aside>
                    <p style="color:white">we can provide a  diffrent type of event </p>
                    <h4 style="text-align: center; color: white;">formal parties</h4>
                    <p style="color:white">Participates in our event and enjoy the ourall events</p>
                    <img src="Events2.jpg" style="height: 150px; width: 100%; box-shadow: 6px 6px 5px 5px;">
                </aside>
                <br>
                <aside>
                    <h4 style="text-align: center; color: white;">Birtday Events</h4>
                    <p style="color:white">Participates in our event and enjoy the ourall events</p>
                    <img src="birthday.jpg" style="height: 150px; width: 100%; box-shadow: 6px 6px 5px 5px;">
                </aside>
                <br>
                <aside>
                    <h4 style="text-align: center; color: white; ">Celebration</h4>
                    <p style="color:white">Participates in our event and enjoy the ourall events</p>
                    <img src="college.jpg" style="height: 150px; width: 100%; box-shadow: 6px 6px 5px 5px;">
                </aside>

            </div>
            </div>
        </div> -->
        

         
                </div>
            </div>
            
        </div>
        
    </div>

    

<div class="modal fade" id="registeruser">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Register user</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <?php @include("new_user_regi.php");?>
            </div>
        </div>
        
    </div>
    
</div>


    
    <?php @include("includes/foot.php");?>
</body>
</html>
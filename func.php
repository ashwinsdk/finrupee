<?php
//Connection
function connect(){
    $server="localhost";
    $user="root";   
    $password="";
    $db="student-portal";
    $conn= mysqli_connect($server,$user,$password,$db);
    if (!$conn){
       die("connection failed:". mysqli_connect_error()); 
    }
}

//--Registertion Page--

function register($data){
   $conn= mysqli_connect("localhost","root","","student-portal");
    if(isset($_POST['register'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = md5($_POST['password']);
        $cpass = md5($_POST['cpassword']);
        $father =  $_POST['father_name'];
        $mother =  $_POST['mother_name'];
        $mobile =  $_POST['mobile_no'];
        $kulam = $_POST['kulam'];
        $kovil = $_POST['kovil'];
        $pincode = $_POST['pincode'];
      
         $select = " SELECT * FROM students WHERE email = '$email' && password = '$pass' ";
      
         $result = mysqli_query($conn, $select);
      
         if(mysqli_num_rows($result) > 0){
      
            $error[] = 'user already exist!';
      
         }else{
      
            if($pass != $cpass){
               $error[] = 'password not matched!';
            }else{
               $insert = "INSERT INTO students(login_name,email,password,father_name,mother_name,mobile_no,kulam,kovil,pincode,status) 
               VALUES('$name','$email','$pass','$father','$mother','$mobile','$kulam','$kovil','$pincode','Pending')";
               $query=mysqli_query($conn, $insert);
               if($query == true){
                header('location:success.php');
              }else{
                echo 'failed';
              }
            }
         }
      }
      if(isset($error)){
           foreach($error as $error){
              echo '<span class="error-msg">'.$error.'</span>';
         }
    }
}


//--Admin Page--

//Count Approved
function count_approved(){
   $conn= mysqli_connect("localhost","root","","student-portal");
   $sql_ok = "select count(id) from students where status = 'Approved'";
   $query_ok = mysqli_query($conn, $sql_ok);
   $row_ok= mysqli_fetch_assoc($query_ok);
   echo $row_ok['count(id)'];
}
//Count Pending
function count_pending(){
   $conn= mysqli_connect("localhost","root","","student-portal");
   $sql_pend = "select count(id) from students where status = 'Pending'";
   $query_pend = mysqli_query($conn, $sql_pend);
   $row_pend= mysqli_fetch_assoc($query_pend);
   echo $row_pend['count(id)'];
}
//Display Table
function display_table(){
   $conn= mysqli_connect("localhost","root","","student-portal");

   $sqlget = "select * from students";
   $sqldata = mysqli_query($conn, $sqlget);
   $row = mysqli_fetch_assoc($sqldata);

   while($row = mysqli_fetch_assoc($sqldata)){
     echo "<tr><td>";
     echo $row['id'];
     echo "</td><td>";
     echo $row['login_name'];
     echo "</td><td>";
     echo $row['email'];
     echo "</td><td>";
     echo $row['father_name'];
     echo "</td><td>";
     echo $row['mother_name'];
     echo "</td><td>";
     echo $row['mobile_no'];
     echo "</td><td>";
     echo $row['kulam'];
     echo "</td><td>";
     echo $row['kovil'];
     echo "</td><td>";
     echo $row['pincode'];
     echo "</td><td>";
     echo $row['status'];
     echo "</td><td>";
     $id=$row['id'];
     $name=$row['login_name'];
     $email=$row['email'];
     $father=$row['father_name'];
     $mother=$row['mother_name'];
     $mobile=$row['mobile_no'];
     $kovil=$row['kovil'];
     $kulam=$row['kulam'];
     $pincode=$row['pincode'];
     echo '<form method="GET" action="view.php">
     <input type="submit" class="btn btn-outline-dark rounded-pill" value="View">
     <input name="id" type="hidden" value='.$id.'>
     </form>
     ';
     echo "</td></tr>";
   }
    
}

//--Login Page--

function login(){
   $conn= mysqli_connect("localhost","root","","student-portal");

   if(isset($_POST['login'])){
     $name = $_POST['name'];
     $email = $_POST['email'];
     $pass = md5($_POST['password']);
     $sql = " SELECT * FROM students WHERE email = '$email' && password = '$pass' ";
   
     $result = mysqli_query($conn, $sql);
   
      if(mysqli_num_rows($result) > 0){
       
       $row = mysqli_fetch_array($result);
       $_SESSION['user_name'] = $row['login_name'];
       header('location:pending.php');
     }else{
       $error[] = 'incorrect email or password!';
     }
   
   
   };

   if(isset($error)){
      foreach($error as $error){
         echo '<span class="error-msg">'.$error.'</span>';
      }
   }

}


//--View Page--
//Approve
function approve(){
   $conn= mysqli_connect("localhost","root","","student-portal");
   $id=$_GET["id"];
   if(isset($_POST["approve"])){
     $sql2 = "UPDATE students SET status='Approved' WHERE id='$id'";
     $run = mysqli_query($conn , $sql2);
     if($run){
       if($run){
         header("Refresh:0");
       }
     }
   }}

//Disapprove
function disapprove(){
   $conn= mysqli_connect("localhost","root","","student-portal");
   $id=$_GET["id"];
   if(isset($_POST["disapprove"])){
     $sql2 = "UPDATE students SET status='Disapporved' WHERE id='$id'";
     $run = mysqli_query($conn , $sql2);
     if($run){
       if($run){
         header("Refresh:0");
       }
     }
   }
}

//Delete
function delete(){
   $conn= mysqli_connect("localhost","root","","student-portal");
   $id=$_GET["id"];
   if(isset($_POST["delete"])){
     $delete_sql = "delete FROM students WHERE id='$id'";
     $d_run = mysqli_query($conn , $delete_sql);
     if($d_run){
       header('location:admin.php');
       echo'
       <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <i class="bi bi-exclamation-octagon me-1"></i>
         A simple danger alert with icon—check it out!
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
       ';
     }
   }
}

//View
function view(){
   $conn= mysqli_connect("localhost","root","","student-portal");
   $sqlget = "select * from students";
   $sqldata = mysqli_query($conn, $sqlget);
   
   $id=$_GET["id"];
   $sql = " SELECT * FROM students WHERE id = '$id' ";
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_array($result);
   $_SESSION['id'] = $row['id'];
   $_SESSION['user_name'] = $row['login_name'];
   $_SESSION['email'] = $row['email'];
   $_SESSION['father'] = $row['father_name'];
   $_SESSION['mother'] = $row['mother_name'];
   $_SESSION['mobile'] = $row['mobile_no'];
   $_SESSION['kovil'] = $row['kovil'];
   $_SESSION['kulam'] = $row['kulam'];
   $_SESSION['pincode'] = $row['pincode'];
   $_SESSION['status'] = $row['status'];
}
?>
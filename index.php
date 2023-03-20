<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `Date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    //execute query
    if($con->query($sql) == true){
          $insert=true;
     // echo "Successfully inserted";
    }
      else{
        echo" error:$sql <br> $con->error";
      }
      $con->close();
  }?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip form</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sriracha&display=swap');
      </style>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="mist.jpg" alt="mist image" class="image">
    <div class="container">
        <h1>Welcome To  MIST Goa Trip Form </h1>
        <p> Enter the details and sumbit this form to comfirm your participation in this trip </p> 
       
        <?php
         if($insert == true){
        echo "<p> class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
        <form action="index.php" method="post">
                <input type="text" name="name" id="name" placeholder="Enter your name">
                <input type="email" name="email" id="email" placeholder="Enter your Email">
                <input type="text" name="age" id="age" placeholder="Enter your age">
                <input type="text" name="gender" id="gender" placeholder="Enter your gender">
              <input type="text" name="phone" id="phone" placeholder="Enter your phone number ">
              <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
              <button class="btn">Submit</button>
            
            </form>
    </div>
    <script src="index.js">
    </script>
</body>
</html>
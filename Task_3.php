<?php


$nameError=$emailError=$passError=$addError=$genderError=$urlError="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "*Name is required";
      echo $nameError;
    } else {
      $name = test_input($_POST["name"]);
     
    }
    
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
      echo $emailError;

    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        echo $email;
      }
    }
  
    //Password Validation 
    if (empty($_POST["password"])) {
      $passError = "*Password is required";
      echo $passError;

    } else {
      $password = test_input($_POST["password"]);
      echo $password;
    }
  
      
    if (empty($_POST["URL"])) {
      $urlErr = "Required URL";
      echo $urlError;

    } else {
      $URL = test_input($_POST["website"]);
      if (!filter_var($URL, FILTER_VALIDATE_URL)) {
          $websiteErr = "Invalid URL";
          echo $URL;
        }
    }
    
  //Address Validation
  if (empty($_POST["address"])) {
      $addError = "*Address is required";
      echo $addError;

    } else {
      $address = test_input($_POST["address"]);
    }
  
   
  
    if (empty($_POST["gender"])) {
      $genderErr = "Gender is required";
      echo $genderErr;
    } else {
      $gender = test_input($_POST["gender"]);
    }
  }
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Task_3</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
.error {color: #FF0000;}
</style>
</head>
<body>

<div class="container">
  <h2>Registeration Form:</h2>
  <form  action="<?php echo $_SERVER['PHP_SELF'];?>"   method="post"   enctype ="multipart/form-data">

  <div class="form-group">
    <label for="Inputname">Name:</label>
    <input type="text"  name="name"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
    <span class="error">*Name is Required  </span>
  
</div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email address:</label>
    <input type="E-mail"   name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <span class="error">*email  is Required  </span>
  
</div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password:</label>
    <input type="password"   name = "password"  class="form-control" id="exampleInputPassword1" placeholder="Enter Your Password">
    <span class="error">* Required password </span>
  
</div>

  <div class="form-group">
    <label for="address">Address:</label>
    <input type="text"   name="address" class="form-control"  placeholder="Enter Address">
    <span class="error">*Address is Required  </span>
  
</div>
  <div class="form-group">
    <label>LinkedIn URL:</label>
    <input type="URL"   name = "URL"  class="form-control"  placeholder="Enter Your Linkedin">
    <span class="error">*LinkedIn URL is Required  </span>

</div>

  <div class="form-group">
    <label>Gender :</label>
    <input type="radio"   name = "Gender"  placeholder="Gender" value="male">Male
    <input type="radio"   name = "Gender"  placeholder="Gender" value="female">Female
    <span class="error">*Gender is Required  </span>

  </div>
 
 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>
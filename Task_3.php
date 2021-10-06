<?php
function clean($input){

  $input = stripslashes($input);
  $input = htmlspecialchars($input);
  $input = trim($input);

  return $input;

}


$errors=[];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name     =  clean($_POST['name']); 
  $password =  clean($_POST['password']);
  $email   =  clean($_POST['email']);
  $address  =  clean($_POST['address']); 
  $URL      =  clean($_POST['URL']);
  if (empty($_POST["gender"]))
  {
   $errors['gender'] = "Gender is required";
 }
else
  {
   $gender = clean($_POST["gender"]);
 }


//name validation
  if(empty($name)){
    $errors['name'] = "name Required";
 }
 else {
   $name=clean($_POST['name']);


 }
    
    # Email Validation ... 
    if(empty($email)){
      $errors['email'] = "email Required";
  }
  elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $errors['email'] = "Invalid Email";
  }
   
   //Password Validation 
   if (empty($_POST['password'])) {
    $errors['password'] = "password Required";
    
  } else {
    $password = clean($_POST['password']);
    
  }
      
  //Linkedin url validation
    if (empty($_POST["URL"])) {
      $errors['URL'] = "Required URL";
  

    } else {
      $URL = clean($_POST['URL']);
      if (!filter_var($URL, FILTER_VALIDATE_URL)) {
          $URL= "Invalid URL";
          
        }
    }
    
  //Address Validation
  if (empty($_POST['address'])) {
      $errors['address']= "*Address is required";
      

    } else {
      $address = clean($_POST['address']);
    }
  
   //gender Validation
    if (empty($_POST['gender'])) {
      $errors['gender'] = "Gender is required";
      
    } else {
      $gender =clean($_POST['gender']);
    }
  }
  if(count($errors) > 0){
    foreach($errors as $key => $val ){
        echo '* '.$key.' :  '.$val.'<br>';
    }
}else
{
    echo 'Valid Data';
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
    <span class="error">*</span>
  
</div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email address:</label>
    <input type="E-mail"   name="email" class="form-control"  placeholder="Enter email" >
    <span class="error">*</span>
  
</div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password:</label>
    <input type="password"   name = "password"  class="form-control" id="exampleInputPassword1" placeholder="Enter Your Password">
    <span class="error">*</span>
  
</div>

  <div class="form-group">
    <label for="address">Address:</label>
    <input type="text"   name="address" class="form-control"  placeholder="Enter Address">
    <span class="error">* </span>
  
</div>
  <div class="form-group">
    <label>LinkedIn URL:</label>
    <input type="URL"   name="URL"  class="form-control"  placeholder="Enter Your Linkedin">
    <span class="error">* </span>

</div>

  <div class="form-group">
    <label>Gender :</label>
    <input type="radio"   name="gender" value="male" <?php if (isset($gender) && $gender=="male");?>>Male
    <input type="radio"   name="gender" value="female" <?php if (isset($gender) && $gender=="female");?>>Female
    <span class="error">* </span>

  </div>
 
  <button type="submit" class="btn btn-primary" name="Submit" value="Submit">Submit</button>
</form>
</div>

</body>
</html>
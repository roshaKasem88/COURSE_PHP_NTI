<?php
session_start();

include 'validation.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
  $name       =  clean($_POST['name']); 
  $password   =  clean($_POST['password']);
  $email      =  clean($_POST['email']);
  $address    =  clean($_POST['address']);
  $linkedIn   =  clean($_POST['URL']);
  
   

     $errors = [];
     if(!empty($_FILES['file']['name'])){

      $fileTmp   =  $_FILES['file']['tmp_name'];
      $fileName  =  $_FILES['file']['name'];
      $fileSize  =  $_FILES['file']['size'];
      $fileType  =  $_FILES['file']['type'];  
      $allowdEx  = ['pdf'];
      $TypeArray = explode('/',$fileType);

       if(in_array($TypeArray[1],$allowdEx)){
          // code 
       $FinalName = rand(1,100).time().'.'.$TypeArray[1];

       $disPath = './myuploads/'.$FinalName;

         if(move_uploaded_file($fileTmp,$disPath)){
             echo 'File Uploaded';
         }else{
             echo 'Error Try Again';
         }         
      }

       else{
           echo 'Not Allowed Extension';
       }
     }else{

          echo 'File Required';
      }

    }

    if(!validate($name,1) && !is_string($name)){
       $errors['name'] = "Field Required";
       $errors['name'] = "Name Must be String ";
 
    }

      # Email Validation ... 
      if(!validate($email,1)){
        $errors['email'] = "Required email";
    }elseif(!validate($email,2))
    {
        $errors['email'] = "Invalid Email";
    }


    # Password Validation ... 
    if(!validate($password,1))
    {
        $errors['Password'] = "Field Required";
    }elseif(!validate($password,3) ){
        $errors['Password'] = "Password Length Must >= 6 ch";
    }

      # linked Validation ... 
    if(!validate($linkedIn,1)){
        $errors['linkedIn'] = "Field Required";
    }elseif(!validate($linkedIn,4)){
        $errors['linkedIn'] = "Invalid Url";
    }

    
#Gender Validation
       if(isset($_POST['gender'])){

       $gender =  clean($_POST['gender']);
       }else{
      
         $errors['gender'] = "Field Required";
    
       }

    if(count($errors) > 0){
        foreach($errors as $key => $val ){
            echo '* '.$key.' :  '.$val.'<br>';
        }
    }
    else echo'Valid Data';

setcookie("file","",time()+86400,'/');
echo'the cookie has been set for day';


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    <input type="email"   name="email" class="form-control"  placeholder="Enter email" >
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

  <div class="container">
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputPassword1">Upload CV:</label>
                <input type="file" name="file">
            </div>

            <button type="submit" class="btn btn-primary" name="upload" >Upload</button>
        </form>
    </div>
</br>
 
  <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
</form>
</div>

</body>
</html>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link rel="stylesheet" href="style2.css" />
  </head>
  <body>
    <?php
    $nameErr = $emailErr = $mobilenoErr = $genderErr = $websiteErr = $agreeErr = "";
    $name = $email = $mobileno = $gender = $website = $agree = "";
  
    //Input fields validation  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
      //String Validation  
      if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } else {
        $name = input_data($_POST["name"]);
        // check if name only contains letters and whitespace  
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
          $nameErr = "Only alphabets and white space are allowed";
        }
      }
      //Event Name Validation
      if (empty($_POST["ename"])) {
        $enameErr = "EventName is required to be selected";
      } else {
        $ename = input_data($_POST["ename"]);
      }
  
      //Email Validation   
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = input_data($_POST["email"]);
        // check that the e-mail address is well-formed  
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }
      if (empty($_POST["address"])) {
        $agreeErr = "Address is required";
      } else {
        $agree = input_data($_POST["address"]);
      }
      //Number Validation  
      if (empty($_POST["phno"])) {
        $mobilenoErr = "Mobile no is required";
      } else {
        $mobileno = input_data($_POST["phno"]);
      // check if mobile no is well-formed  
      if (!preg_match("/^[0-9]*$/", $mobileno)) {
        $mobilenoErr = "Only numeric value is allowed.";
      }
      //check mobile no length should not be less and greator than 11  
      if (strlen($mobileno) != 11) {
        $mobilenoErr = "Mobile number must contain 11 digits.";
      }
    }


    //Empty Field Validation  
    if (empty($_POST["gender"])) {
      $genderErr = "Gender is required";
    } else {
      $gender = input_data($_POST["gender"]);
    }
  }
  function input_data($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
    //Registration

    if (isset($_POST['register'])) {
      $con = mysqli_connect('localhost', 'root', '', 'assignment');
  
  
      if ($nameErr == "" && $emailErr == "" && $mobilenoErr == "" && $genderErr == "") {
  
        $sql = "INSERT INTO event(id,name,email,phone,gender,address,events,birth) VALUES (NULL, '$_POST[name]',
      '$_POST[email]','$_POST[phno]','$_POST[gender]','$_POST[address]','$_POST[ename]','$_POST[bd]')";
  
      if(mysqli_query($con,$sql))
    {
      echo '<script>alert("You have been registered.")</script>'; 
      header("Location: home.html");
    }
    else{ 
      echo '<script>alert(" "Error: " . $sql . "<br>" . $con->error");</script>';
      
    }
      } else {
        echo '<script>alert("You didn\'t filled up the form correctly.")</script>';
      
      }
    } 
    ?>
    <section class="container">
      <header>Tennis Club Registration</header>
      <form action="#" class="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="input-box">
          <label>Full Name <span class="error">* <?php echo $nameErr; ?> </span></label>
          <input type="text" placeholder="Enter full name " name="name" id="name"  />
        </div>

        <div class="input-box">
          <label>Email Address <span class="error">* <?php echo $emailErr; ?> </span></label>
          <input type="email" placeholder="Enter email address" name= "email" id="email" />
        </div>

        <div class="column">
          <div class="input-box">
            <label>Phone Number <span class="error">* <?php echo $mobilenoErr; ?> </span></label>
            <input type="number" placeholder="Enter phone number" name="phno" id="phno" />
          </div>
          <div class="input-box">
            <label>Birth Date</label>
            <input type="date" placeholder="Enter birth date"  name="bd" id="bd" />
          </div>
        </div>
        <div class="gender-box">
          <h3>Gender <span class="error" id="gend-error">* <?php echo $genderErr; ?> </span></h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="gender" value="male" checked />
              <label for="check-male">male</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" value="female"  />
              <label for="check-female">Female</label>
            </div>
          </div>
        </div>
        <div class="input-box address">
          <label>Address <span class="error">* <?php echo $agreeErr; ?> </span></label>
          <input type="text" placeholder="Enter address" name="address" id="address" />
          <div class="column">
            <div class="select-box">
              <select name="ename" id="ename">
                <option hidden>Events</option>
                <option value="Tennis Championship">Tennis Championship</option>
                <option value="Ace Clash">Ace Clash</option>
                <option value="Court Royal">Court Royal</option>
                <option value="School Tennis Showdown">School Tennis Showdown</option>
              </select>
            </div>
          </div>
        </div>
        <button type="submit" name="register">Submit</button>
      </form>
    </section>


  </body>
</html>
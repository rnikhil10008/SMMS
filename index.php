<?php 
session_start();
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="registrationpage.css" />
  </head>
  <body>
  
    <section class="container">
    <?php include('message.php'); ?>
      <header>Registration Form</header>
      <form action="registercode.php" class="form" method="POST">
        <div class="column">
          <div class="input-box">
            <label>First Name</label>
            <input required type="text" name="fname"  placeholder="First Name"   class = "form-control"/>
          </div>
          <div class="input-box">
            <label>Last Name</label>
            <input required type="text" name="lname"  placeholder="Last Name"  class = "form-control" />
          </div>
        </div>
        <div class="input-box">
          <label>Email Address</label>
          <input required type="text" name="email" placeholder="Enter email address" class = "form-control" />
        </div>
        <div class="column">
          <div class="input-box">
            <label>Password</label>
            <input required type="password" name="password"  placeholder="**********"  class = "form-control" />
          </div>
          <div class="input-box">
            <label>Confirm Password</label>
            <input required type="password" name="cpassword"  placeholder="***********"  class = "form-control" />
          </div>
        </div>
        <div class="column">
          <div class="input-box">
            <label>Phone Number</label>
            <input type="number" name="phoneno"  placeholder="Enter phone number" class = "form-control" />
          </div>
          <div class="input-box">
            <label>Birth Date</label>
            <input type="date" name="bdate"  placeholder="Enter birth date"  class = "form-control" />
          </div>
        </div>
        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio"  name="gender" checked  class = "form-control"/>
              <label for="check-male">Male</label>
            </div>
            <div class="gender">
              <input type="radio" name="gender"  class = "form-control"/>
              <label for="check-female">Female</label>
            </div>
            <div class="gender">
              <input type="radio"  name="gender" class = "form-control" />
              <label for="check-other">prefer not to say</label>
            </div>
          </div>
        </div>
        <div class="input-box address">
          <label>Address</label>
          <input type="text" name="sadd"  placeholder="Enter street address"  class = "form-control"/>
          <input type="text" name="saddl2"  placeholder="Enter street address line 2"  class = "form-control" />
          <div class="column">
            <div class="select-box">
              <select>
                <option hidden>Country</option>
                <option>America</option>
                <option>Japan</option>
                <option>India</option>
                <option>Nepal</option>
              </select>
            </div>
            <input type="text" name="city" placeholder="Enter your city"  class = "form-control" />
          </div>
          <div class="column">
            <input type="text" name="region"  placeholder="Enter your region"  class = "form-control"/>
            <input type="number" name="postalcode"  placeholder="Enter postal code"  class = "form-control"/>
          </div>
        </div>
        <button type ="submit" name= "register_btn" class = "btn btn primary">Register now</button>
      </form>
    </section>
  </body>
</html>
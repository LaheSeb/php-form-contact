<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
          <style>
              .error {
                color : red;
              }
          </style>

</head>
<body align=center>
<?php
    $nameErr = $emailErr = $genderErr = $websiteErr ="";
    $name = $email = $gender = $comment = $website ="" ;
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    
    <?php
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      // check if name only contains letters and whitespace
      if (!preg_match('/^[a-zA-Z \p{L}]+$/ui', $name)) {
        $nameErr = "Only letters and white space allowed";
      }
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }
      if (empty($_POST["website"])) {
        $website = "";
      } else {
        $website = test_input($_POST["website"]);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)
          [-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
          $websiteErr = "Invalid URL";
        }
      }
      if (empty($_POST["comment"])) {
        $comment = "";
      } else {
        $comment = test_input($_POST["comment"]);
      }
    
      if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
      } else {
        $gender = test_input($_POST["gender"]);
      }
    }









        

        
        
    
    ?>
<form method="POST" action ="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']);?>">
       Name:<input type="text" name="name" value="<?php echo $name;?>"><br/>
       <span class="error">* <?php echo $nameErr;?></span>
       E-Mail:<input type="text" name="email" value="<?php echo $email;?>"><br/>
       <span class="error">* <?php echo $emailErr;?></span>
       Website:<input type="text" name="website" value="<?php echo $website;?>"><br/>
       <span class="error">* <?php echo $websiteErr;?></span>
       Comment:<textarea  name="comment" rows="1" cols="20"
       value="<?php echo $comment;?>"></textarea><br/>
       Sexe : <input type="radio" name="gender"<?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
<input type="radio" name="gender"<?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
<input type="radio" name="gender"<?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other

<span class="error">* <?php echo $genderErr;?></span>
       <input type="submit">
    </form>
    
</body>
</html>


    




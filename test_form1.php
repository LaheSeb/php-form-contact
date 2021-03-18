<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        // collect value of input field
        if (empty($_POST["name"])){
            $nameErr = "Name is reqiored";
        } else {
            $name = test_input ($_POST)["name"]);
            if (!preg_match('/^[a-zA-Z \p{L}]+$/ui', $name)) {

                $nameErr = "Only letters and white space allowed";
        }
        if (empty($_POST["email"])){
            $emailErr = "Name is reqiored";
        } else {
            $email = test_input ($_POST)["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
        }
        if (!empty($_POST["website"])){
            $gender = test_input ($_POST)["name"]);
        }
        
        if (!empty($_POST["name"])){
            $website = "";
        }else {
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                $websiteErr = "Invalid URL";
    }
        }





        
}
        
        echo 'name = '.$_POST['fname'] . '<br/>';
        echo 'email = '.$_POST['email'] . '<br/>';
        echo 'website = '.$_POST['website'] . '<br/>';
        echo 'comment = '.$_POST['comment'] . '<br/>';
        echo 'gender = '.$_POST['gender'] . '<br/>';
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


    




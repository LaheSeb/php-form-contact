<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body align=center>
    <form method="POST" action ="<?php echo $_SERVER['PHP_SELF'];?>">
       Name:<input type="text" name="fname"><br/>
       E-Mail:<input type="text" name="email"><br/>
       Website:<input type="text" name="website"><br/>
       Comment:<textarea  name="comment" rows="1" cols="20"></textarea><br/>
       Sexe : <input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="other">Other
<input type="radio" name="gender" value="other">Homme-Poisson<br/>
       <input type="submit">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //collect value of input field
        $name = $_POST['fname'];
        if (empty($name)){
            echo "Name is empty";
        } else {
            echo $name;
        }
    }

?>

</body>
</html>


    



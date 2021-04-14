<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Form Result</title>
</head>
<body>
    <?php
        extract ($_POST);
        echo "<br>A summary of your order has been sent to your email!";
        echo "<p id='result'> </p>";
        echo "<script type='text/javascript'>".
            "document.getElementByID('result').innerText = showTime();".
            "</script>";

        $subject = "Your Order from Jade Delight";
        $message = "<script type='text/javascript'>".
            "document.getElementByID('result').innerText = showTime();".
            "</script>";

        mail($email,$subject,$message);
    ?>

</body>
</html>

<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body>
     Thanks for your order <?php echo $_POST["fname"]; ?>! <br />
     <!-- <?php foreach ($_POST as $key => $value) {
     echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
     } ?> -->
     Your Order Summary:<br />
     <table border="0" cellpadding="3">
         <tr>
           <th>Item Name</th>
           <th>Amount</th>
           <th>Cost Each</th>
           <th>Total Cost</th>
           <th></th>
         </tr>
         <?php if($_POST["quan0"] > 0) : ?>
             <tr>
                 <td>Chicken Chop Suey</td>
                 <td><?php echo $_POST["quan0"]; ?></td>
                 <td>$4.5</td>
                 <td>$<?php echo $_POST["cost"][0]; ?></td>
             </tr>
         <?php endif; ?>
         <?php if($_POST["quan1"] > 0) : ?>
             <tr>
                 <td>Sweet and Sour Pork</td>
                 <td><?php echo $_POST["quan1"]; ?></td>
                 <td>$6.25</td>
                 <td>$<?php echo $_POST["cost"][1]; ?></td>
             </tr>
         <?php endif; ?>
         <?php if($_POST["quan2"] > 0) : ?>
             <tr>
                 <td>Shrimp Lo Mein</td>
                 <td><?php echo $_POST["quan2"]; ?></td>
                 <td>$5.25</td>
                 <td>$<?php echo $_POST["cost"][2]; ?></td>
             </tr>
         <?php endif; ?>
         <?php if($_POST["quan3"] > 0) : ?>
             <tr>
                 <td>Moo Shi Chicken</td>
                 <td><?php echo $_POST["quan3"]; ?></td>
                 <td>$6.50</td>
                 <td>$<?php echo $_POST["cost"][3]; ?></td>
             </tr>
         <?php endif; ?>
         <?php if($_POST["quan4"] > 0) : ?>
             <tr>
                 <td>Fried Rice</td>
                 <td><?php echo $_POST["quan4"]; ?></td>
                 <td>$2.35</td>
                 <td>$<?php echo $_POST["cost"][4]; ?></td>
             </tr>
         <?php endif; ?>
       </table>
       <br />
       Subtotal: $<?php echo $_POST["subtotal"]; ?> <br />
       Tax: $<?php echo $_POST["tax"] ?> <br />
       Total: $<?php echo $_POST["total"] ?> <br />

       <?php
         date_default_timezone_set("America/New_York");
         $orderTime = new DateTime();
         $msg = "We have received your order! Your total is $" . $_POST["total"] . ". ";
         if($_POST["p_or_d"] == "pickup"){
             $wait = new DateInterval('PT15M');
             $orderTime->add($wait);
             $time = "Your pickup time is:" . $orderTime->format('h:ia') . ".";
             echo $time;
             $msg = $msg . $time;
         }
         else{
             $wait = new DateInterval('PT30M');
             $orderTime->add($wait);
             $time = "Your expected delivery time is:" . $orderTime->format('h:ia') . ".";
             echo $time;
             $msg = $msg . $time;
         }
         mail($_POST["email"], "Thanks for Ordering", $msg);
      ?>

 </body>
 </html>

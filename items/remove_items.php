<?php
include("../signin/navigation3.php");


$message = "";
if (count($_POST) > 0) {
    $conn = mysqli_connect("localhost", "root", "", "canteen_delivery_system");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $a = $_POST['Item_Id'];
    $sql = "select * from food_items  where item_name='$a' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);

    if ($row == 0) {
        $message = "invalid item name\\nTry again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    else{
        echo "<script> alert('Item removed successfully')</script>";
    }

    $sql = "delete from food_items  where item_name='$a' ";
    $result = mysqli_query($conn, $sql);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

    <style>
        .div1 {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            background-color: #ccc;
        }

        .div2 {

            background-image: url("../assets/item.jpg");
            height: 76vh;

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 20px;
            opacity: 0.9;
            width: 350px;

        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            width: 100%;
            text-align: center;
            font-family: arial;
        }

        input {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 5px;
            margin-left: 25%;

        }

        .title {
            font-size: 25 px;
            font-family: "Times New Roman", Times, serif;
            color: #fff;
            font-weight: bold;
            text-shadow: 2px 2px 4px #000000;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 50%;
            border-radius: 5px;
            margin-top: 20px;
        }

        p {
            font-size: 20px;
            font-family: "Times New Roman", Times, serif;
            font-weight: bold;

        }

        .scroller {
            background-image: url("https://www.foodiesfeed.com/wp-content/uploads/2019/04/mae-mu-oranges-ice-819x1024.jpg.webp");
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            width: 350px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 20px;
            opacity: 0.9;
            width: 350px;
            text-decoration: solid;
            text-transform: uppercase;
            font-weight: bold;
            font-size: large;
            color: #000;
            word-wrap: normal;



        }
        #dropdown {
            position: relative;
            display: inline-block;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 10px;
            opacity: 0.9;
            width: 300px;
            text-decoration: solid;
            text-transform: uppercase;
            font-weight: bold;
            font-size: large;
            color: #000;
            word-wrap: normal;
            margin-left: 20px;

        }

    </style>
</head>

<body>
    <div class="div1">
        <div class="div2">
            <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
                <div class="wrapper wrapper--w680">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="title">Enter Item Details</h2>
                            <form name="Add_Item" method="post" action="">
                                <div class="message"><?php if ($message != "") {
                                                            echo $message;
                                                        } ?></div>
                                 <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group">
                                            <select class="input--style-4" name="Item_Id" required id="dropdown">
                                                <option value="">Select Item</option>
                                                <?php
                                                $conn = mysqli_connect("localhost", "root", "", "canteen_delivery_system");
                                                // Check connection
                                                if ($conn->connect_error) {
                                                    die("Connection failed: " . $conn->connect_error);
                                                }
                                                $sql = "SELECT * FROM food_items";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<option value='" . $row["item_name"] . "'>" . $row["item_name"] . "</option>";
                                                    }
                                                } else {
                                                    echo "0 results";
                                                }
                                                $conn->close();
                                                ?>
                                                <!-- <option value='" . $row["item_name"] . "'><?php echo  $row["item_name"]; ?></option> -->
                                            </select>
                                        </div>
                                    </div>
                                
                                </div>
                        
                                <div class="p-t-15">
                                    <button class="btn btn--radius-2 btn--blue" type="submit" value="Submit">Delete</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="scroller">
            <h2 style="text-align: center;">Available Items in Menu</h2>
            <marquee behavior="scroll" direction="up" style="text-align: center;">

                <?php

                $conn = mysqli_connect("localhost", "root", "", "canteen_delivery_system");
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM food_items";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo " <p>" . $row["item_name"] . " -" . $row["price"] . " Rs</p>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();

                ?>
            </marquee>
        </div> -->

    </div>

    



</html>
<!-- end document-->
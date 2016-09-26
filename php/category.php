
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Database 'lakshya' connection
    if (mysqli_connect_errno()) {
    die("Connection failed ");
    } 
    $selected = mysqli_select_db($conn,"test") 
    or  die("Connection failed ");
 
    $c1 = $_POST['ios'];
    
    $c2 = 0;//$_POST['android'];
    $c3 = 0;//$_POST['wd'];
    $c4 = $_POST['se'];
    //$sql = "select * from LearnHub ";

    $categories = array();

    if($c1==1)
    {
        $sql = "select * from LearnHub where category = 'iOS' ";
        $result = mysqli_query($conn, $sql) or die("Error in Selectig " . mysqli_error($conn));

        while($row = mysqli_fetch_assoc($result))
        {
           // array_push($categories,$row);
            $categories[]=$row;
        }
    }    

    if($c2==1)
    {
        $sql = "select * from LearnHub where category = 'Android' ";
        $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

        while($row = mysqli_fetch_assoc($result))
        {
            array_push($categories,$row);
        }
    }
        
    if($c3==1)
    {
        $sql = "select * from LearnHub where category = 'Web Development' ";
        $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

        while($row = mysqli_fetch_assoc($result))
        {
            array_push($categories,$row);
        }
    }
    if($c4==1)  
    {
        $sql = "select * from LearnHub where category = 'Software Engineering' ";
         $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

        while($row = mysqli_fetch_assoc($result))
        {
            array_push($categories,$row);
        }
    }
        
    

    
    echo json_encode($categories);

    mysqli_close($conn);

?>


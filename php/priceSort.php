
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
 
    $sql = "select * from LearnHub order by price";
    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

    $prices = array();
    while($row = mysqli_fetch_assoc($result))
    {
        $prices[] = $row;
    }

    echo json_encode($prices);

    mysqli_close($conn);

?>


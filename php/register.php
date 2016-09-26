
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    
    if (mysqli_connect_errno()) {
    die("Connection failed ");
    } 
    $selected = mysqli_select_db($conn,"test") 
    or  die("Connection failed ");

    $t = $_POST['title'];
 
    $sql = "select * from LearnHub where title like '%".$t."%'";
    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

    $courses = array();
    while($row = mysqli_fetch_assoc($result))
    {
        $courses[] = $row;
    }

    echo json_encode($courses);

    mysqli_close($conn);

?>
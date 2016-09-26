
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    $conn = mysqli_connect($servername, $username, $password);
    
    if (mysqli_connect_errno()) {
    die("Connection failed ");
    } 
    $selected = mysqli_select_db($conn,"test") 
    or  die("Connection failed ");

    $t = $_POST['price'];
    
    
    $stmt = $conn->prepare("select * from LearnHub where title like %'?'%");
    $stmt->bind_param('s',$t);
    $stmt->execute() or die("Error in Selecting " . mysqli_error($conn));

    $result = $stmt->get_result();

    $titles = array();
    while($row = mysqli_fetch_assoc($result))
    {
        $titles[] = $row;
    }

    echo json_encode($titles);

    mysqli_close($conn);

?>


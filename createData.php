<?php 
require_once 'connection.php';


if($con){
    $username = $_POST['username']; 
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $insert = "INSERT INTO tb_user(username, email, password, level)  VALUES ('$username','$email', '$password', '$level' )";


    if ($username != "" && $email != "" && $password != "" && $level !="" ){
        $objek_query = mysqli_query($con, $insert);
        $data = array();

        if ($objek_query){
            array_push($data, array(
                'status' => 'OK'
            ));
        }else{
            array_push($data, array(
                'status' => 'FAILED'
            ));
        }
        
    }else {
        array_push($data, array(
            'status' => 'FAILED'
        ));
    }
}else{
    array_push($data, array(
        'status' => 'FAILED'
    ));
}

echo json_encode(array("server_response" => $data));
mysqli_close($con);

?>
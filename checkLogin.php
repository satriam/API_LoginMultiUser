<?php 

require_once('connection.php');
$respon=array();
if ($_SERVER['REQUEST_METHOD']=='POST'){
	
	$username=$_POST['username'];
	$password=$_POST['password'];

	$sql="SELECT * FROM `tb_user` WHERE username='$username' and password='$password'";
	$hasil= mysqli_query($con, $sql);
	if(mysqli_num_rows($hasil)>0){
		$respon["login"]=array();
		while ($row=mysqli_fetch_array($hasil)){
			$index=array();
			$index["username"] = $row['username'];
			$index["email"] = $row['email'];
			
            $index["status"] = "OK";
			array_push($respon["login"], $index);
			$respon["sukses"]="1";
			$respon["pesan"]="sukses";
			$respon["level"] = $row['level'];


		}
		
header('Content-Type: application/json');
echo json_encode($respon);
		
	}else{
		$respon["sukses"]="0";
			$respon["pesan"]="Gagal";
			
header('Content-Type: application/json');
			echo json_encode($respon);
	}
	mysqli_close($con);
}


	
// }
 ?>

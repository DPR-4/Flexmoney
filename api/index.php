<?php
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers: *");
// // echo "testing only ha ha";
// include 'DbConnect.php';
// $obj=new DbConnect;
// $con=$obj->connect();

// $method = $_SERVER['REQUEST_METHOD'];
//     switch($method){
//         case "POST":
//             $user=json_decode( file_get_contents('php://input'));
//             $sql="INSERT INTO users(id,name,email,mobile,created_at) VALUES(null,:name,:email,:mobile,:created_at)"
//             $stmt=$con->prepare($sql);
//             $created_at=date('y-m-d')
//             $stmt->bindParam(':name',$user->name);
//             $stmt->bindParam(':email',$user->email);
//             $stmt->bindParam(':mobile',$user->mobile);
//             $stmt->bindParam(':created_at',$created_at);

//             if($stmt->execute()){
//                 $response =['status'=>1,'message'=>'Record created succefully'];
//             }
//             else{
//                 $response =['status'=>0,'message'=>'Fail to record'];
//             }
//             return json_encode($response);
//             break;

//     }

error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

include 'DbConnect.php';
$objDb = new DbConnect;
$conn = $objDb->connect();

$method = $_SERVER['REQUEST_METHOD'];
switch($method) {
    case "POST":
        $user = json_decode( file_get_contents('php://input') );
        $sql = "INSERT INTO users(id, name, email, mobile, created_at) VALUES(null, :name, :email, :mobile, :created_at)";
        $stmt = $conn->prepare($sql);
        $created_at = date('Y-m-d');
        $stmt->bindParam(':name', $user->name);
        $stmt->bindParam(':email', $user->email);
        $stmt->bindParam(':mobile', $user->mobile);
        $stmt->bindParam(':created_at', $created_at);

        if($stmt->execute()) {
            $response = ['status' => 1, 'message' => 'Record created successfully.'];
        } else {
            $response = ['status' => 0, 'message' => 'Failed to create record.'];
        }
        echo json_encode($response);
        break;
}

?>
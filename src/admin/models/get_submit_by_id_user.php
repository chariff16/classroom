<?php
function get_submit_by_id_user() {
    require('../conn.php');
    $id=$_GET['user_id'];
    $sql = "SELECT * FROM `submit` WHERE user_id=$id";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $res = [
            'code' => 200,
            'message' => 'get submit by id user successful',
            'count' => count($result->fetch_all()),
            'data' => $result->fetch_all()
        ];
    } else {
        $res = [
            'code' => 404,
            'message' => 'get submit by id user not successful!'
        ];
    }
    echo json_encode($res);
    
$conn->close();
}
get_submit_by_id_user();
?>
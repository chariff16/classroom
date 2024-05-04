<?php
function get_submit_by_id() {
    require('../conn.php');
    $id=$_GET['id'];
    $sql = "SELECT * FROM `submit` WHERE id=$id";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $res = [
            'code' => 200,
            'message' => 'get submit by id successful',
            'data' => $result->fetch_assoc()
        ];
    } else {
        $res = [
            'code' => 404,
            'message' => 'get submit by id not successful!'
        ];
    }
    echo json_encode($res);
    
$conn->close();
}
get_submit_by_id();
?>
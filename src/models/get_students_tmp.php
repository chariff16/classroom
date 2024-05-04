<?php
function getStudentTmp(){
    require('../conn.php');
    $sql = "SELECT * FROM user WHERE role='student_tmp'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $res = [
            'code' => 200,
            'message' => 'get Student Tmp successful',
            'data' => $result->fetch_all()
        ];
    } else {
        $res = [
            'code' => 404,
            'message' => 'get Student Tmp not successful!'
        ];
    }
    echo json_encode($res);
    
$conn->close();
}
?>

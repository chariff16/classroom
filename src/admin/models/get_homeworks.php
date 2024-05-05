<?php
function get_homeworks()
{
    require('../../conn.php');
    $sql = "SELECT * FROM `homeworks` WHERE 1";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $res = [
            'code' => 200,
            'message' => 'get Student Tmp successful',
            'count' => $result->num_rows,
            'data' => $result->fetch_all()
        ];
    } else {
        $res = [
            'code' => 404,
            'message' => 'get Student Tmp not successful!',
            'count' => $result->num_rows,
        ];
    }
    echo json_encode($res);

    $conn->close();
}
get_homeworks();

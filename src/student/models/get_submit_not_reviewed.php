<?php
function get_submit_not_reviewed()
{
    require('../../conn.php');
    $sql = "SELECT * FROM `submit` WHERE reviewed='0'";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $res = [
            'code' => 200,
            'message' => 'get submit not reviewed successful',
            'count' => count($result->fetch_all()),
            'data' => $result->fetch_all()
        ];
    } else {
        $res = [
            'code' => 404,
            'message' => 'get submit not reviewed not successful!'
        ];
    }
    echo json_encode($res);

    $conn->close();
}
get_submit_not_reviewed();

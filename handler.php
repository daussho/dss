<?php
# include all model class
foreach (glob("model/*.php") as $filename)
{
    include $filename;
}

function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}

# Handler for routing

function loginHandler(){
    header('Content-Type: application/json');
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dss";

    $data = json_decode(file_get_contents('php://input'), true);
    $user = $data['username'];
    $userpwd = hash('sha256', $data['password']);

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT COUNT(username) AS result FROM user WHERE username LIKE '" . $user . "' AND password LIKE '" . $userpwd . "'";
    //$sql = "SELECT COUNT(username) FROM user";
    
    $result = $conn->query($sql);
    $conn->close();
    
    $res = $result->fetch_array();

    if ($res['result'] === '1'){
        echo json_encode(Array('loginStatus' => true));
    } else {
        echo json_encode(Array('loginStatus' => false));
    }
}

function dataHandler($param)
{
    header('Content-Type: application/json');

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dss";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($param === 'all'){
        $sql = "SELECT * FROM siswa";
    } else {
        $sql = "SELECT " . $param . " FROM siswa";
    }
    
    $result = $conn->query($sql);
    $conn->close();

    $i = 0;
    $user = Array();

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            array_push($user, $row);
            //$i++;
        }
        //print_r($user);
        //echo json_encode(array_values($user));
        echo json_encode(utf8ize($user));
        //var_dump($result->fetch_all);
    } else {
        echo json_encode("404");
    }

    
}

?>
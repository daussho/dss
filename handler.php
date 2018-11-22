<?php
# include all model class
foreach (glob("model/*.php") as $filename)
{
    include $filename;
}

# Handler for routing

function beswanHandler()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dss";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Siswa";
    $result = $conn->query($sql);

    $i = 0;
    $user = Array();

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $user[$i] = new UserModel($row["nisn"], $row["nama"], $row["nilairapor"], $row["nem"], $row["kehadiran"], $row["akreditas"], $row["nilaitingkahlaku"]);
            $i++;
        }
    }

    echo json_encode($user);
}

?>
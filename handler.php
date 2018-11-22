<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dss";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nisn = "SELECT nisn FROM Siswa"
$nama = "SELECT nama FROM Siswa"
$nilairapor = "SELECT nilairapor FROM Siswa"
$nem = "SELECT nem FROM Siswa"
$kehadiran = "SELECT kehadiran FROM Siswa"
$akreditas = "SELECT akreditassekolah FROM Siswa"
$nilaitingkahlaku = "SELECT nilaitingkahlaku FROM Siswa"

# include all model class
foreach (glob("model/*.php") as $filename)
{
    include $filename;
}

# Handler for routing

function loginHandler()
{
    $user = new UserModel($nisn, $nama, $nilairapor, $nem, $kehadiran, $akreditas, $nilaitingkahlaku);
    echo json_encode(array(
       'nisn' => $user->__get('nisn'),
       'nama' => $user->__get('nama'),
       'nilairapor' => $user->__get('nilairapor')
       'nem' => $user->__get('nem')
       'kehadiran' => $user->__get('kehadiran')
       'akreditas' => $user->__get('akreditas')
       'nilaitingkahlaku' => $user->__get('nilaitingkahlaku')
    $user = new UserModel('admin', 'admin', 0);
    echo json_encode(array(
       'username' => $user->__get('username'),
       'name' => $user->__get('name'),
       'type' => $user->__get('type')
    ));
}

?>
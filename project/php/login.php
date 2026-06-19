<?php

session_start();

include "db.php";


if (isset($_SESSION['user_email'])) {
    header("Location: main.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../login.html");
    exit();
}


$email = trim($_POST['email'] ?? "");
$password = trim($_POST['password'] ?? "");



if ($email === "" || $password === "") {

    echo "
    <script>
        alert('이메일과 비밀번호를 입력해주세요.');
        location.href='../login.html';
    </script>
    ";

    exit();
}



$email = $conn->real_escape_string($email);


$sql = "SELECT * FROM member WHERE member_email='$email'";
$result = $conn->query($sql);



if ($result && $result->num_rows > 0) {


    $row = $result->fetch_assoc();



    if (password_verify($password, $row['member_pw'])) {


        $_SESSION['user_idx'] = $row['idx'];
        $_SESSION['user_email'] = $row['member_email'];


        echo "
        <script>
            alert('로그인 성공');
            location.href='main.php';
        </script>
        ";

        exit();



    } else {


        echo "
        <script>
            alert('비밀번호가 틀렸습니다.');
            location.href='../login.html';
        </script>
        ";

        exit();

    }



} else {


    echo "
    <script>
        alert('존재하지 않는 이메일입니다.');
        location.href='../login.html';
    </script>
    ";

    exit();

}


$conn->close();

?>
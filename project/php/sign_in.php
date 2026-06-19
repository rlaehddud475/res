<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "db.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $email = trim($_POST['email'] ?? "");
    $password = trim($_POST['password'] ?? "");



    if ($email == "" || $password == "") {

        echo "
        <script>
            alert('이메일과 비밀번호를 입력해주세요.');
            history.back();
        </script>
        ";

        exit();

    }



    if (strlen($password) < 8) {

        echo "
        <script>
            alert('비밀번호는 최소 8자리 이상이어야 합니다.');
            history.back();
        </script>
        ";

        exit();

    }



    $email = $conn->real_escape_string($email);


    $check_sql = "SELECT * FROM member WHERE member_email='$email'";
    $result = $conn->query($check_sql);



    if ($result && $result->num_rows > 0) {


        echo "
        <script>
            alert('이미 존재하는 이메일입니다.');
            history.back();
        </script>
        ";

        exit();

    }



    $hash_pw = password_hash($password, PASSWORD_DEFAULT);



    $sql = "
    INSERT INTO member(member_email, member_pw)
    VALUES('$email','$hash_pw')
    ";



    if ($conn->query($sql)) {


        echo "
        <script>
            alert('회원가입 성공');
                 window.location.href='../login.html';
        </script>
        ";

        exit();


    } else {


        echo "
        <script>
            alert('회원가입 실패');
            history.back();
        </script>
        ";

        exit();

    }

}


$conn->close();

?>
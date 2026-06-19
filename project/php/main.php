<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../css/main.css" />
    <title>예약사이트</title>
  </head>
  <body>
    <?= $_SESSION['user_email']; ?>
    <header>
       <img class="logo" src="../img/logo.png"/>
      <div><a href="logout.php">로그아웃</a></div>
      <div><a href="../res.html">예약하기</a></div>
        <div><a href="../myPage.html">마이페이지</a></div>
    </header>
    <img src="../img/main_img.jpeg" alt="메인베너" />
    <footer><img src="../img/footer.png" alt="하단" /></footer>
  </body>




</html>
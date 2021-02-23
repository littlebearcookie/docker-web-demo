<?php
function curlNAS($user, $pwd)
{
  //init curl
  $ch = curl_init();
  //curl_setopt可以設定curl參數
  //只傳回結果，不輸出在畫面上
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  //設定url
  curl_setopt($ch, CURLOPT_URL, "http://172.16.25.56:8080/cgi-bin/qpkg/COVideo/users.php?cmd=login");
  //設定header
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/x-www-form-urlencoded'));
  //啟用POST
  curl_setopt($ch, CURLOPT_POST, true);
  //傳入POST參數
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array("user" => $user, "pwd" => $pwd)));
  //執行，並將結果存回
  $result = curl_exec($ch);
  //關閉連線
  curl_close($ch);
  return $result;
}
if (isset($_POST['submit'])) {
  $user = $_POST['user'];
  $pwd = $_POST['pwd'];
  $result = curlNAS($user, $pwd);
  var_dump($result);
}
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">

<body>

  <h2>HTML Forms</h2>

  <form method="POST">
    <label for="user">User:</label><br>
    <input type="text" id="user" name="user"><br>
    <label for="pwd">Password:</label><br>
    <input type="password" id="pwd" name="pwd"><br><br>
    <input type="submit" name="submit" value="Submit">
  </form>


</body>

</html>
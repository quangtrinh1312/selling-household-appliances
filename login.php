<?php 
include_once 'inc/header.inc';
include_once 'inc/left-content.inc';
?>
<div id="content">
      <h1>Tài Khoản</h1>
      <div class="login-content">
        <div class="left">
          <h2>Tạo tài khoản mới</h2>
          <div class="content">
            <p><b>Register Account</b></p>
            <a class="button" href="">Continue</a></div>
        </div>
        <div class="right">
          <h2>Returning Customer</h2>
          <form enctype="multipart/form-data" method="post" action="#">
            <div class="content">
              <p>I am a returning customer</p>
              <b>E-Mail Address:</b><br>
              <input type="text" value="" name="email">
              <br>
              <br>
              <b>Password:</b><br>
              <input type="password" value="" name="password">
              <br>
              <br>
              <a href="#">Forgotten Password</a><br>
              <br>
              <input type="submit" class="button" value="Login">
            </div>
          </form>
        </div>
      </div>
    



<?php 
include_once 'inc/footer.inc';
?>
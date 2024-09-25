  <link rel="stylesheet" href="assets/Lading_Page/LPstyle.css" />
<?php  include("app/parts/Loading.php")?>
    <main>
      <div class="title">
        <div class="container">
            <h1>
                <span>よ</span>
                <span>う</span>
                <span>こ</span>
                <span>そ</span>
                <span>！</span>
            </h1>
        </div>
        <p>Github管理アプリを利用しよう</p>
      </div>
      <div class="button-area">
        <form method="POST">
          <input type="hidden" name="isLoginSelected" value="true">
          <input type="hidden" name="isCreateSelected" value="false">
          <button class="login">ログイン</button>
        </form>
        <form method="POST">
          <input type="hidden" name="isCreateSelected" value="true">
          <input type="hidden" name="isLoginSelected" value="false">
          <button>アカウントを作成</button>
        </form> 
      </div>
  </main>
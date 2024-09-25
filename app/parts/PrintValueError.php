<style>
  .errorMessage {
    color: #000;
    font-size: 16px;
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    padding: 15px;
    border-radius: 5px;
    position: relative;
    margin:auto;
    margin-top: 50px;
    margin-bottom: 0;
    width: 773px;
    transition: all 0s;
  }

  .dark-modeError {
    color: #fff !important;
    background: #1f1f1f !important;
  }

  .errorMessage .close-btn {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    color: #721c24;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
  }

  .errorMessage .close-btn:hover {
    color: #f5c6cb;
  }
</style>

  <script type="text/javascript">
  var hoge = JSON.parse('<?php echo json_encode($error_message)?>');
  console.log(hoge);
  </script>


<!-- エラー文吐き出し -->
<?php if($error_message && (isset($_POST["LoginButton"])) || isset($_POST["CreateButton"])) :?>
  <div class="errorMessage">
    <?php if(isset($_POST["CreateButton"])) : echo "[Account Creation Error]　"?>
      <?php foreach ($error_message as $error) :?>
        <?php echo $error ?>
      <?php endforeach; ?>
      <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    <?php endif ?>
    <?php if(isset($_POST["LoginButton"])) : echo "[Login Error]　"?>
      <?php foreach ($error_message as $error) :?>
        <?php echo $error ?>
      <?php endforeach; ?>
      <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    <?php endif ?>
  </div>
<?php endif ?>


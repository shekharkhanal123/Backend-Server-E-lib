<?php
if(isset($_SESSION['mess'])){
  echo "<div class='message'><p><b>SUCCESS:  </b>".$_SESSION['mess']."</p></div>";
  unset($_SESSION['mess']);
}

elseif(isset($_SESSION['err'])){
  echo "<div class='message'><p><b>ERROR:  </b>".$_SESSION['err']."</p></div> ";
  unset($_SESSION['err']);
}

elseif(isset($_SESSION['war'])){
  echo "<div class='message'><p><b>WARNING: </b>".$_SESSION['war']."</p></div> ";
  unset($_SESSION['war']);
}
?>
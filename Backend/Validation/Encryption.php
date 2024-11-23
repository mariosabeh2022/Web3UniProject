<?php 
  function encrypt($password){
    $md5pass = md5($password);
    $sha1pass=sha1($md5pass);
    $cryptpass=crypt($sha1pass,'st#15%42$@!!*^$%Gdgjijrds=#42');
return $cryptpass;
  }
    


?>

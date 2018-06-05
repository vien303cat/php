<?php

  echo $_POST["first"]."<br>";
  
  for($i=0 ; $i<count($_POST["second"]) ; $i++)
  {
   echo $_POST["second"][$i]."<br>";
  }
  
  if(!empty($_POST["third"]))
  {
  echo $_POST["third"]."<br>";
  }
  
?>
<?php 

include("header.php");

if($class == "S1" || $class="S2"){
  include("new_curriculum_olevel_report.php");
}
elseif($class == "S3" || $class=="S4"){
  include("olevel_report.php");
}
elseif($class="S5" || $class=="S6"){
  include("alevel_report.php");
}

include("footer.php");


?>
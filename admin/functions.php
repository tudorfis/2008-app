<?php
  
  include 'config/config.php';
  include 'include/classes/AbstractClass.class.php';
  include 'include/classes/User.class.php';
  include 'include/classes/Participanti.class.php';
  include 'include/classes/HtmlBuilder.class.php';

  /**
  * Return Da sau Ba in 
  * functie de 1 sau zero
  * @param mixed $in
  */
  function showDaSauNu($in) {
      return ($in == 1) ? 'DA' : 'NU';
  }
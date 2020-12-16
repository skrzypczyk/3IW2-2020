<?php

//Fichier 1 test.php

$test = 1;

------------------------------------------------------------

//Fichier 2  index.php

include "test.php";
include "test2.php";





------------------------------------------------------------

//Fichier 3  test2.php


echo $test;
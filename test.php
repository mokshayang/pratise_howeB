<h3>可變變數</h3>
<?php
$var2="Hello";
$$var2="神奇";
echo $Hello;
$array=['a','b','c','d'];
foreach ($array as $k => $v) {
    $$v = ($k+1)*10;
    echo  $$v;
}
echo $a;
echo $b;
echo $c;
echo $d;
// echo $var1;
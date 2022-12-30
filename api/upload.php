<?php
include "base_test.php";
$table=$_POST['table'];
dd($$table);
$row=$$table->find($_POST['id']);



if(!empty($_FILES['img']['tmp_name'])){
    //沒做刪除圖片
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    $img=$_FILES['img']['name'];
    $row['img']=$_FILES['img']['name'];//更新名字
    $$table->save($row);//update
}

to("../back.php?do=".lcfirst($table));
?>
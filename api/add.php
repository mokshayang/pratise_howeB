<?php
include "base_test.php";
$table=$_POST['table'];
dd($_POST);
$data=[];

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    // $img=$_FILES['img']['name'];
    $data['img']=$_FILES['img']['name'];
}

switch($table){
    case "Admin":
        $data['acc']=$_POST['acc'];
        $data['pw']=$_POST['pw'];
        break;
    case "Menu":
        $data['name']=$_POST['name'];
        $data['href']=$_POST['href'];
        $data['sh']=1;
        $data['parent']=0;
        break;
        default:
        if(isset($_POST['text']) && !empty($_POST['text'])){
            $data['text']=$_POST['text'];
        }
        $data['sh']=($table=="Title")?0:1;//抓Title from sh=0 ，其他的都是1
}
// $text=$_POST['text'];

// $Title->save(['img'=>$img,'text'=>$text,'sh'=>0]);
$$table->save($data);
to("../back.php?do=".lcfirst($table));

<?php
include_once "base_test.php";
// dd($_POST);
//要丟改 del sh text

// foreach($_POST['id'] as $idx=>$id){
//     $row = $Title->find($id);
//     $row['text']=$_POST['text'][$idx];
//     $Title->save($row);
// }
// $row1 = $Title->find($_POST['sh']);

// foreach($_POST['id'] as $id) {
//     $row2=$Title->find($id);
//     $row2['sh']=0;
//     $Title->save($row2);
// }

// $row1['sh']=1;
// $Title->save($row1);

// foreach($_POST['del'] as $id){
//     $Title->del($id);
// }

// if(empty($Title->find(['sh'=>1]))){
//     $radio = $Title->min('id');
//     $Title->save(['sh'=>1,'id'=>$radio]);
//     // echo $raido;
// }

$table = $_POST['table'];
dd($$table);
dd($_POST);
foreach ($_POST['id'] as $idx => $id) {
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        $$table->del($id);//$$table === $Title ....form 過來的 名稱 $Title 以建立在 base_test/.php
    } else {
        $row = $$table->find($id); //單筆進each
        switch ($table) {
            case "Title":
                $row['text'] = $_POST['text'][$idx]; //db[text] = form 過來的
                $row['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $id) ? 1 : 0;
                break;
            case "Admin":
                $row['acc']=$_POST['acc'];
                $row['pw']=$_POST['pw'];
                break;
            case "Menu":
                $row['name']=$_POST['name'][$idx];
                $row['href']=$_POST['href'][$idx];
                $row=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                break;
            default:
                if(isset($_POST['text'])){
                $row['text'] = $_POST['text'][$idx]; //db[text] = form 過來的
                }
                $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
        }

        $$table->save($row);
    }
}

//資料修改
if (!empty($Title->find(['sh' => 0]))) {
    if (empty($Title->find(['sh' => 1]))) {
        $radio = $Title->min('id');
        $Title->save(['sh' => 1, 'id' => $radio]);
    }
}

to("../back.php?do=" . lcfirst($table));

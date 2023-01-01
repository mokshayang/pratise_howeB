<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">選單管理</p>
    <?php
    // dd($_POST);//$_POST['name']，兩筆資料，有相同的鑑值 ['name']
    ?>
    <form method="post" action="./api/edit.php">
        <table width="100%" class="cent">
            <tbody>
                <tr class="yel">
                    <td width="30%">主選單名單</td>
                    <td width="30%">選單連結網址</td>
                    <td width="10%">次選單數</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $rows = $Menu->all(["parent"=>0]);
                foreach ($rows as $row) {
                    $checked = ($row['sh'] == 1) ? "checked" : "";
                    // echo $checked;
                ?>
                    <tr>
                    
                        <td>
                            <input type="text" name="name[]" value="<?= $row['name']; ?>">
                        </td>
                        <td>
                            <input type="text" name="href[]" value="<?= $row['href']; ?>">
                        </td>
                        <td><?=$Menu->count(['parent'=>$row['id']])?></td>
                        <td>
                            <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= $checked ?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>
                        <td>
                            <input type="button" value="編輯次選單" onclick="op('#cover','#cvr','./modal/submenu.php?id=<?= $row['id']; ?>')">
                            <!-- N筆資料 一起傳送，但redio 與 checkbox 無法辨別 所以傳送隱藏欄位 id 與其對應共同的索引-->
                            <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                        </td>
                    </tr>

                <?php }  ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button" onclick="op('#cover','#cvr','./modal/menu.php')" value="新增主選單">
                    </td>
                    <td class="cent">
                        <input type="hidden" name="table" value="Menu">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>
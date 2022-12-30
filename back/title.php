<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">網站標題管理</p>
    <?php
    // dd($_POST);//$_POST['name']，兩筆資料，有相同的鑑值 ['name']
    ?>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%">網站標題</td>
                    <td width="23%">替代文字</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $rows = $Title->all();
                foreach ($rows as $row) {
                    $checked = ($row['sh'] == 1) ? "checked" : "";
                    // echo $checked;
                ?>
                    <tr>
                        <td>
                            <img src="./upload/<?= $row['img'] ?>" style="width:300px; height:30px;" alt="">
                        </td>
                        <td>
                            <input type="text" name="text[]" value="<?= $row['text']; ?>">
                        </td>
                        <td>
                            <input type="radio" name="sh" value="<?= $row['id']; ?>" <?= $checked ?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>
                        <td>
                            <input type="button" value="更新圖片" onclick="op('#cover','#cvr','./modal/upload_title.php?id=<?= $row['id']; ?>')">
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
                        <input type="button" onclick="op('#cover','#cvr','./modal/title.php')" value="新增網站標題圖片">
                    </td>
                    <td class="cent">
                        <input type="hidden" name="table" value="Title">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>
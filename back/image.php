<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">校園映像資料管理</p>
    <?php
    // dd($_POST);//$_POST['name']，兩筆資料，有相同的鑑值 ['name']
    ?>
    <form method="post" action="./api/edit.php">
        <table width="100%" class="cent">
            <tbody>
                <tr class="yel">
                    <td width="70%">校園映像資料圖片</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php

                //分頁開始
                
                $total = $Image->count(); //總筆數
                $num = 3; //每頁筆數 
                $pages = ceil($total / $num); //總頁數
                $now = $_GET['p'] ?? 1; //頁數初始化
                $start = ($now - 1) * $num; //開始的地方 dbSQL 從0開始
                $rows = $Image->all("limit $start,$num");
                foreach ($rows as $row) {
                    $checked = ($row['sh'] == 1) ? "checked" : "";
                    // echo $checked;
                ?>
                    <tr>
                        <td>
                            <img src="./upload/<?= $row['img'] ?>" style="width:100px; height:68px;" alt="">
                        </td>
                        <td>
                            <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= $checked ?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>
                        <td>
                            <input type="button" value="更換動畫" onclick="op('#cover','#cvr','./modal/upload_image.php?id=<?= $row['id']; ?>')">
                            <!-- N筆資料 一起傳送，但redio 與 checkbox 無法辨別 所以傳送隱藏欄位 id 與其對應共同的索引-->
                            <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                        </td>
                    </tr>

                <?php }  ?>
            </tbody>
        </table>
        <style>
            .cent a {
                text-decoration: none;
            }
        </style>
        <div class="cent">
            <?php
            if (($now - 1) > 0) {
                echo "<a href='?do=$do&p=($now-1)'>";
                echo " < </a>";
            }
            for ($i = 1; $i <= $pages; $i++) {
                $size = ($now == $i) ? "24px" : "20px";
                echo "<a href='?do=$do&p=$i' style='font-size:$size;'>";
                echo "&nbsp;$i&nbsp;" ;
                echo "</a>";
            }
            if (($now + 1) <= $pages ) {
                echo "<a href='?do=$do&p=($now+1)'>";
                echo " > </a>";
            }
            ?>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button" onclick="op('#cover','#cvr','./modal/image.php')" value="新增動畫圖片">
                    </td>
                    <td class="cent">
                        <input type="hidden" name="table" value="Image">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>
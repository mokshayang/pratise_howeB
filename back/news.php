<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">最新消息管理</p>
    <?php
    // dd($_POST);//$_POST['name']，兩筆資料，有相同的鑑值 ['name']
    ?>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    
                    <td width="80%">最新消息</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                 $table=$_GET['table'];
                 $total = $$table->count(); //總筆數
                 $num = 3; //每頁筆數 
                 $pages = ceil($total / $num); //總頁數
                 $now = $_GET['p'] ?? 1; //頁數初始化
                 $start = ($now - 1) * $num; //開始的地方 dbSQL 從0開始
                 $rows = $$table->all("limit $start,$num");//建立查詢
                
                foreach ($rows as $row) {
                    $checked = ($row['sh'] == 1) ? "checked" : "";
                    // echo $checked;
                ?>
                    <tr>
                       
                        <td style="width:95;height:62px;">
                           <textarea name="text[]" style="width:95%;height:62px;"><?=$row['text']?></textarea>
                        </td>
                        <td >
                            <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= $checked ?>>
                        </td>
                        <td >
                            <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>
                        <td>
                           
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
            echo "<a href='?do=$do&table=" . ucfirst($do) . "&p=" . ($now - 1) . "'>";
            echo " < </a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $size = ($now == $i) ? "24px" : "20px";
            echo "<a href='?do=$do&table=" . ucfirst($do) . "&p=$i' style='font-size:$size;'>";
            echo " &nbsp; $i &nbsp; </a>";
        }
        if (($now + 1) <= $pages) {
            echo "<a href='?do=$do&table=" . ucfirst($do) . "&p=" . ($now + 1) . "'>";
            echo " > </a>";
        }
            ?>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button" onclick="op('#cover','#cvr','./modal/news.php')" value="新增最新消息">
                    </td>
                    <td class="cent">
                        <input type="hidden" name="table" value="News">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>
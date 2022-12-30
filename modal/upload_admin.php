<h3>新增管理者帳號</h3>
<hr>
<form action="./api/upload.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>標題區圖片 :</td>
            <td>
                <input type="file" name="img">
            </td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <input type="hidden" name="table" value="Admin">
    <input type="reset" value="重置">
    <input type="submit" value="更新">
</form>
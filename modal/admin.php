<style>
    *{
        margin:auto;
        text-align: center;
    }
</style>

<h3>管理者標題圖片</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data" >
    <table >
      
        <tr>
            <td>新增帳號 :</td>
            <td>
                <input type="text" name="acc">
            </td>
        </tr>
        <tr>
            <td>新增密碼 : </td>
            <td>
                <input type="password" name="pw">
            </td>
        </tr>
        <tr>
            <td>確認帳號 : </td>
            <td>
                <input type="password" name="pw2">
            </td>
        </tr>
    </table>
    <input type="reset" value="重置">
    <input type="hidden" name="table" value="Admin">
    <input type="submit" value="新增">
</form>
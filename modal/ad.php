<h3>新增動態文字廣告</h3>
<hr>
<form action="./api/add.php" method="post">
    <table>
      
        <tr>
            <td>動態文字廣告 :</td>
            <td>
                <input type="text" name="text">
            </td>
        </tr>
    </table>
    <input type="reset" value="重置">
    <input type="hidden" name="table" value="Ad">
    <input type="submit" value="新增">
</form>
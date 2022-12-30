<h3>新增最新消息</h3>
<hr>
<form action="./api/add.php" method="post" >
    <table>
      
        <tr>
            <td>新增最新消息 :</td>
            <td>
               <textarea name="text" cols="30" rows="10"></textarea>
            </td>
        </tr>
    </table>
    <input type="reset" value="重置">
    <input type="hidden" name="table" value="News">
    <input type="submit" value="新增">
</form>
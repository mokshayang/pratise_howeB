<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli">新增動態文字管理</p>
	<?php
	// dd($_POST);//$_POST['name']，兩筆資料，有相同的鑑值 ['name']
	?>
	<form method="post" action="./api/edit.php">
		<table width="100%">
			<tbody>
				<tr class="yel">

					<td width="70%">替代文字</td>
					<td width="10%">顯示</td>
					<td width="10%">刪除</td>
					<td></td>
				</tr>
				<?php
				$rows = $Ad->all();
				foreach ($rows as $row) {
					$checked = ($row['sh'] == 1) ? "checked" : "";
					// echo $checked;
				?>
					<tr>
						<td>
							<input type="text" name="text[]" value="<?= $row['text']; ?>" style="width:90%;">
						</td>
						<td>
							<input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= $checked ?>>
						</td>
						<td>
							<input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
						</td>
						<input type="hidden" name="id[]" value="<?= $row['id']; ?>">
					</tr>

				<?php }  ?>
			</tbody>
		</table>
		<table style="margin-top:40px; width:70%;">
			<tbody>
				<tr>
					<td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/ad.php')" value="新增動態文字廣告">
					</td>
					<td class="cent">
					<input type="hidden" name="table" value="Ad">
						<input type="submit" value="修改確定">
						<input type="reset" value="重置">
					</td>
				</tr>
			</tbody>
		</table>

	</form>
</div>
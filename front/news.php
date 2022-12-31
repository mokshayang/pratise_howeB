<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<marquee scrolldelay="120" direction="left" scrollamount="15" style="position:absolute; width:100%; height:40px;">
		<!-- 動態文字 Ad -->
		<?php
		$ads = $Ad->all(['sh' => 1]);
		foreach ($ads as $key => $value) {
			echo $value['text'];
			echo "&nbsp;&nbsp;&nbsp;";
		}
		?>
	</marquee>
	<div style="height:32px; display:block;"></div>
	<?php
	$total = $News->count(); //總筆數
	$num = 5; //每頁筆數 
	$pages = ceil($total / $num); //總頁數
	$now = $_GET['p'] ?? 1; //頁數初始化
	$start = ($now - 1) * $num; //開始的地方 dbSQL 從0開始
	$news = $News->all(['sh' => 1], "limit $start,$num"); //建立查詢
	?>
	<ol start="<?= $start + 1 ?>">
		<?php
		foreach ($news as $key => $value) {
		?>
			<li class="sswww">
				<?= mb_substr($value['text'], 0, 24) . "..." ?>
				<span class="all" style="display:none;"><?= $value['text'] ?></span>
			</li>
		<?php } ?>
	</ol>
	<!--正中央-->
	<style>
		.cent a {
			text-decoration: none;
		}
	</style>
	<div class="cent">
		<?php
		if (($now - 1) > 0) {
			echo "<a href='?do=$do&p=" . ($now - 1) . "'>";
			echo " < </a>";
		}
		for ($i = 1; $i <= $pages; $i++) {
			$size = ($now == $i) ? "24px" : "20px";
			echo "<a href='?do=$do&p=$i' style='font-size:$size;'>";
			echo " &nbsp; $i &nbsp; </a>";
		}
		if (($now + 1) <= $pages) {
			echo "<a href='?do=$do&p=" . ($now + 1) . "'>";
			echo " > </a>";
		}
		?>
	</div>

</div>
<div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
	$(".ssaa li").hover(
		function() {
			$("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
			$("#altt").show()
		}
	)
	$(".ssaa li").mouseout(
		function() {
			$("#altt").hide()
		}
	)
</script>
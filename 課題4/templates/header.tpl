<div class="header-logo">
	<a href='index.php'>掲示板</a>
</div>
<div class="header-list">
	<ul>
		<li><a href="./entry.php">ユーザ登録</a></li>
		{if !$signed}
		<li><a href="./login.php">ログイン</a></li>
		{else}
		<li><a href="./logout.php">ログアウト</a></li>
		<li><a href="./mypage.php">マイページ</a></li>
		{/if}
	</ul>
</div>
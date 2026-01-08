<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../pageresources/landingpage.css">
	<link rel="icon" type=image/x-icon href="../pageresources/svg/logo.svg">
	<script type="text/javascript" src="../pageresources/landing.js"></script>
	<title>Modpack Creator</title>
</head>
<body>
	<div id="cover" onmouseover="hideCover()">
		<div id="title-cover-container">
			<img id="spinning-logo" src="pageresources/svg/logo.svg">
			<h1 id="cover-title">luningor's <b>modpackCreator</b></h1>
		</div>
	</div>
	<div id="main-title-container">
		<div id="main-title-div">
			<img id="main-logo" src="../pageresources/svg/logo.svg">
			<h1 id="main-title">luningor's <b>modpackCreator</b></h1>
		</div>
		<span id="title-decorator"></span>
	</div>
	<div id="divider">
		<div class="list-item">
			<button class="main-links" onclick="showList(this)">
				<p>Viewer</p>
				<img src="pageresources/svg/arrow_drop_down.svg">
			</button>
			<ul class="hidden-list">
				<li><a href="#">Item Viewer</a></li>
				<li><a href="#">Mob Viewer</a></li>
				<li><a href="#">Recipe Viewer</a></li>
				<li><a href="#">Loot Table Viewer</a></li>
			</ul>
		</div>
		<div class="list-item">
			<button class="main-links" onclick="showList(this)">
				<p>Editors</p>
				<img src="pageresources/svg/arrow_drop_down.svg">
			</button>
			<ul class="hidden-list">
				<li><a href="#">Config Editor</a></li>
				<li><a href="#">Recipe Editor</a></li>
				<li><a href="#">Obliterate</a></li>
				<li><a href="#">Loot Editor</a></li>
				<li><a href="#">Tag Editor</a></li>
				<li><a href="#">Tier Editor</a></li>
				<li><a href="#">Stages Editor</a></li>
				<li><a href="#">Attribute Requirement Editor</a></li>
				<li><a href="#">Super Duper Ultra Hyper Tamer Config</a></li>
				<li><a href="#">Structurify Config</a></li>
			</ul>
		</div>
		<div class="list-item">
			<a class="main-links" href="config.php">
				<p>Config</p>
				<img src="pageresources/svg/arrow_drop_down.svg">
			</a>
		</div>
		<div class="list-item">
			<button class="main-links" onclick="showList(this)">
				<p>Import</p>
				<img src="pageresources/svg/arrow_drop_down.svg">
			</button>
			<ul class="hidden-list">
				<li><a href="#">Import Generated Data</a></li>
				<li><a href="#">Import Folders</a></li>
				<li><a href="#">Import Existing Modpack Zip</a></li>
			</ul>
		</div>
		<div class="list-item">
			<button class="main-links" onclick="showList(this)">
				<p>Export</p>
				<img src="pageresources/svg/arrow_drop_down.svg">
			</button>
			<ul class="hidden-list">
				<li><a href="#">Export Generated Data</a></li>
				<li><a href="#">Export Modpack Zip</a></li>
			</ul>
		</div>
	</div>
</body>
</html>
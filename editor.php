<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../pageresources/style.css">
	<script type="text/javascript" src="../pageresources/functions.js"></script>
	<title>Modpack Creator</title>
</head>
<body>
	<div id="sidebar"></div>
	<div id="selector">
		<button class="selector">View</button>
		<button class="selector">Edit</button>
		<button class="selector">Config</button>
		<button class="selector">Load</button>
	</div>
	<div id="config" class="tabs">
		<!-- Compat toggles -->
	</div>
	<form id="loaders" class="tabs">
		<div id="loaders-selector">
			<label class="loader-text" for="modpack-zip-loader">Modpack</label>
			<label class="loader-text" for="item-registry-loader">Item IDs</label>
			<label class="loader-text" for="fluid-registry-loader">Fluid IDs</label>
			<label class="loader-text" for="item-icons-loader">Display Icons</label>
			<label class="loader-text" for="recipes-loader">Recipes</label>
			<label class="loader-text" for="loot-table-loader">Loot Tables</label>
			<label class="loader-text" for="villager-trades-loader">Villager Trades</label>
			<label class="loader-text" for="emc-loader">EMC</label>
			<input type="radio" name="loaderType" id="modpack-zip-loader" value="modpack-zip" hidden>
			<input type="radio" name="loaderType" id="item-registry-loader" value="item-registry" hidden>
			<input type="radio" name="loaderType" id="fluid-registry-loader" value="fluid-registry" hidden>
			<input type="radio" name="loaderType" id="item-icons-loader" value="item-icons" hidden>
			<input type="radio" name="loaderType" id="recipes-loader" value="recipes" hidden>
			<input type="radio" name="loaderType" id="loot-table-loader" value="loot-table" hidden>
			<input type="radio" name="loaderType" id="villager-trades-loader" value="villager-trades" hidden>
			<input type="radio" name="loaderType" id="emc-loader" value="emc" hidden>
		</div>
		<input type="file" name="loaderFile" multiple>
		<input type="button" name="load">
	</form>
	<div id="viewer" class="tabs">
		<div id="viewer-item-list"></div>
		<div id="viewer-recipes-list"></div>
		<div id="viewer-loot-tables"></div>
		<div id="viewer-villager-trades"></div>
		<div id="viewer-item-recipes"></div>
	</div>
	<div id="editor" class="tabs">
		<div id="editor-item-list"></div>
		<div id="editor-item-obliterator"></div>
		<div id="editor-item-replacer"></div>
		<div id="editor-fluid-replacer"></div>
		<div id="editor-recipes-list"></div>
		<div id="editor-loot-tables"></div>
		<div id="editor-villager-trades"></div>
		<div id="editor-item-recipes"></div>
	</div>
</body>
</html>
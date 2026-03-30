<?php 
// Retrieves recipe and generates a html display for it.
include_once "file_to_json.php";

function gen_recipe_html($recipeID) {
	$results = "";
	if(!is_file("../savedData/recipes/".$recipeID.".json")) return $results;
	$recipeJSON = file_to_json("../savedData/recipes/".$recipeID.".json");
	switch($recipeJSON->type) {
		case 'minecraft:blasting':
		case 'minecraft:campfire_cooking':
		case 'minecraft:smoking':
		case 'minecraft:smelting':
		case 'minecraft:stonecutting':
			// getItemsFromIngredient($recipeJSON->ingredient, $results);
			break;
		case 'minecraft:crafting_shaped':
		case 'create:mechanical_crafting':
			// foreach($recipeJSON->key as $key)
				// getItemsFromIngredient($key, $results);
			break;
		case 'minecraft:crafting_shapeless':
		case 'create:mixing':
		case 'create:cutting':
		case 'create:crushing':
		case 'create:milling':
		case 'create:pressing':
		case 'create:splashing':
		case 'create:sandpaper_polishing':
			// foreach($recipeJSON->ingredients as $ingredient)
				// getItemsFromIngredient($ingredient, $results);
			break;
		case 'minecraft:smithing_transform':
		case 'minecraft:smithing_trim':
			// getItemsFromIngredient($recipeJSON->template, $results); // Template
			// getItemsFromIngredient($recipeJSON->addition, $results); // Material
			// getItemsFromIngredient($recipeJSON->base, $results); // Base
			break;
		case 'create:compacting':
		default:
			echo(`Unknown recipe type: {$recipeJSON->type}`);
			break;
	}
	return $results;
}
?>
<?php
include_once "file_to_json.php";
include_once "get_x_from_tag.php";

// These functions are used to get a recipe's potential input, NOT input combinations, nor organized data.
// The get_recipe_data.php functions are for that, or plainly parsing the actual recipe JSON

function getItemsFromIngredientEntry($ingEntry, &$results) {
	if(isset($ingEntry->item)) { // It's an item
		if(!in_array($ingEntry->item, $results))
			$results[] = $ingEntry->item;
	}
	else if(isset($ingEntry->tag)) { // It's a tag
		$items = get_items_from_tag($ingEntry->tag);
		foreach($items as $item)
			if(!in_array($item, $results))
				$results[] = $item;
	}
	else {
		// ?? Custom dispatch
	}
}

function getItemsFromIngredient($ingredient, &$results) {
	if(!is_array($ingredient)) // Single ingredient
		getItemsFromIngredientEntry($ingredient, $results);
	else // Multiple ingredients
		foreach($ingredient as $ing)
			getItemsFromIngredientEntry($ing, $results);
}

function get_recipe_item_ingredients($recipeID) {
	$results = [];
	if(!is_file("../savedData/recipes/".$recipeID.".json")) return $results;
	$recipeJSON = file_to_json("../savedData/recipes/".$recipeID.".json");
	switch($recipeJSON->type) {
		case 'minecraft:blasting':
		case 'minecraft:campfire_cooking':
		case 'minecraft:smoking':
		case 'minecraft:smelting':
		case 'minecraft:stonecutting':
			getItemsFromIngredient($recipeJSON->ingredient, $results);
			break;
		case 'minecraft:crafting_shaped':
		case 'create:mechanical_crafting':
			foreach($recipeJSON->key as $key)
				getItemsFromIngredient($key, $results);
			break;
		case 'minecraft:crafting_shapeless':
		case 'create:mixing':
		case 'create:cutting':
		case 'create:crushing':
		case 'create:milling':
		case 'create:pressing':
		case 'create:splashing':
		case 'create:sandpaper_polishing':
			foreach($recipeJSON->ingredients as $ingredient)
				getItemsFromIngredient($ingredient, $results);
			break;
		case 'minecraft:smithing_transform':
		case 'minecraft:smithing_trim':
			getItemsFromIngredient($recipeJSON->template, $results); // Template
			getItemsFromIngredient($recipeJSON->addition, $results); // Material
			getItemsFromIngredient($recipeJSON->base, $results); // Base
			break;
			break;
		case 'create:compacting':
		default:
			echo(`Unknown recipe type: {$recipeJSON->type}`);
			break;
	}
	return $results;
}

function get_recipe_item_results($recipeID) {
	$results = [];
	if(!is_file("../savedData/recipes/".$recipeID.".json")) return $results;
	$recipeJSON = file_to_json("../savedData/recipes/".$recipeID.".json");
	switch($recipeJSON->type) {
		case 'minecraft:blasting':
		case 'minecraft:campfire_cooking':
		case 'minecraft:smoking':
		case 'minecraft:smelting':
			$item = isset($recipeJSON->result->item) ? $recipeJSON->result->item : $recipeJSON->result; // Can have count
			$results[] = $item; // Results should be single items afaik
			break;
		case 'minecraft:crafting_shaped':
		case 'minecraft:crafting_shapeless':
		case 'minecraft:smithing_transform':
		case 'create:mechanical_crafting':
			$results[] = $recipeJSON->result->item;
			break;
		case 'minecraft:stonecutting':
			$results[] = $recipeJSON->result;
			break;
		case 'minecraft:smithing_trim':
		// Returns same item, screws up EMC calculations later
			break;
		case 'create:milling':
		case 'create:crushing':
		case 'create:pressing':
		case 'create:cutting':
		case 'create:splashing':
		case 'create:sandpaper_polishing':
			foreach($recipeJSON->results as $resultItem)
				$results[] = $resultItem->item;
			break;
		case 'create:mixing':
			foreach($recipeJSON->results as $resultItem)
				if(isset($resultItem->item)) // Can be fluid
					$results[] = $resultItem->item;
			break;
		case 'create:compacting':
		default:
			echo(`Unknown recipe type: {$recipeJSON->type}`);
			break;
	}
	return $results;
}

// Implementation pending
function get_recipe_fluid_ingredients($recipeID) {
	$results = [];
	if(!is_file("../savedData/recipes/".$recipeID.".json")) return $results;
	$recipeJSON = file_to_json("../savedData/recipes/".$recipeID.".json");
	switch($recipeJSON->type) {
		case 'minecraft:crafting_shaped':
		case 'minecraft:crafting_shapeless':
		case 'minecraft:campfire_cooking':
		case 'minecraft:smoking':
		case 'minecraft:smelting':
		case 'minecraft:blasting':
		case 'minecraft:stonecutting':
		case 'minecraft:smithing_trim':
		case 'minecraft:smithing_transform':
			// Minecraft recipes don't have fluid inputs by default
		case 'create:mechanical_crafting':
		case 'create:milling':
		case 'create:crushing':
		case 'create:cutting':
		case 'create:sandpaper_polishing':
			// So do these create recipe types
			break;
		case 'create:pressing':
		case 'create:splashing':
		case 'create:mixing':
		case 'create:compacting':
		default:
			break;
	}
	return $results;
}

// Implementation pending
function get_recipe_fluid_results($recipeID) {
	$results = [];
	if(!is_file("../savedData/recipes/".$recipeID.".json")) return $results;
	$recipeJSON = file_to_json("../savedData/recipes/".$recipeID.".json");
	switch($recipeJSON->type) {
		case 'minecraft:crafting_shaped':
		case 'minecraft:crafting_shapeless':
		case 'minecraft:campfire_cooking':
		case 'minecraft:smoking':
		case 'minecraft:smelting':
		case 'minecraft:blasting':
		case 'minecraft:stonecutting':
		case 'minecraft:smithing_trim':
		case 'minecraft:smithing_transform':
			// Minecraft recipes don't have fluid outputs by default
		case 'create:mechanical_crafting':
		case 'create:milling':
		case 'create:crushing':
		case 'create:cutting':
		case 'create:sandpaper_polishing':
			// So do these create recipe types
			break;
		case 'create:pressing':
		case 'create:splashing':
		case 'create:mixing':
		case 'create:compacting':
		default:
			break;
	}
	return $results;
}

get_recipe_item_ingredients('create/crushing/aluminum_ore');
?>
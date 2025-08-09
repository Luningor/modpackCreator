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
			getItemsFromIngredient($recipeJSON->ingredient, $results);
			break;
		case 'minecraft:crafting_shaped':
			foreach($recipeJSON->key as $key)
				getItemsFromIngredient($key, $results);
			break;
		case 'minecraft:crafting_shapeless':
			foreach($recipeJSON->ingredients as $ingredient)
				getItemsFromIngredient($ingredient, $results);
			break;
		case 'minecraft:smithing_transform':
		case 'minecraft:smithing_trim':
			// Template
			getItemsFromIngredient($recipeJSON->template, $results);
			// Material
			getItemsFromIngredient($recipeJSON->addition, $results);
			// Base
			getItemsFromIngredient($recipeJSON->base, $results);
			break;
		case 'minecraft:stonecutting':
			getItemsFromIngredient($recipeJSON->ingredient, $results);
			break;
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
			$item = isset($recipeJSON->result->item) ? $recipeJSON->result->item : $recipeJSON->result;
			$results[] = $item; // Results should be single items afaik
			break;
		case 'minecraft:crafting_shaped':
		case 'minecraft:crafting_shapeless':
		case 'minecraft:smithing_transform':
			$results[] = $recipeJSON->result->item;
			break;
		case 'minecraft:stonecutting':
			$results[] = $recipeJSON->result;
			break;
		case 'minecraft:smithing_trim':
		// Returns same item, screws up EMC calculations later
			break;
		default:
			echo(`Unknown recipe type: {$recipeJSON->type}`);
			break;
	}
	return $results;
}

function get_recipe_fluid_ingredients($recipeID) {
	return [];
	$results = [];
	if(!is_file("../savedData/recipes/".$recipeID.".json")) return $results;
}

function get_recipe_fluid_results($recipeID) {
	return [];
	$results = [];
	if(!is_file("../savedData/recipes/".$recipeID.".json")) return $results;	
}
?>
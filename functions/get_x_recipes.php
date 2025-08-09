<?php
function get_item_recipes_as_result($itemID) {
	$results = [];
	if(!is_file('../generatedData/itemData.json'))
		initialize_generated_data();
	$savedData = file_to_json('../generatedData/itemData.json');
	return $savedData->data->$itemID->recipes_result;
}

function get_item_recipes_as_ingredient($itemID) {
	$results = [];
	if(!is_file('../generatedData/itemData.json'))
		initialize_generated_data();
	$savedData = file_to_json('../generatedData/itemData.json');
	return $savedData->data->$itemID->recipes_ingredient;
}

function get_item_recipes($itemID) {
	$results = [];
	if(!is_file('../generatedData/itemData.json'))
		initialize_generated_data();
	$as_ingredient = get_item_recipes_as_ingredient($itemID);
	$as_result = get_item_recipes_as_result($itemID);
	$results = array_merge($as_ingredient, $as_result);
	return results;
}

function get_fluid_recipes_as_result($fluidID) {
	$results = [];
	if(!is_file('../generatedData/fluidData.json'))
		initialize_generated_data();
	$savedData = file_to_json('../generatedData/fluidData.json');
	return $savedData->data->$fluidID->recipes_result;
}

function get_fluid_recipes_as_ingredient($fluidID) {
	$results = [];
	if(!is_file('../generatedData/fluidData.json'))
		initialize_generated_data();
	$savedData = file_to_json('../generatedData/fluidData.json');
	return $savedData->data->$fluidID->recipes_ingredient;
}

function get_fluid_recipes($fluidID) {
	$results = [];
	if(!is_file('../generatedData/fluidData.json'))
		initialize_generated_data();
	$as_ingredient = get_fluid_recipes_as_ingredient($fluidID);
	$as_result = get_fluid_recipes_as_result($fluidID);
	$results = array_merge($as_ingredient, $as_result);
	return results;
}
?>
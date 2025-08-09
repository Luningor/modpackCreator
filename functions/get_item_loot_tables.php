<?php
include_once "init_gen_data.php";
// This function needs generatedData to work. As such, if initialization wasn't done previously, it will trigger it.
// Returns all loot tables that an item is dropped in
function get_item_loot_tables($itemID) {
	$results = [];
	if(!is_file('../generatedData/itemData.json'))
		initialize_generated_data();
	$savedData = file_to_json('../generatedData/itemData.json');
	return $savedData->data->$itemID->loot_tables;
}
?>
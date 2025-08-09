<?php
include_once 'init_gen_data.php';
include_once 'file_to_json.php';

// These functions need generatedData to work. As such, if initialization wasn't done previously, they will trigger it.
function get_tags_from_block($block) {
	$results = [];
	if(!is_file('../generatedData/itemData.json'))
		initialize_generated_data();
	$savedData = file_to_json('../generatedData/itemData.json');
	return $savedData->data->$block->tags;
}

function get_tags_from_item($item) {
	$results = [];
	if(!is_file('../generatedData/itemData.json'))
		initialize_generated_data();
	$savedData = file_to_json('../generatedData/itemData.json');
	return $savedData->data->$item->tags;
}

function get_tags_from_fluid($fluid) {
	$results = [];
	if(!is_file('../generatedData/fluidData.json'))
		initialize_generated_data();
	$savedData = file_to_json('../generatedData/fluidData.json');
	return $savedData->data->$fluid->tags;
}

function get_tags_from_mob($mob) {
	$results = [];
	if(!is_file('../generatedData/mobData.json'))
		initialize_generated_data();
	$savedData = file_to_json('../generatedData/mobData.json');
	return $savedData->data->$mob->tags;
}
?>
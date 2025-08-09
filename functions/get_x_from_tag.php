<?php
include_once 'file_to_json.php';

function get_blocks_from_tag($tag) {
	$results = [];
	$tag = str_replace('#', '', $tag);
	$cleanTag = '../savedData/tags/minecraft/block/'.str_replace('.json', '', str_replace(':', '/', $tag)).'.json';
	
	// File does not exist (no tag file)
	if(!is_file($cleanTag)) return $results;
	
	$tagContents = file_to_json($cleanTag);
	
	foreach($tagContents as $entry) {
		$cleanEntry = rtrim($entry, '?');

		if(strpos($cleanEntry, '#') === false) // It's a block
			$results[] = $cleanEntry;
		else { // It's a tag
			$tagBlocks = get_items_from_tag($cleanEntry);
			$results = array_merge($results, $tagBlocks);
		}
	}

	return $results;
}

function get_items_from_tag($tag) {
	$results = [];
	$tag = str_replace('#', '', $tag);
	$cleanTag = '../savedData/tags/minecraft/item/'.str_replace('.json', '', str_replace(':', '/', $tag)).'.json';
	
	// File does not exist (no tag file)
	if(!is_file($cleanTag)) return $results;
	
	$tagContents = file_to_json($cleanTag);
	
	foreach($tagContents as $entry) {
		$cleanEntry = rtrim($entry, '?');

		if(strpos($cleanEntry, '#') === false) // It's an item
			$results[] = $cleanEntry;
		else { // It's a tag
			$tagItems = get_items_from_tag($cleanEntry);
			$results = array_merge($results, $tagItems);
		}
	}

	return $results;
}

function get_fluids_from_tag($tag) {
	$results = [];
	$tag = str_replace('#', '', $tag);
	$cleanTag = '../savedData/tags/minecraft/fluid/'.str_replace('.json', '', str_replace(':', '/', $tag)).'.json';
	
	// File does not exist (no tag file)
	if(!is_file($cleanTag)) return $results;
	
	$tagContents = file_to_json($cleanTag);
	
	foreach($tagContents as $entry) {
		$cleanEntry = rtrim($entry, '?');

		if(strpos($cleanEntry, '#') === false) // It's a fluid
			$results[] = $cleanEntry;
		else { // It's a tag
			$tagFluids = get_items_from_tag($cleanEntry);
			$results = array_merge($results, $tagFluids);
		}
	}

	return $results;
}

function get_mobs_from_tag($tag) {
	$results = [];
	$tag = str_replace('#', '', $tag);
	$cleanTag = '../savedData/tags/minecraft/entity_type/'.str_replace('.json', '', str_replace(':', '/', $tag)).'.json';
	
	// File does not exist (no tag file)
	if(!is_file($cleanTag)) return $results;
	
	$tagContents = file_to_json($cleanTag);
	
	foreach($tagContents as $entry) {
		$cleanEntry = rtrim($entry, '?');

		if(strpos($cleanEntry, '#') === false) // It's a mob
			$results[] = $cleanEntry;
		else { // It's a tag
			$tagMobs = get_items_from_tag($cleanEntry);
			$results = array_merge($results, $tagMobs);
		}
	}

	return $results;
}
?>
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

		// It's a block
		if(strpos($cleanEntry, '#') === false)
			$results[] = $cleanEntry;
		// It's a tag
		else {
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

		// It's an item
		if(strpos($cleanEntry, '#') === false)
			$results[] = $cleanEntry;
		// It's a tag
		else {
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

		// It's a fluid
		if(strpos($cleanEntry, '#') === false)
			$results[] = $cleanEntry;
		// It's a tag
		else {
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

		// It's a mob
		if(strpos($cleanEntry, '#') === false)
			$results[] = $cleanEntry;
		// It's a tag
		else {
			$tagMobs = get_items_from_tag($cleanEntry);
			$results = array_merge($results, $tagMobs);
		}
	}

	return $results;
}
?>
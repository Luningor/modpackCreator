<?php
include_once 'file_to_json.php';
include_once 'get_x_from_tag.php';
//header("Content-Type: application/json; charset=UTF-8");
function get_loot_table_items($lootTable) {
	$lootItems = [];
	if(!is_file("../savedData/loot_tables/".$lootTable.".json")) return $lootItems;
	
	$lootJSON = file_to_json("../savedData/loot_tables/".$lootTable.".json");
	if(isset($lootJSON->pools))
		foreach($lootJSON->pools as $pool)
			foreach($pool->entries as $entry)
				entry_handler($entry, $lootItems);
	else {
		// ??? Loot table with no pools??
		// Other handler?? I guess??
	}
	return $lootItems;
}

function entry_handler($entry, &$output) {
	switch ($entry->type) {
		// Single item
		case 'minecraft:item':
			$str = $entry->name;
			if(!in_array($str, $output)) $output[] = $str;
			break;
		
		// Get all items from tag
		// Because we export the actual datapack (post-processing) this becomes trivial
		case 'minecraft:tag':
			$tagItems = get_items_from_tag($entry->name);
			foreach($tagItems as $item)
				if(!in_array($item, $output)) $output[] = $item;
			break;

		case 'minecraft:loot_table':
			$path = '../savedData/loot_tables/'.str_replace(':', '/', $entry->name).'.json';
			$lootItems = get_loot_table_items($path);
			foreach($lootItems as $item => $value)
				if(!in_array($item, $output)) $output[] = $item;
			break;

		case 'minecraft:group':
	    case 'minecraft:alternatives':
	    case 'minecraft:sequence':
			foreach($entry->children as $index => $childEntry)
				entry_handler($childEntry, $output);
			break;

    	// It's weird
    	case 'minecraft:dynamic':
		// Drops nothing
		case 'minecraft:empty':
			break;

		// Not covered by this (open an issue)
		default:
			echo(`Unknown loot type: "{$entry->type}"\n`);
			break;
	}
}
?>
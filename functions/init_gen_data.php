<?php
//header("Content-Type: application/json; charset=UTF-8");
include_once 'json_to_string.php';
include_once 'file_to_json.php';
include_once 'get_all_filepaths.php';
include_once 'get_x_from_tag.php';
include_once 'get_loot_table_items.php';

// Assumes modpack data is already on savedData/
	// savedData/
	//			/config/
	//			/loot_tables/
	//			/recipes/
	//			/registries/
	//			/tags/
function initialize_generated_data() {
	// Initializate folder
	if(!is_dir('../generatedData')) mkdir('../generatedData');

	// Get all recipe files
	$recipeFiles = get_all_filepaths('../savedData/recipes');
	$lootTableFiles = get_all_filepaths('../savedData/loot_tables');

	// Initialize JSONs
	// ItemData JSON:
		$itemData = fopen('../generatedData/itemData.json', 'w');
		$rawItemJSON = file_to_json('../savedData/registries/item.json');
		$itemJSON = json_decode('{}');
		$itemJSON->data = json_decode('{}');
		$itemJSON->itemIDs = [];
		$i = 0;
	
		foreach($rawItemJSON as $itemID => $data) {
			$itemJSON->itemIDs[$i] = $itemID;
			$itemJSON->data->$itemID = json_decode('{}');
			$itemJSON->data->$itemID->tags = [];
			$itemJSON->data->$itemID->block_tags = [];
			$itemJSON->data->$itemID->loot_tables = [];
			$itemJSON->data->$itemID->recipes_ingredient = [];
			$itemJSON->data->$itemID->recipes_result = [];
			$itemJSON->data->$itemID->baseIngredient = false;
			$itemJSON->data->$itemID->emcMult = 1;
			$i++;
		}
	
		$itemPaths = get_all_filepaths('../savedData/tags/minecraft/item');
		$blockPaths = get_all_filepaths('../savedData/tags/minecraft/block');
	
		foreach($itemPaths as $tagPath) {
			if(!is_file($tagPath)) continue;
			$tagname = str_replace('../savedData/tags/minecraft/item/', '', $tagPath);
			$tagname = str_replace('.json', '', $tagname);
			$isolatedTagName = $tagname;
			$pos = strpos($tagname, '/');
			if($pos !== false) $tagname = substr_replace($tagname, ':', $pos, 1);
	
			$tagItems = get_items_from_tag($isolatedTagName);
			foreach($tagItems as $item) {
				// It's an item
				if(strpos($item, '#') === false) {
					if(isset($itemJSON->data->$item))
						$itemJSON->data->$item->tags[] = $tagname;
				}
				// It's a tag, append all items on tag, recursively
				else {
					$tItems = get_items_from_tag($item);
					// Add items to tag
					foreach($tItems as $tItem)
						if(isset($itemJSON->data->$tItem))
							$itemJSON->data->$tItem->tags[] = $tagname;
				}
			}
		}
	
		foreach($blockPaths as $tagPath) {
			if(!is_file($tagPath)) continue;
			$tagname = str_replace('../savedData/tags/minecraft/block/', '', $tagPath);
			$tagname = str_replace('.json', '', $tagname);
			$isolatedTagName = $tagname;
			$pos = strpos($tagname, '/');
			if($pos !== false) $tagname = substr_replace($tagname, ':', $pos, 1);
	
			$tagBlocks = get_blocks_from_tag($isolatedTagName);
			foreach($tagBlocks as $block) {
				// It's an item
				if(strpos($block, '#') === false) {
					if(isset($itemJSON->data->$block))
						$itemJSON->data->$block->block_tags[] = $tagname;
				}
				// It's a tag, append all items on tag, recursively
				else {
					$tBlocks = get_blocks_from_tag($block);
					// Add items to tag
					foreach($tBlocks as $tBlock)
						if(isset($itemJSON->data->$tBlock))
							$itemJSON->data->$tBlock->block_tags[] = $tagname;
				}
			}
		}

	// FluidData JSON:
		$fluidData = fopen('../generatedData/fluidData.json', 'w');
		
		$rawFluidJSON = file_to_json('../savedData/registries/fluid.json');
		$fluidJSON = json_decode('{}');
		$fluidJSON->data = json_decode('{}');
		$fluidJSON->fluidIDs = [];
		$i = 0;
	
		foreach($rawFluidJSON as $fluidID => $data) {
			$fluidJSON->fluidIDs[$i] = $fluidID;
			$fluidJSON->data->$fluidID = json_decode('{}');
			$fluidJSON->data->$fluidID->tags = [];
			$fluidJSON->data->$fluidID->loot_tables = [];
			$fluidJSON->data->$fluidID->recipes_ingredient = [];
			$fluidJSON->data->$fluidID->recipes_result = [];
			$fluidJSON->data->$fluidID->baseIngredient = false;
			$fluidJSON->data->$fluidID->emcMult = 1;
			$i++;
		}
	
		$fluidPaths = get_all_filepaths('../savedData/tags/minecraft/fluid');
	
		foreach($fluidPaths as $tagPath) {
			if(!is_file($tagPath)) continue;
			$tagname = str_replace('../savedData/tags/minecraft/fluid/', '', $tagPath);
			$tagname = str_replace('.json', '', $tagname);
			$isolatedTagName = $tagname;
			$pos = strpos($tagname, '/');
			if($pos !== false) $tagname = substr_replace($tagname, ':', $pos, 1);
	
			$tagFluids = get_fluids_from_tag($isolatedTagName);
			foreach($tagFluids as $fluid) {
				// It's an item
				if(strpos($fluid, '#') === false) {
					if(isset($fluidJSON->data->$fluid))
						$fluidJSON->data->$fluid->tags[] = $tagname;
				}
				// It's a tag, append all items on tag, recursively
				else {
					$tFluids = get_fluids_from_tag($fluid);
					// Add items to tag
					foreach($tFluids as $tFluid)
						if(isset($fluidJSON->data->$tFluid))
							$fluidJSON->data->$tFluid->tags[] = $tagname;
				}
			}
		}

	// MobData JSON:
		$mobData = fopen('../generatedData/mobData.json', 'w');
		
		$rawMobJSON = file_to_json('../savedData/registries/entity_type.json');
		$mobJSON = json_decode('{}');
		$mobJSON->data = json_decode('{}');
		$mobJSON->mobIDs = [];
		$i = 0;
	
		foreach($rawMobJSON as $mobID => $data) {
			$mobJSON->mobIDs[$i] = $mobID;
			$mobJSON->data->$mobID = json_decode('{}');
			$mobJSON->data->$mobID->loot_table = json_decode('{}');
			$mobJSON->data->$mobID->tags = [];
			$i++;
		}
	
		$mobPaths = get_all_filepaths('../savedData/tags/minecraft/entity_type');
	
		foreach($mobPaths as $tagPath) {
			if(!is_file($tagPath)) continue;
			$tagname = str_replace('../savedData/tags/minecraft/entity_type/', '', $tagPath);
			$tagname = str_replace('.json', '', $tagname);
			$isolatedTagName = $tagname;
			$pos = strpos($tagname, '/');
			if($pos !== false) $tagname = substr_replace($tagname, ':', $pos, 1);
	
			$tagMobs = get_mobs_from_tag($isolatedTagName);
			foreach($tagMobs as $mob) {
				// It's an item
				if(strpos($mob, '#') === false) {
					if(isset($mobJSON->data->$mob))
						$mobJSON->data->$mob->tags[] = $tagname;
				}
				// It's a tag, append all items on tag, recursively
				else {
					$tMobs = get_mobs_from_tag($mob);
					// Add items to tag
					foreach($tMobs as $tMobs)
						if(isset($mobJSON->data->$tMobs))
							$mobJSON->data->$tMobs->tags[] = $tagname;
				}
			}
		}

	// Fill loot table data
		foreach($lootTableFiles as $lootTablePath) {
			if(!is_file($lootTablePath)) continue;
			$lootTableName = str_replace('../savedData/loot_tables/', '', $lootTablePath);
			$lootTableName = str_replace('.json', '', $lootTableName);
			$isolatedlootTableName = $lootTableName;
			$pos = strpos($lootTableName, '/');
			if($pos !== false) $lootTableName = substr_replace($lootTableName, ':', $pos, 1);
			$items = get_loot_table_items($isolatedlootTableName);
			foreach($items as $item)
				if(!in_array($item, $itemJSON->data->$item->loot_tables)) 
					$itemJSON->data->$item->loot_tables[] = $lootTableName;
		}

	// Fill recipe data
		//foreach($recipeFiles as $recipePath) {
		//	if(!is_file($recipePath)) continue;
		//	$recipeName = str_replace('../savedData/tags/minecraft/item/', '', $recipePath);
		//	$recipeName = str_replace('.json', '', $recipeName);
		//	$isolatedRecipeName = $recipeName;
		//	$pos = strpos($recipeName, '/');
		//	if($pos !== false) $recipeName = substr_replace($recipeName, ':', $pos, 1);
		//}

	// Config JSON:
		$config = fopen('../generatedData/config.json', 'w');

	// Write to disk
	fwrite($itemData, json_encode($itemJSON, JSON_PRETTY_PRINT));
	fwrite($fluidData, json_encode($fluidJSON, JSON_PRETTY_PRINT));
	fwrite($mobData, json_encode($mobJSON, JSON_PRETTY_PRINT));
	fclose($itemData);
	fclose($fluidData);
	fclose($mobData);
	fclose($config);
}
?>
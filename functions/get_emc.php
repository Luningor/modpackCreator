<?php
// Calculates recursively the EMC value of an item. 
// An item is classified as a base item if it has no way of obtaining it other than mining it.
// If an item is *dropped* by a block but *isn't* the block, it inherits the value.
// 'value_multiplier' refers to the base component multiplier. Crafted items have no component multiplier of their own so as to not have EMC dupe values
function get_emc_value($itemID) {
	$value = 0;
	// Check if ingredient is base
	// If not, get recipes -> Get ingredients emc value -> Get recipe value function -> Get value multiplier -> Multiply by value -> Select min/max depending on config
	return $value;
}

// Creates the custom EMC json list. Finds the lowest item and retroactively assigns values to all items.
// Lowest = most amount of items from cheapest source / base ingredient or equivalent 
// (that being, an item made from the base material that has the same EMC value 1:1, like stone bricks and stone)
// All base ingredients start at 1EMC, and increase globally to nEMC base 
// (n being the least common multiple coeficient of most amount of one item one can make with one base material / the amount of base material)
// That way the base ingredients are roughly the same value and the most divided are worth at least 1
function map_emc_values() {

}

// Minecraft default EMC mappers
function emc_mapper_shapeless_crafting($itemID) {}
function emc_mapper_shaped_crafting($itemID) {}
function emc_mapper_smithing_transform($itemID) {}
function emc_mapper_stonecutting($itemID) {}
function emc_mapper_smelting($itemID) {}
function emc_mapper_blasting($itemID) {}
function emc_mapper_smoking($itemID) {}
function emc_mapper_campfire_cooking($itemID) {}
function emc_mapper_brewing_stand($itemID) {}

// Alex caves compat
function emc_mapper_nuclear_furnace($itemID) {}

// Biomancy compat
function emc_mapping_bio_brewing($itemID) {}
function emc_mapping_bio_forging($itemID) {}
function emc_mapping_decomposing($itemID) {}
function emc_mapping_digesting($itemID) {}
function emc_mapping_digesting_dynamic_food($itemID) {}

// Create compat
function emc_mapper_deploying($itemID) {}
function emc_mapper_item_application($itemID) {}
function emc_mapper_compacting($itemID) {}
function emc_mapper_crushing($itemID) {}
function emc_mapper_cutting($itemID) {}
function emc_mapper_emptying($itemID) {}
function emc_mapper_filling($itemID) {}
function emc_mapper_haunting($itemID) {}
function emc_mapper_mechanical_crafting($itemID) {}
function emc_mapper_milling($itemID) {}
function emc_mapper_mixing($itemID) {}
function emc_mapper_pressing($itemID) {}
function emc_mapper_sandpaper_polishing($itemID) {}
function emc_mapper_sequenced_assembly($itemID) {}
function emc_mapper_splashing($itemID) {}

// Cyclic compat
function emc_mapper_cyclic_crusher($itemID) {}
function emc_mapper_cyclic_melter($itemID) {}
function emc_mapper_cyclic_solidifier($itemID) {}

// Farmer's delight compat
function emc_mapper_cooking($itemID) {}
function emc_mapper_cutting($itemID) {}
function emc_mapper_dough($itemID) {}
function emc_mapper_food_serving($itemID) {}

// Sully's mod compat
function emc_mapper_grindstone_polishing($itemID) {}
?>
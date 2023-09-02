<?php

namespace skyss0fly\DonutPolice;


use pocketmine\{world\WorldManager, item\VanillaItems, item\enchantment\Enchantment, item\enchantment\EnchantmentInstance, item\enchantment\VanillaEnchantment, event\player\PlayerItemHeldEvent, player\Player, plugin\PluginBase, inventory\Inventory};

class Donut extends PluginBase {


public $prefix = $this->getConfig()->get("Prefix");
  public $ignore = $this->getConfig()->get("WorldToIgnore");
public $maxlevel = $this->getConfig()->get("HighestEnchantAmount");
public function onLoad(): void {

  $this->saveDefaultConfig();
}

public function onItemHeld(PlayerItemHeldEvent $event) {
$player = $event->getPlayer();
  $world = $this->getServer()->getWorldManager()->getFolderName();
  $item = $player->getInventory()->getItem();
  $enchatmentlevel = $item->getEnchantments()->getLevels();
  
  if ($world === $ignore && $enchatmentlevel <== $maxlevel){
    // noop
    // if world is an ignore then ignore 
    return false;
}
  elseif ($world !== $ignore && $enchatmentlevel >== $maxlevel){ 
    // NOOp
   // if world isnt ignore but enchant is not max and is safe then ignore
    return false;
  }
  else {
    // if world isnt ignore and enchant is max or above then policify
  $item = $player->getInventory()->setItem(VanillaItems::AIR);
    $player->sendMessage($prefix . " Your Item is Illegal, It has been removed");
    return true;

  }
}
}

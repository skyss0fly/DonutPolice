<?php

nanespace akyss0fly\DonutPolice;


use pocektmine\{world\WorldManager, item\VanillaItems, item\enchantment\{Enchantment, EnchantmentInstance, VanillaEnchantments}, event\player\PlayerItemHeldEvent, player\Player, plugin\PluginBase, inventory\Inventory};

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
    
    return false;
}
  elseif ($world !== $ignore && $enchatmentlevel >== $maxlevel){ 
    // NOOP
    return false;
  }
  else {
  $item = $player->getInventory()->setItem(VanillaItems::AIR);
    $player->sendMessage($prefix . " Your Item is Illegal, It has been removed");
    return true;

  }
}
}

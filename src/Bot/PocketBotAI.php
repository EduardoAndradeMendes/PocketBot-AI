<?php

namespace Bot;

use pocketmine\plugin\PluginBase;
use pocketmine\item\Item;
use pocketmine\event\Listener;

class PocketBotAI extends PluginBase implements Listener{
  
  public function onLoad(){
        $classes = [
            Chicken::class,
            Cow::class,
            Creeper::class,
            Pig::class,
            PigZombie::class,
            Rabbit::class,
            Sheep::class,
            Silverfish::class,
            Skeleton::class,
            Zombie::class,
            ZombieVillager::class,
            FireBall::class //maybe
        ];
        foreach($classes as $name){
            Entity::registerEntity($name);
            if($name == FireBall::class){
                continue;
            }
            $item = Item::get(Item::SPAWN_EGG, $name::NETWORK_ID);
            if(!Item::isCreativeItem($item)){
                Item::addCreativeItem($item);
            }
        }
        Tile::registerTile(Spawner::class);
        $this->getServer()->getLogger()->info("");
    }
  
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getLogger()->notice("");
  }
}

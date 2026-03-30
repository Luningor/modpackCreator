# Luni's Absolute Modpack Maker
A local web modpack editing facilitator, made in PHP, powered by:
- [Command Line Java Decompiler](https://github.com/intoolswetrust/jd-cli) 
- [Custom Villager Trades](https://www.curseforge.com/minecraft/mc-mods/custom-villager-trades-forge)
- [IconExporter](https://www.curseforge.com/minecraft/mc-mods/iconexporter)
- [JEI](https://www.curseforge.com/minecraft/mc-mods/jei)
- [KubeJS](https://www.curseforge.com/minecraft/mc-mods/kubejs)
- [FilesJS](https://www.curseforge.com/minecraft/mc-mods/filesjs)
- [JsonEM](https://modrinth.com/mod/jsonem)
And compatible (to date) with:
- [AscendTiers](https://www.curseforge.com/minecraft/mc-mods/ascend-tiers)
- [AttributizedSkills](https://www.curseforge.com/minecraft/mc-mods/attributized-skills)
- [BlockSwap](https://www.curseforge.com/minecraft/mc-mods/block-swap)
- [Game Stages](https://www.curseforge.com/minecraft/mc-mods/game-stages)
- [In Control!](https://www.curseforge.com/minecraft/mc-mods/in-control)
- [Item Obliterator](https://www.curseforge.com/minecraft/mc-mods/item-obliterator)
- [ItemStages](https://www.curseforge.com/minecraft/mc-mods/item-stages)
- [Mob Stage Reborn](https://www.curseforge.com/minecraft/mc-mods/mob-stage-reborn)
- [ProjectE](https://www.curseforge.com/minecraft/mc-mods/projecte)
- [Structurify](https://www.curseforge.com/minecraft/mc-mods/structurify)
- [Super Duper Ultra Hyper Tamer](https://www.curseforge.com/minecraft/mc-mods/super-duper-ultra-hyper-tamer)

## Considerations
This is a passion project, made for my specific use-case, which means my specific Minecraft version, which is Forge 1.20.1. This means that it MAY work with what you have going on to an extent depending on what you have available and what versions the mods are in. You can fork and modify it however you see fit for YOUR needs if you so desire, but whatever issues are reported that are clearly because of version differences will probably be closed because I'm limited for time enough as is. If you fix it and want it on this repo, open up a merge request! I'm always open to improvements and feedback and such. I wish I had the team to make this an actual multiversion modpack maker but alas I am one and only once in a while when I have time. If it helps you in any way, hit me up too!

## Installation
To run properly, LAMM needs an Apache server (to show the webpages), a PHP server (to run the code) and a Java 17+ runtime (to decompile the Jar's). That said, what comes next is a _reccommended_ installation as is what _I_ use to develop this and it's fairly easy to setup. I assume people will use this with minecraft installed but I will regardless put a section for Java installation.
1. Click on Code > Download zip
1. Install [Java 17](https://www.oracle.com/java/technologies/javase/jdk17-archive-downloads.html) (I recommend the msi versions if you're on Windows, less of a pain in the ass).
2. Install [WAMP](https://wampserver.aviatechno.net/)
3. Go to C:\\wamp\\www\\ or C:\\wamp64\\www\\ and extract the zip you downloaded in step 1 there.
4. Start up WAMPServer
	- If you're NOT on Windows, you can do the same by downloading [XAMPP](https://www.apachefriends.org/es/index.html) and extracting onto C:\\xampp\\htdocs\\
5. On your browser, go to [localhost/modpackCreator-main](localhost/modpackCreator-main) (or localhost/\<whatever-the-folder-ended-up-naming-itself\>)
And done! Now whenever you want to load it up, just repeat steps 4 and 5 and you're golden!

## How to set it up
By itself, the modpack is capable of retrieving most of the data by itself, but things like item/entity models and villager trades are admittedly outside my scope, reach and understanding. Thus, to fill in my shortcomings, I've mostly simplified this whole ordeal in such a way one has to specify as little as possible to get it started up. That said, I will refer to the installation path (i.e. localhost/modpackCreator-main) as modpackCreator, and your Minecraft's modpack installation path as modpackPath henceforth for simplicity.
1. In your browser, go to modpackCreator/config.
2. Where it says _"Installation path"_, put the path of where your modpack is and click _"Save"_. In my case, it's "C:\Users\Luningor\AppData\Roaming\PrismLauncher\instances\DEBUGTESTING\minecraft". Check online where your particular launcher saves it.
3. Download [Custom Villager Trades](https://www.curseforge.com/minecraft/mc-mods/custom-villager-trades-forge) (and its dependency [Architectury](https://curseforge.com/minecraft/mc-mods/architectury-api)), [IconExporter](https://www.curseforge.com/minecraft/mc-mods/iconexporter) (and its dependency [Cyclops Core](https://www.curseforge.com/minecraft/mc-mods/cyclops-core)), [JEI](https://www.curseforge.com/minecraft/mc-mods/jei) and [JsonEM](https://modrinth.com/mod/jsonem), and put them on modpackPath/mods.
4. Open modpackPath/config/jsonem.toml and make sure that `dump_models = true`. That way, when you join your world, all the entity models will export automatically to modpackPath/jsonem_dump.
5. Boot up your modpack and join any world.
6. WITHOUT RESIZING YOUR WINDOW (THIS INCLUDES SWITCHING FROM FULLSCREEN) open chat, type `/iconexporter export`, then enter. This will export all item icons as shown on JEI to modpackPath/iconexports-x64. 
	- This is needed for speed and accuracy. If for any reason I cannot find the model to an item, this will come as a default for it. Also, when searching for items on big modpacks, you will find that loading 17.000 (not exaggerating, I'm running a medium modpack with 170 mods. That's MY number) item models when searching slows up your stuff significantly. I will use png's which are way faster to load.
7. When it finishes exporting, open up chat again and enter `/exportCVT`. This will export all existing trades to modpackPath/config/custom trades as JSONs.
8. Finally, type and enter `/kjs export` and let it reload. This will generate technical data about the pack to modpackPath/local/kubejs/export that LAMM will use later.
And that's all! Mostly. I do have a backup way to get recipes and loot tables if you don't want to sit 10 hours for your modpack jars to decompile or if you can't afford the disk space to hold them. Which fair, I've been there; that's why I made it. There will be an option to setup the exporter automatically in a way that only requires of you to click one button and open a Minecraft world on config. Something along the lines of "Use legacy exporter".

Once you do all this with ALL the mods you want in, LAMM should be able to decompile the thing, save the assets, load the data one by one mantaining dependency hierarchy then save a would-be loaded datapack.

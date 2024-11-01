<?php
	/*
	Plugin Name: Warcraft Feed
	Plugin URI: http://www.etftw.co.uk/warcraftfeed
	Description: A fast and robust plugin for displaying your latest World of Warcraft achievements and character information on your blog.
	Author: Rob Carr
	Version: 1.0.1
	Author URI: http://www.etftw.co.uk/
	*/
	add_action("widgets_init", array('warcraftfeed', 'register'));
	register_activation_hook( __FILE__, array('warcraftfeed', 'activate'));
	register_deactivation_hook( __FILE__, array('warcraftfeed', 'deactivate'));
	wp_enqueue_script("jquery", false, false, "1.5.1");	
	
	class warcraftfeed
	{		
		function activate()
		{
			$data = array('warcraftfeed_character' => 'thombu', 'warcraftfeed_realm' => 'lightnings-blade', 'warcraftfeed_region' => 'eu', 'warcraftfeed_title' => 'World of Warcraft Feed', 'warcraftfeed_includeAchievements' => true, 'warcraftfeed_includeInformation' => true);
			if (! get_option('warcraftfeed'))
			{
				add_option('warcraftfeed' , $data);
			} 
			else 
			{
				update_option('warcraftfeed' , $data);
			}
		}
		  
		function deactivate()
		{
			delete_option('warcraftfeed');
		}

		function control()
		{
			$data = get_option('warcraftfeed');
			echo '<p><label>Widget title<br /></label><input name="warcraftfeed_title" type="text" value="'.$data['warcraftfeed_title'].'" /></p>';
			echo '<p><label>Character name<br /></label><input name="warcraftfeed_character" type="text" value="'.$data['warcraftfeed_character'].'" /></p>';
			echo '<p><label>Realm<br /></label><select name="warcraftfeed_realm">';
			echo '<option value="aerie-peak"'.($data['warcraftfeed_realm'] == 'aerie-peak' ? ' selected="selected"' : '').'>Aerie Peak</option>';
			echo '<option value="agamaggan"'.($data['warcraftfeed_realm'] == 'agamaggan' ? ' selected="selected"' : '').'>Agamaggan</option>';
			echo '<option value="aggramar"'.($data['warcraftfeed_realm'] == 'aggramar' ? ' selected="selected"' : '').'>Aggramar</option>';
			echo '<option value="ahnqiraj"'.($data['warcraftfeed_realm'] == 'ahnqiraj' ? ' selected="selected"' : '').'>Ahn\'Qiraj</option>';
			echo '<option value="akama"'.($data['warcraftfeed_realm'] == 'akama' ? ' selected="selected"' : '').'>Akama</option>';
			echo '<option value="alakir"'.($data['warcraftfeed_realm'] == 'alakir' ? ' selected="selected"' : '').'>Al\'Akir</option>';
			echo '<option value="alexstrasza"'.($data['warcraftfeed_realm'] == 'alexstrasza' ? ' selected="selected"' : '').'>Alexstrasza</option>';
			echo '<option value="alleria"'.($data['warcraftfeed_realm'] == 'alleria' ? ' selected="selected"' : '').'>Alleria</option>';
			echo '<option value="alonsus"'.($data['warcraftfeed_realm'] == 'alonsus' ? ' selected="selected"' : '').'>Alonsus</option>';
			echo '<option value="altar-of-storms"'.($data['warcraftfeed_realm'] == 'altar-of-storms' ? ' selected="selected"' : '').'>Altar of Storms</option>';
			echo '<option value="alterac-mountains"'.($data['warcraftfeed_realm'] == 'alterac-mountains' ? ' selected="selected"' : '').'>Alterac Mountains</option>';
			echo '<option value="amanthul"'.($data['warcraftfeed_realm'] == 'amanthul' ? ' selected="selected"' : '').'>Aman\'Thul</option>';
			echo '<option value="anachronos"'.($data['warcraftfeed_realm'] == 'anachronos' ? ' selected="selected"' : '').'>Anachronos</option>';
			echo '<option value="andorhal"'.($data['warcraftfeed_realm'] == 'andorhal' ? ' selected="selected"' : '').'>Andorhal</option>';
			echo '<option value="anetheron"'.($data['warcraftfeed_realm'] == 'anetheron' ? ' selected="selected"' : '').'>Anetheron</option>';
			echo '<option value="antonidas"'.($data['warcraftfeed_realm'] == 'antonidas' ? ' selected="selected"' : '').'>Antonidas</option>';
			echo '<option value="anubarak"'.($data['warcraftfeed_realm'] == 'anubarak' ? ' selected="selected"' : '').'>Anub\'arak</option>';
			echo '<option value="anvilmar"'.($data['warcraftfeed_realm'] == 'anvilmar' ? ' selected="selected"' : '').'>Anvilmar</option>';
			echo '<option value="arathor"'.($data['warcraftfeed_realm'] == 'arathor' ? ' selected="selected"' : '').'>Arathor</option>';
			echo '<option value="archimonde"'.($data['warcraftfeed_realm'] == 'archimonde' ? ' selected="selected"' : '').'>Archimonde</option>';
			echo '<option value="area-52"'.($data['warcraftfeed_realm'] == 'area-52' ? ' selected="selected"' : '').'>Area 52</option>';
			echo '<option value="argent-dawn"'.($data['warcraftfeed_realm'] == 'argent-dawn' ? ' selected="selected"' : '').'>Argent Dawn</option>';
			echo '<option value="arthas"'.($data['warcraftfeed_realm'] == 'arthas' ? ' selected="selected"' : '').'>Arthas</option>';
			echo '<option value="arygos"'.($data['warcraftfeed_realm'] == 'arygos' ? ' selected="selected"' : '').'>Arygos</option>';
			echo '<option value="aszune"'.($data['warcraftfeed_realm'] == 'aszune' ? ' selected="selected"' : '').'>Aszune</option>';
			echo '<option value="auchindoun"'.($data['warcraftfeed_realm'] == 'auchindoun' ? ' selected="selected"' : '').'>Auchindoun</option>';
			echo '<option value="azgalor"'.($data['warcraftfeed_realm'] == 'azgalor' ? ' selected="selected"' : '').'>Azgalor</option>';
			echo '<option value="azjol-nerub"'.($data['warcraftfeed_realm'] == 'azjol-nerub' ? ' selected="selected"' : '').'>Azjol-Nerub</option>';
			echo '<option value="azshara"'.($data['warcraftfeed_realm'] == 'azshara' ? ' selected="selected"' : '').'>Azshara</option>';
			echo '<option value="azuremyst"'.($data['warcraftfeed_realm'] == 'azuremyst' ? ' selected="selected"' : '').'>Azuremyst</option>';
			echo '<option value="baelgun"'.($data['warcraftfeed_realm'] == 'baelgun' ? ' selected="selected"' : '').'>Baelgun</option>';
			echo '<option value="balnazzar"'.($data['warcraftfeed_realm'] == 'balnazzar' ? ' selected="selected"' : '').'>Balnazzar</option>';
			echo '<option value="barthilas"'.($data['warcraftfeed_realm'] == 'barthilas' ? ' selected="selected"' : '').'>Barthilas</option>';
			echo '<option value="black-dragonflight"'.($data['warcraftfeed_realm'] == 'black-dragonflight' ? ' selected="selected"' : '').'>Black Dragonflight</option>';
			echo '<option value="blackhand"'.($data['warcraftfeed_realm'] == 'blackhand' ? ' selected="selected"' : '').'>Blackhand</option>';
			echo '<option value="blackrock"'.($data['warcraftfeed_realm'] == 'blackrock' ? ' selected="selected"' : '').'>Blackrock</option>';
			echo '<option value="blackwater-raiders"'.($data['warcraftfeed_realm'] == 'blackwater-raiders' ? ' selected="selected"' : '').'>Blackwater Raiders</option>';
			echo '<option value="blackwing-lair"'.($data['warcraftfeed_realm'] == 'blackwing-lair' ? ' selected="selected"' : '').'>Blackwing Lair</option>';
			echo '<option value="blades-edge"'.($data['warcraftfeed_realm'] == 'blades-edge' ? ' selected="selected"' : '').'>Blade\'s Edge</option>';
			echo '<option value="bladefist"'.($data['warcraftfeed_realm'] == 'bladefist' ? ' selected="selected"' : '').'>Bladefist</option>';
			echo '<option value="bleeding-hollow"'.($data['warcraftfeed_realm'] == 'bleeding-hollow' ? ' selected="selected"' : '').'>Bleeding Hollow</option>';
			echo '<option value="blood-furnace"'.($data['warcraftfeed_realm'] == 'blood-furnace' ? ' selected="selected"' : '').'>Blood Furnace</option>';
			echo '<option value="bloodfeather"'.($data['warcraftfeed_realm'] == 'bloodfeather' ? ' selected="selected"' : '').'>Bloodfeather</option>';
			echo '<option value="bloodhoof"'.($data['warcraftfeed_realm'] == 'bloodhoof' ? ' selected="selected"' : '').'>Bloodhoof</option>';
			echo '<option value="bloodscalp"'.($data['warcraftfeed_realm'] == 'bloodscalp' ? ' selected="selected"' : '').'>Bloodscalp</option>';
			echo '<option value="bonechewer"'.($data['warcraftfeed_realm'] == 'bonechewer' ? ' selected="selected"' : '').'>Bonechewer</option>';
			echo '<option value="borean-tundra"'.($data['warcraftfeed_realm'] == 'borean-tundra' ? ' selected="selected"' : '').'>Borean Tundra</option>';
			echo '<option value="boulderfist"'.($data['warcraftfeed_realm'] == 'boulderfist' ? ' selected="selected"' : '').'>Boulderfist</option>';
			echo '<option value="bronze-dragonflight"'.($data['warcraftfeed_realm'] == 'bronze-dragonflight' ? ' selected="selected"' : '').'>Bronze Dragonflight</option>';
			echo '<option value="bronzebeard"'.($data['warcraftfeed_realm'] == 'bronzebeard' ? ' selected="selected"' : '').'>Bronzebeard</option>';
			echo '<option value="burning-blade"'.($data['warcraftfeed_realm'] == 'burning-blade' ? ' selected="selected"' : '').'>Burning Blade</option>';
			echo '<option value="burning-legion"'.($data['warcraftfeed_realm'] == 'burning-legion' ? ' selected="selected"' : '').'>Burning Legion</option>';
			echo '<option value="burning-steppes"'.($data['warcraftfeed_realm'] == 'burning-steppes' ? ' selected="selected"' : '').'>Burning Steppes</option>';
			echo '<option value="caelestrasz"'.($data['warcraftfeed_realm'] == 'caelestrasz' ? ' selected="selected"' : '').'>Caelestrasz</option>';
			echo '<option value="cairne"'.($data['warcraftfeed_realm'] == 'cairne' ? ' selected="selected"' : '').'>Cairne</option>';
			echo '<option value="cenarion-circle"'.($data['warcraftfeed_realm'] == 'cenarion-circle' ? ' selected="selected"' : '').'>Cenarion Circle</option>';
			echo '<option value="cenarius"'.($data['warcraftfeed_realm'] == 'cenarius' ? ' selected="selected"' : '').'>Cenarius</option>';
			echo '<option value="chamber-of-aspects"'.($data['warcraftfeed_realm'] == 'chamber-of-aspects' ? ' selected="selected"' : '').'>Chamber of Aspects</option>';
			echo '<option value="chogall"'.($data['warcraftfeed_realm'] == 'chogall' ? ' selected="selected"' : '').'>Cho\'gall</option>';
			echo '<option value="chromaggus"'.($data['warcraftfeed_realm'] == 'chromaggus' ? ' selected="selected"' : '').'>Chromaggus</option>';
			echo '<option value="coilfang"'.($data['warcraftfeed_realm'] == 'coilfang' ? ' selected="selected"' : '').'>Coilfang</option>';
			echo '<option value="crushridge"'.($data['warcraftfeed_realm'] == 'crushridge' ? ' selected="selected"' : '').'>Crushridge</option>';
			echo '<option value="daggerspine"'.($data['warcraftfeed_realm'] == 'daggerspine' ? ' selected="selected"' : '').'>Daggerspine</option>';
			echo '<option value="dalaran"'.($data['warcraftfeed_realm'] == 'dalaran' ? ' selected="selected"' : '').'>Dalaran</option>';
			echo '<option value="dalvengyr"'.($data['warcraftfeed_realm'] == 'dalvengyr' ? ' selected="selected"' : '').'>Dalvengyr</option>';
			echo '<option value="dark-iron"'.($data['warcraftfeed_realm'] == 'dark-iron' ? ' selected="selected"' : '').'>Dark Iron</option>';
			echo '<option value="darkmoon-faire"'.($data['warcraftfeed_realm'] == 'darkmoon-faire' ? ' selected="selected"' : '').'>Darkmoon Faire</option>';
			echo '<option value="darksorrow"'.($data['warcraftfeed_realm'] == 'darksorrow' ? ' selected="selected"' : '').'>Darksorrow</option>';
			echo '<option value="darkspear"'.($data['warcraftfeed_realm'] == 'darkspear' ? ' selected="selected"' : '').'>Darkspear</option>';
			echo '<option value="darrowmere"'.($data['warcraftfeed_realm'] == 'darrowmere' ? ' selected="selected"' : '').'>Darrowmere</option>';
			echo '<option value="dath"'.($data['warcraftfeed_realm'] == 'dath' ? ' selected="selected"' : '').'>Dath</option>';
			echo '<option value="dawnbringer"'.($data['warcraftfeed_realm'] == 'dawnbringer' ? ' selected="selected"' : '').'>Dawnbringer</option>';
			echo '<option value="deathwing"'.($data['warcraftfeed_realm'] == 'deathwing' ? ' selected="selected"' : '').'>Deathwing</option>';
			echo '<option value="defias-brotherhood"'.($data['warcraftfeed_realm'] == 'defias-brotherhood' ? ' selected="selected"' : '').'>Defias Brotherhood</option>';
			echo '<option value="demon-soul"'.($data['warcraftfeed_realm'] == 'demon-soul' ? ' selected="selected"' : '').'>Demon Soul</option>';
			echo '<option value="dentarg"'.($data['warcraftfeed_realm'] == 'dentarg' ? ' selected="selected"' : '').'>Dentarg</option>';
			echo '<option value="destromath"'.($data['warcraftfeed_realm'] == 'destromath' ? ' selected="selected"' : '').'>Destromath</option>';
			echo '<option value="dethecus"'.($data['warcraftfeed_realm'] == 'dethecus' ? ' selected="selected"' : '').'>Dethecus</option>';
			echo '<option value="detheroc"'.($data['warcraftfeed_realm'] == 'detheroc' ? ' selected="selected"' : '').'>Detheroc</option>';
			echo '<option value="doomhammer"'.($data['warcraftfeed_realm'] == 'doomhammer' ? ' selected="selected"' : '').'>Doomhammer</option>';
			echo '<option value="draenor"'.($data['warcraftfeed_realm'] == 'draenor' ? ' selected="selected"' : '').'>Draenor</option>';
			echo '<option value="dragonblight"'.($data['warcraftfeed_realm'] == 'dragonblight' ? ' selected="selected"' : '').'>Dragonblight</option>';
			echo '<option value="dragonmaw"'.($data['warcraftfeed_realm'] == 'dragonmaw' ? ' selected="selected"' : '').'>Dragonmaw</option>';
			echo '<option value="draktharon"'.($data['warcraftfeed_realm'] == 'draktharon' ? ' selected="selected"' : '').'>Drak\'Tharon</option>';
			echo '<option value="drakthul"'.($data['warcraftfeed_realm'] == 'drakthul' ? ' selected="selected"' : '').'>Drak\'thul</option>';
			echo '<option value="draka"'.($data['warcraftfeed_realm'] == 'draka' ? ' selected="selected"' : '').'>Draka</option>';
			echo '<option value="dreadmaul"'.($data['warcraftfeed_realm'] == 'dreadmaul' ? ' selected="selected"' : '').'>Dreadmaul</option>';
			echo '<option value="drenden"'.($data['warcraftfeed_realm'] == 'drenden' ? ' selected="selected"' : '').'>Drenden</option>';
			echo '<option value="dunemaul"'.($data['warcraftfeed_realm'] == 'dunemaul' ? ' selected="selected"' : '').'>Dunemaul</option>';
			echo '<option value="durotan"'.($data['warcraftfeed_realm'] == 'durotan' ? ' selected="selected"' : '').'>Durotan</option>';
			echo '<option value="duskwood"'.($data['warcraftfeed_realm'] == 'duskwood' ? ' selected="selected"' : '').'>Duskwood</option>';
			echo '<option value="earthen-ring"'.($data['warcraftfeed_realm'] == 'earthen-ring' ? ' selected="selected"' : '').'>Earthen Ring</option>';
			echo '<option value="echo-isles"'.($data['warcraftfeed_realm'] == 'echo-isles' ? ' selected="selected"' : '').'>Echo Isles</option>';
			echo '<option value="eitrigg"'.($data['warcraftfeed_realm'] == 'eitrigg' ? ' selected="selected"' : '').'>Eitrigg</option>';
			echo '<option value="eldrethalas"'.($data['warcraftfeed_realm'] == 'eldrethalas' ? ' selected="selected"' : '').'>Eldre\'Thalas</option>';
			echo '<option value="elune"'.($data['warcraftfeed_realm'] == 'elune' ? ' selected="selected"' : '').'>Elune</option>';
			echo '<option value="emerald-dream"'.($data['warcraftfeed_realm'] == 'emerald-dream' ? ' selected="selected"' : '').'>Emerald Dream</option>';
			echo '<option value="emeriss"'.($data['warcraftfeed_realm'] == 'emeriss' ? ' selected="selected"' : '').'>Emeriss</option>';
			echo '<option value="eonar"'.($data['warcraftfeed_realm'] == 'eonar' ? ' selected="selected"' : '').'>Eonar</option>';
			echo '<option value="eredar"'.($data['warcraftfeed_realm'] == 'eredar' ? ' selected="selected"' : '').'>Eredar</option>';
			echo '<option value="executus"'.($data['warcraftfeed_realm'] == 'executus' ? ' selected="selected"' : '').'>Executus</option>';
			echo '<option value="exodar"'.($data['warcraftfeed_realm'] == 'exodar' ? ' selected="selected"' : '').'>Exodar</option>';
			echo '<option value="farstriders"'.($data['warcraftfeed_realm'] == 'farstriders' ? ' selected="selected"' : '').'>Farstriders</option>';
			echo '<option value="feathermoon"'.($data['warcraftfeed_realm'] == 'feathermoon' ? ' selected="selected"' : '').'>Feathermoon</option>';
			echo '<option value="fenris"'.($data['warcraftfeed_realm'] == 'fenris' ? ' selected="selected"' : '').'>Fenris</option>';
			echo '<option value="firetree"'.($data['warcraftfeed_realm'] == 'firetree' ? ' selected="selected"' : '').'>Firetree</option>';
			echo '<option value="fizzcrank"'.($data['warcraftfeed_realm'] == 'fizzcrank' ? ' selected="selected"' : '').'>Fizzcrank</option>';
			echo '<option value="frostmane"'.($data['warcraftfeed_realm'] == 'frostmane' ? ' selected="selected"' : '').'>Frostmane</option>';
			echo '<option value="frostmourne"'.($data['warcraftfeed_realm'] == 'frostmourne' ? ' selected="selected"' : '').'>Frostmourne</option>';
			echo '<option value="frostwhisper"'.($data['warcraftfeed_realm'] == 'frostwhisper' ? ' selected="selected"' : '').'>Frostwhisper</option>';
			echo '<option value="frostwolf"'.($data['warcraftfeed_realm'] == 'frostwolf' ? ' selected="selected"' : '').'>Frostwolf</option>';
			echo '<option value="galakrond"'.($data['warcraftfeed_realm'] == 'galakrond' ? ' selected="selected"' : '').'>Galakrond</option>';
			echo '<option value="garithos"'.($data['warcraftfeed_realm'] == 'garithos' ? ' selected="selected"' : '').'>Garithos</option>';
			echo '<option value="garona"'.($data['warcraftfeed_realm'] == 'garona' ? ' selected="selected"' : '').'>Garona</option>';
			echo '<option value="garrosh"'.($data['warcraftfeed_realm'] == 'garrosh' ? ' selected="selected"' : '').'>Garrosh</option>';
			echo '<option value="genjuros"'.($data['warcraftfeed_realm'] == 'genjuros' ? ' selected="selected"' : '').'>Genjuros</option>';
			echo '<option value="ghostlands"'.($data['warcraftfeed_realm'] == 'ghostlands' ? ' selected="selected"' : '').'>Ghostlands</option>';
			echo '<option value="gilneas"'.($data['warcraftfeed_realm'] == 'gilneas' ? ' selected="selected"' : '').'>Gilneas</option>';
			echo '<option value="gnomeregan"'.($data['warcraftfeed_realm'] == 'gnomeregan' ? ' selected="selected"' : '').'>Gnomeregan</option>';
			echo '<option value="gorefiend"'.($data['warcraftfeed_realm'] == 'gorefiend' ? ' selected="selected"' : '').'>Gorefiend</option>';
			echo '<option value="gorgonnash"'.($data['warcraftfeed_realm'] == 'gorgonnash' ? ' selected="selected"' : '').'>Gorgonnash</option>';
			echo '<option value="greymane"'.($data['warcraftfeed_realm'] == 'greymane' ? ' selected="selected"' : '').'>Greymane</option>';
			echo '<option value="grim-batol"'.($data['warcraftfeed_realm'] == 'grim-batol' ? ' selected="selected"' : '').'>Grim Batol</option>';
			echo '<option value="grizzly-hills"'.($data['warcraftfeed_realm'] == 'grizzly-hills' ? ' selected="selected"' : '').'>Grizzly Hills</option>';
			echo '<option value="guldan"'.($data['warcraftfeed_realm'] == 'guldan' ? ' selected="selected"' : '').'>Gul\'dan</option>';
			echo '<option value="gundrak"'.($data['warcraftfeed_realm'] == 'gundrak' ? ' selected="selected"' : '').'>Gundrak</option>';
			echo '<option value="gurubashi"'.($data['warcraftfeed_realm'] == 'gurubashi' ? ' selected="selected"' : '').'>Gurubashi</option>';
			echo '<option value="hakkar"'.($data['warcraftfeed_realm'] == 'hakkar' ? ' selected="selected"' : '').'>Hakkar</option>';
			echo '<option value="haomarush"'.($data['warcraftfeed_realm'] == 'haomarush' ? ' selected="selected"' : '').'>Haomarush</option>';
			echo '<option value="hellfire"'.($data['warcraftfeed_realm'] == 'hellfire' ? ' selected="selected"' : '').'>Hellfire</option>';
			echo '<option value="hellscream"'.($data['warcraftfeed_realm'] == 'hellscream' ? ' selected="selected"' : '').'>Hellscream</option>';
			echo '<option value="hydraxis"'.($data['warcraftfeed_realm'] == 'hydraxis' ? ' selected="selected"' : '').'>Hydraxis</option>';
			echo '<option value="hyjal"'.($data['warcraftfeed_realm'] == 'hyjal' ? ' selected="selected"' : '').'>Hyjal</option>';
			echo '<option value="icecrown"'.($data['warcraftfeed_realm'] == 'icecrown' ? ' selected="selected"' : '').'>Icecrown</option>';
			echo '<option value="illidan"'.($data['warcraftfeed_realm'] == 'illidan' ? ' selected="selected"' : '').'>Illidan</option>';
			echo '<option value="jaedenar"'.($data['warcraftfeed_realm'] == 'jaedenar' ? ' selected="selected"' : '').'>Jaedenar</option>';
			echo '<option value="jubeithos"'.($data['warcraftfeed_realm'] == 'jubeithos' ? ' selected="selected"' : '').'>Jubei\'Thos</option>';
			echo '<option value="kaelthas"'.($data['warcraftfeed_realm'] == 'kaelthas' ? ' selected="selected"' : '').'>Kael\'thas</option>';
			echo '<option value="kalecgos"'.($data['warcraftfeed_realm'] == 'kalecgos' ? ' selected="selected"' : '').'>Kalecgos</option>';
			echo '<option value="karazhan"'.($data['warcraftfeed_realm'] == 'karazhan' ? ' selected="selected"' : '').'>Karazhan</option>';
			echo '<option value="kargath"'.($data['warcraftfeed_realm'] == 'kargath' ? ' selected="selected"' : '').'>Kargath</option>';
			echo '<option value="kazzak"'.($data['warcraftfeed_realm'] == 'kazzak' ? ' selected="selected"' : '').'>Kazzak</option>';
			echo '<option value="kelthuzad"'.($data['warcraftfeed_realm'] == 'kelthuzad' ? ' selected="selected"' : '').'>Kel\'Thuzad</option>';
			echo '<option value="khadgar"'.($data['warcraftfeed_realm'] == 'khadgar' ? ' selected="selected"' : '').'>Khadgar</option>';
			echo '<option value="khaz-modan"'.($data['warcraftfeed_realm'] == 'khaz-modan' ? ' selected="selected"' : '').'>Khaz Modan</option>';
			echo '<option value="khazgoroth"'.($data['warcraftfeed_realm'] == 'khazgoroth' ? ' selected="selected"' : '').'>Khaz\'goroth</option>';
			echo '<option value="kiljaeden"'.($data['warcraftfeed_realm'] == 'kiljaeden' ? ' selected="selected"' : '').'>Kil\'jaeden</option>';
			echo '<option value="kilrogg"'.($data['warcraftfeed_realm'] == 'kilrogg' ? ' selected="selected"' : '').'>Kilrogg</option>';
			echo '<option value="kirin-tor"'.($data['warcraftfeed_realm'] == 'kirin-tor' ? ' selected="selected"' : '').'>Kirin Tor</option>';
			echo '<option value="korgall"'.($data['warcraftfeed_realm'] == 'korgall' ? ' selected="selected"' : '').'>Kor\'gall</option>';
			echo '<option value="korgath"'.($data['warcraftfeed_realm'] == 'korgath' ? ' selected="selected"' : '').'>Korgath</option>';
			echo '<option value="korialstrasz"'.($data['warcraftfeed_realm'] == 'korialstrasz' ? ' selected="selected"' : '').'>Korialstrasz</option>';
			echo '<option value="kul-tiras"'.($data['warcraftfeed_realm'] == 'kul-tiras' ? ' selected="selected"' : '').'>Kul Tiras</option>';
			echo '<option value="laughing-skull"'.($data['warcraftfeed_realm'] == 'laughing-skull' ? ' selected="selected"' : '').'>Laughing Skull</option>';
			echo '<option value="lethon"'.($data['warcraftfeed_realm'] == 'lethon' ? ' selected="selected"' : '').'>Lethon</option>';
			echo '<option value="lightbringer"'.($data['warcraftfeed_realm'] == 'lightbringer' ? ' selected="selected"' : '').'>Lightbringer</option>';
			echo '<option value="lightnings-blade"'.($data['warcraftfeed_realm'] == 'lightnings-blade' ? ' selected="selected"' : '').'>Lightning\'s Blade</option>';
			echo '<option value="lightninghoof"'.($data['warcraftfeed_realm'] == 'lightninghoof' ? ' selected="selected"' : '').'>Lightninghoof</option>';
			echo '<option value="llane"'.($data['warcraftfeed_realm'] == 'llane' ? ' selected="selected"' : '').'>Llane</option>';
			echo '<option value="lothar"'.($data['warcraftfeed_realm'] == 'lothar' ? ' selected="selected"' : '').'>Lothar</option>';
			echo '<option value="madoran"'.($data['warcraftfeed_realm'] == 'madoran' ? ' selected="selected"' : '').'>Madoran</option>';
			echo '<option value="maelstrom"'.($data['warcraftfeed_realm'] == 'maelstrom' ? ' selected="selected"' : '').'>Maelstrom</option>';
			echo '<option value="magtheridon"'.($data['warcraftfeed_realm'] == 'magtheridon' ? ' selected="selected"' : '').'>Magtheridon</option>';
			echo '<option value="maiev"'.($data['warcraftfeed_realm'] == 'maiev' ? ' selected="selected"' : '').'>Maiev</option>';
			echo '<option value="malganis"'.($data['warcraftfeed_realm'] == 'malganis' ? ' selected="selected"' : '').'>Mal\'Ganis</option>';
			echo '<option value="malfurion"'.($data['warcraftfeed_realm'] == 'malfurion' ? ' selected="selected"' : '').'>Malfurion</option>';
			echo '<option value="malorne"'.($data['warcraftfeed_realm'] == 'malorne' ? ' selected="selected"' : '').'>Malorne</option>';
			echo '<option value="malygos"'.($data['warcraftfeed_realm'] == 'malygos' ? ' selected="selected"' : '').'>Malygos</option>';
			echo '<option value="mannoroth"'.($data['warcraftfeed_realm'] == 'mannoroth' ? ' selected="selected"' : '').'>Mannoroth</option>';
			echo '<option value="mazrigos"'.($data['warcraftfeed_realm'] == 'mazrigos' ? ' selected="selected"' : '').'>Mazrigos</option>';
			echo '<option value="medivh"'.($data['warcraftfeed_realm'] == 'medivh' ? ' selected="selected"' : '').'>Medivh</option>';
			echo '<option value="misha"'.($data['warcraftfeed_realm'] == 'misha' ? ' selected="selected"' : '').'>Misha</option>';
			echo '<option value="mok"'.($data['warcraftfeed_realm'] == 'mok' ? ' selected="selected"' : '').'>Mok</option>';
			echo '<option value="moon-guard"'.($data['warcraftfeed_realm'] == 'moon-guard' ? ' selected="selected"' : '').'>Moon Guard</option>';
			echo '<option value="moonglade"'.($data['warcraftfeed_realm'] == 'moonglade' ? ' selected="selected"' : '').'>Moonglade</option>';
			echo '<option value="moonrunner"'.($data['warcraftfeed_realm'] == 'moonrunner' ? ' selected="selected"' : '').'>Moonrunner</option>';
			echo '<option value="mugthol"'.($data['warcraftfeed_realm'] == 'mugthol' ? ' selected="selected"' : '').'>Mug\'thol</option>';
			echo '<option value="muradin"'.($data['warcraftfeed_realm'] == 'muradin' ? ' selected="selected"' : '').'>Muradin</option>';
			echo '<option value="nagrand"'.($data['warcraftfeed_realm'] == 'nagrand' ? ' selected="selected"' : '').'>Nagrand</option>';
			echo '<option value="nathrezim"'.($data['warcraftfeed_realm'] == 'nathrezim' ? ' selected="selected"' : '').'>Nathrezim</option>';
			echo '<option value="nazgrel"'.($data['warcraftfeed_realm'] == 'nazgrel' ? ' selected="selected"' : '').'>Nazgrel</option>';
			echo '<option value="nazjatar"'.($data['warcraftfeed_realm'] == 'nazjatar' ? ' selected="selected"' : '').'>Nazjatar</option>';
			echo '<option value="neptulon"'.($data['warcraftfeed_realm'] == 'neptulon' ? ' selected="selected"' : '').'>Neptulon</option>';
			echo '<option value="nerzhul"'.($data['warcraftfeed_realm'] == 'nerzhul' ? ' selected="selected"' : '').'>Ner\'zhul</option>';
			echo '<option value="nesingwary"'.($data['warcraftfeed_realm'] == 'nesingwary' ? ' selected="selected"' : '').'>Nesingwary</option>';
			echo '<option value="nordrassil"'.($data['warcraftfeed_realm'] == 'nordrassil' ? ' selected="selected"' : '').'>Nordrassil</option>';
			echo '<option value="norgannon"'.($data['warcraftfeed_realm'] == 'norgannon' ? ' selected="selected"' : '').'>Norgannon</option>';
			echo '<option value="onyxia"'.($data['warcraftfeed_realm'] == 'onyxia' ? ' selected="selected"' : '').'>Onyxia</option>';
			echo '<option value="outland"'.($data['warcraftfeed_realm'] == 'outland' ? ' selected="selected"' : '').'>Outland</option>';
			echo '<option value="perenolde"'.($data['warcraftfeed_realm'] == 'perenolde' ? ' selected="selected"' : '').'>Perenolde</option>';
			echo '<option value="proudmoore"'.($data['warcraftfeed_realm'] == 'proudmoore' ? ' selected="selected"' : '').'>Proudmoore</option>';
			echo '<option value="quel"'.($data['warcraftfeed_realm'] == 'quel' ? ' selected="selected"' : '').'>Quel</option>';
			echo '<option value="quelthalas"'.($data['warcraftfeed_realm'] == 'quelthalas' ? ' selected="selected"' : '').'>Quel\'Thalas</option>';
			echo '<option value="ragnaros"'.($data['warcraftfeed_realm'] == 'ragnaros' ? ' selected="selected"' : '').'>Ragnaros</option>';
			echo '<option value="ravencrest"'.($data['warcraftfeed_realm'] == 'ravencrest' ? ' selected="selected"' : '').'>Ravencrest</option>';
			echo '<option value="ravenholdt"'.($data['warcraftfeed_realm'] == 'ravenholdt' ? ' selected="selected"' : '').'>Ravenholdt</option>';
			echo '<option value="rexxar"'.($data['warcraftfeed_realm'] == 'rexxar' ? ' selected="selected"' : '').'>Rexxar</option>';
			echo '<option value="rivendare"'.($data['warcraftfeed_realm'] == 'rivendare' ? ' selected="selected"' : '').'>Rivendare</option>';
			echo '<option value="runetotem"'.($data['warcraftfeed_realm'] == 'runetotem' ? ' selected="selected"' : '').'>Runetotem</option>';
			echo '<option value="sargeras"'.($data['warcraftfeed_realm'] == 'sargeras' ? ' selected="selected"' : '').'>Sargeras</option>';
			echo '<option value="saurfang"'.($data['warcraftfeed_realm'] == 'saurfang' ? ' selected="selected"' : '').'>Saurfang</option>';
			echo '<option value="scarlet-crusade"'.($data['warcraftfeed_realm'] == 'scarlet-crusade' ? ' selected="selected"' : '').'>Scarlet Crusade</option>';
			echo '<option value="scarshield-legion"'.($data['warcraftfeed_realm'] == 'scarshield-legion' ? ' selected="selected"' : '').'>Scarshield Legion</option>';
			echo '<option value="scilla"'.($data['warcraftfeed_realm'] == 'scilla' ? ' selected="selected"' : '').'>Scilla</option>';
			echo '<option value="senjin"'.($data['warcraftfeed_realm'] == 'senjin' ? ' selected="selected"' : '').'>Sen\'jin</option>';
			echo '<option value="sentinels"'.($data['warcraftfeed_realm'] == 'sentinels' ? ' selected="selected"' : '').'>Sentinels</option>';
			echo '<option value="shadow-council"'.($data['warcraftfeed_realm'] == 'shadow-council' ? ' selected="selected"' : '').'>Shadow Council</option>';
			echo '<option value="shadowmoon"'.($data['warcraftfeed_realm'] == 'shadowmoon' ? ' selected="selected"' : '').'>Shadowmoon</option>';
			echo '<option value="shadowsong"'.($data['warcraftfeed_realm'] == 'shadowsong' ? ' selected="selected"' : '').'>Shadowsong</option>';
			echo '<option value="shandris"'.($data['warcraftfeed_realm'] == 'shandris' ? ' selected="selected"' : '').'>Shandris</option>';
			echo '<option value="shattered-halls"'.($data['warcraftfeed_realm'] == 'shattered-halls' ? ' selected="selected"' : '').'>Shattered Halls</option>';
			echo '<option value="shattered-hand"'.($data['warcraftfeed_realm'] == 'shattered-hand' ? ' selected="selected"' : '').'>Shattered Hand</option>';
			echo '<option value="shuhalo"'.($data['warcraftfeed_realm'] == 'shuhalo' ? ' selected="selected"' : '').'>Shu\'halo</option>';
			echo '<option value="silver-hand"'.($data['warcraftfeed_realm'] == 'silver-hand' ? ' selected="selected"' : '').'>Silver Hand</option>';
			echo '<option value="silvermoon"'.($data['warcraftfeed_realm'] == 'silvermoon' ? ' selected="selected"' : '').'>Silvermoon</option>';
			echo '<option value="sisters-of-elune"'.($data['warcraftfeed_realm'] == 'sisters-of-elune' ? ' selected="selected"' : '').'>Sisters of Elune</option>';
			echo '<option value="skullcrusher"'.($data['warcraftfeed_realm'] == 'skullcrusher' ? ' selected="selected"' : '').'>Skullcrusher</option>';
			echo '<option value="skywall"'.($data['warcraftfeed_realm'] == 'skywall' ? ' selected="selected"' : '').'>Skywall</option>';
			echo '<option value="smolderthorn"'.($data['warcraftfeed_realm'] == 'smolderthorn' ? ' selected="selected"' : '').'>Smolderthorn</option>';
			echo '<option value="spinebreaker"'.($data['warcraftfeed_realm'] == 'spinebreaker' ? ' selected="selected"' : '').'>Spinebreaker</option>';
			echo '<option value="spirestone"'.($data['warcraftfeed_realm'] == 'spirestone' ? ' selected="selected"' : '').'>Spirestone</option>';
			echo '<option value="sporeggar"'.($data['warcraftfeed_realm'] == 'sporeggar' ? ' selected="selected"' : '').'>Sporeggar</option>';
			echo '<option value="staghelm"'.($data['warcraftfeed_realm'] == 'staghelm' ? ' selected="selected"' : '').'>Staghelm</option>';
			echo '<option value="steamwheedle-cartel"'.($data['warcraftfeed_realm'] == 'steamwheedle-cartel' ? ' selected="selected"' : '').'>Steamwheedle Cartel</option>';
			echo '<option value="stonemaul"'.($data['warcraftfeed_realm'] == 'stonemaul' ? ' selected="selected"' : '').'>Stonemaul</option>';
			echo '<option value="stormrage"'.($data['warcraftfeed_realm'] == 'stormrage' ? ' selected="selected"' : '').'>Stormrage</option>';
			echo '<option value="stormreaver"'.($data['warcraftfeed_realm'] == 'stormreaver' ? ' selected="selected"' : '').'>Stormreaver</option>';
			echo '<option value="stormscale"'.($data['warcraftfeed_realm'] == 'stormscale' ? ' selected="selected"' : '').'>Stormscale</option>';
			echo '<option value="sunstrider"'.($data['warcraftfeed_realm'] == 'sunstrider' ? ' selected="selected"' : '').'>Sunstrider</option>';
			echo '<option value="suramar"'.($data['warcraftfeed_realm'] == 'suramar' ? ' selected="selected"' : '').'>Suramar</option>';
			echo '<option value="sylvanas"'.($data['warcraftfeed_realm'] == 'sylvanas' ? ' selected="selected"' : '').'>Sylvanas</option>';
			echo '<option value="talnivarr"'.($data['warcraftfeed_realm'] == 'talnivarr' ? ' selected="selected"' : '').'>Talnivarr</option>';
			echo '<option value="tanaris"'.($data['warcraftfeed_realm'] == 'tanaris' ? ' selected="selected"' : '').'>Tanaris</option>';
			echo '<option value="tarren-mill"'.($data['warcraftfeed_realm'] == 'tarren-mill' ? ' selected="selected"' : '').'>Tarren Mill</option>';
			echo '<option value="terenas"'.($data['warcraftfeed_realm'] == 'terenas' ? ' selected="selected"' : '').'>Terenas</option>';
			echo '<option value="terokkar"'.($data['warcraftfeed_realm'] == 'terokkar' ? ' selected="selected"' : '').'>Terokkar</option>';
			echo '<option value="thaurissan"'.($data['warcraftfeed_realm'] == 'thaurissan' ? ' selected="selected"' : '').'>Thaurissan</option>';
			echo '<option value="the-forgotten-coast"'.($data['warcraftfeed_realm'] == 'the-forgotten-coast' ? ' selected="selected"' : '').'>The Forgotten Coast</option>';
			echo '<option value="the-maelstrom"'.($data['warcraftfeed_realm'] == 'the-maelstrom' ? ' selected="selected"' : '').'>The Maelstrom</option>';
			echo '<option value="the-scryers"'.($data['warcraftfeed_realm'] == 'the-scryers' ? ' selected="selected"' : '').'>The Scryers</option>';
			echo '<option value="the-shatar"'.($data['warcraftfeed_realm'] == 'the-shatar' ? ' selected="selected"' : '').'>The Sha\'tar</option>';
			echo '<option value="the-underbog"'.($data['warcraftfeed_realm'] == 'the-underbog' ? ' selected="selected"' : '').'>The Underbog</option>';
			echo '<option value="the-venture-co."'.($data['warcraftfeed_realm'] == 'the-venture-co.' ? ' selected="selected"' : '').'>The Venture Co.</option>';
			echo '<option value="thorium-brotherhood"'.($data['warcraftfeed_realm'] == 'thorium-brotherhood' ? ' selected="selected"' : '').'>Thorium Brotherhood</option>';
			echo '<option value="thrall"'.($data['warcraftfeed_realm'] == 'thrall' ? ' selected="selected"' : '').'>Thrall</option>';
			echo '<option value="thunderhorn"'.($data['warcraftfeed_realm'] == 'thunderhorn' ? ' selected="selected"' : '').'>Thunderhorn</option>';
			echo '<option value="thunderlord"'.($data['warcraftfeed_realm'] == 'thunderlord' ? ' selected="selected"' : '').'>Thunderlord</option>';
			echo '<option value="tichondrius"'.($data['warcraftfeed_realm'] == 'tichondrius' ? ' selected="selected"' : '').'>Tichondrius</option>';
			echo '<option value="tortheldrin"'.($data['warcraftfeed_realm'] == 'tortheldrin' ? ' selected="selected"' : '').'>Tortheldrin</option>';
			echo '<option value="trollbane"'.($data['warcraftfeed_realm'] == 'trollbane' ? ' selected="selected"' : '').'>Trollbane</option>';
			echo '<option value="turalyon"'.($data['warcraftfeed_realm'] == 'turalyon' ? ' selected="selected"' : '').'>Turalyon</option>';
			echo '<option value="twilights-hammer"'.($data['warcraftfeed_realm'] == 'twilights-hammer' ? ' selected="selected"' : '').'>Twilight\'s Hammer</option>';
			echo '<option value="twisting-nether"'.($data['warcraftfeed_realm'] == 'twisting-nether' ? ' selected="selected"' : '').'>Twisting Nether</option>';
			echo '<option value="uldaman"'.($data['warcraftfeed_realm'] == 'uldaman' ? ' selected="selected"' : '').'>Uldaman</option>';
			echo '<option value="uldum"'.($data['warcraftfeed_realm'] == 'uldum' ? ' selected="selected"' : '').'>Uldum</option>';
			echo '<option value="undermine"'.($data['warcraftfeed_realm'] == 'undermine' ? ' selected="selected"' : '').'>Undermine</option>';
			echo '<option value="ursin"'.($data['warcraftfeed_realm'] == 'ursin' ? ' selected="selected"' : '').'>Ursin</option>';
			echo '<option value="uther"'.($data['warcraftfeed_realm'] == 'uther' ? ' selected="selected"' : '').'>Uther</option>';
			echo '<option value="vashj"'.($data['warcraftfeed_realm'] == 'vashj' ? ' selected="selected"' : '').'>Vashj</option>';
			echo '<option value="veknilash"'.($data['warcraftfeed_realm'] == 'veknilash' ? ' selected="selected"' : '').'>Vek\'nilash</option>';
			echo '<option value="velen"'.($data['warcraftfeed_realm'] == 'velen' ? ' selected="selected"' : '').'>Velen</option>';
			echo '<option value="warsong"'.($data['warcraftfeed_realm'] == 'warsong' ? ' selected="selected"' : '').'>Warsong</option>';
			echo '<option value="whisperwind"'.($data['warcraftfeed_realm'] == 'whisperwind' ? ' selected="selected"' : '').'>Whisperwind</option>';
			echo '<option value="wildhammer"'.($data['warcraftfeed_realm'] == 'wildhammer' ? ' selected="selected"' : '').'>Wildhammer</option>';
			echo '<option value="windrunner"'.($data['warcraftfeed_realm'] == 'windrunner' ? ' selected="selected"' : '').'>Windrunner</option>';
			echo '<option value="winterhoof"'.($data['warcraftfeed_realm'] == 'winterhoof' ? ' selected="selected"' : '').'>Winterhoof</option>';
			echo '<option value="wyrmrest-accord"'.($data['warcraftfeed_realm'] == 'wyrmrest-accord' ? ' selected="selected"' : '').'>Wyrmrest Accord</option>';
			echo '<option value="xavius"'.($data['warcraftfeed_realm'] == 'xavius' ? ' selected="selected"' : '').'>Xavius</option>';
			echo '<option value="ysera"'.($data['warcraftfeed_realm'] == 'ysera' ? ' selected="selected"' : '').'>Ysera</option>';
			echo '<option value="ysondre"'.($data['warcraftfeed_realm'] == 'ysondre' ? ' selected="selected"' : '').'>Ysondre</option>';
			echo '<option value="zangarmarsh"'.($data['warcraftfeed_realm'] == 'zangarmarsh' ? ' selected="selected"' : '').'>Zangarmarsh</option>';
			echo '<option value="zenedar"'.($data['warcraftfeed_realm'] == 'zenedar' ? ' selected="selected"' : '').'>Zenedar</option>';
			echo '<option value="zuljin"'.($data['warcraftfeed_realm'] == 'zuljin' ? ' selected="selected"' : '').'>Zul\'jin</option>';
			echo '<option value="zuluhed"'.($data['warcraftfeed_realm'] == 'zuluhed' ? ' selected="selected"' : '').'>Zuluhed</option>';
			echo '</select>';
			
			echo '<p><label>Region<br /></label><select name="warcraftfeed_region"><option '.($data['warcraftfeed_region'] == 'eu' ? 'selected="selected" ' : '').'value="eu">Europe</option><option '.($data['warcraftfeed_region'] == 'us' ? 'selected="selected" ' : '').'value="us">United States</option></select></p>';
			echo '<p><input type="checkbox" name="warcraftfeed_includeInformation" value="checked"'.($data['warcraftfeed_includeInformation'] == true ? ' checked="checked"' : '').'><label>&nbsp;Include character information</label></p>';
			echo '<p><input type="checkbox" name="warcraftfeed_includeAchievements" value="checked"'.($data['warcraftfeed_includeAchievements'] == true ? ' checked="checked"' : '').'><label>&nbsp;Include latest achievements</label></p>';
			if(isset($_POST['warcraftfeed_character']))
			{
				$data['warcraftfeed_character'] = attribute_escape($_POST['warcraftfeed_character']);
				$data['warcraftfeed_realm'] = attribute_escape(strtolower(str_replace("'", '', str_replace(' ', '-', trim($_POST['warcraftfeed_realm'])))));
				$data['warcraftfeed_region'] = attribute_escape($_POST['warcraftfeed_region']);
				$data['warcraftfeed_includeInformation'] = ($_POST['warcraftfeed_includeInformation'] == 'checked' ? true : false);
				$data['warcraftfeed_includeAchievements'] = ($_POST['warcraftfeed_includeAchievements'] == 'checked' ? true : false);
				$data['warcraftfeed_title'] = attribute_escape($_POST['warcraftfeed_title']);
				update_option('warcraftfeed', $data);
			}
		}
		
		function widget($args) 
		{
			$pluginDirectory = WP_CONTENT_URL . "/plugins/" . plugin_basename(dirname(__FILE__));
			
			echo $args['before_widget'];
			echo $args['before_title'];
			$data = get_option('warcraftfeed');
			echo $data['warcraftfeed_title'];
			echo $args['after_title'];
			echo '<script type="text/javascript" src="'.$pluginDirectory.'/jquery.warcraftfeed.js"></script>';
			echo '<script type="text/javascript">'.'
					var $wfj = jQuery.noConflict();
					$wfj(function(){
						$wfj'."('#warcraftfeed_content').warcraftfeed({characterName: '".$data['warcraftfeed_character']."',
															realmName: '".$data['warcraftfeed_realm']."',
															region: '".$data['warcraftfeed_region']."',
															includeGeneralInformation: ".($data['warcraftfeed_includeInformation'] == true ? "true" : "false").",
															includeLatestAchievements: ".($data['warcraftfeed_includeAchievements'] == true ? "true" : "false")."});
					});".'
				</script>';
			echo '<div id="warcraftfeed_content" style="margin-left: 25px;"></div>';
			echo $args['after_widget'];
		}
		
		function register()
		{
			register_sidebar_widget( 'warcraftfeed', array('warcraftfeed', 'widget'));  
			register_widget_control( 'warcraftfeed', array('warcraftfeed', 'control'));
		}
	}
?>

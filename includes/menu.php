<div id="hit_area" onmouseover="toggleDown();"></div>
   <div id="menu_holder">
      <div id="nav">
           <ul>
           <li><a href="#" onClick="navega('index.php')"><?php echo $menu_1; ?></a></li>
           <li><a href="#" onClick="navega('send.php')"><?php echo $menu_2; ?></a></li>
           <li><a href="#" onClick="navega('list.php')"><?php echo $menu_3; ?></a></li>
		   <?php
			if ( isset($_SESSION["lang"]) && $_SESSION["lang"]=="en" ){
		   ?>
				<li><a href="#" onClick="navega('index.php?lang=es')">&nbsp;<img align="center" src="images/esp.jpg" /></a></li>
		   <?php } else {?>
				<li><a href="#" onClick="navega('index.php?lang=en')">&nbsp;<img align="center" src="images/en2.jpg" /></a></li>
		   <?php }?>
		   <li><a href="#" onClick="navega('salir.php')"><?php echo $menu_5; ?></a></li>
           </ul>
      </div>
</div>
<div id="hit_area2" onmouseover="toggleUp();" />

	<header>
            <h1><a href="<?php print $front_page; ?>"><?php print $site_name ?></a></h1>
            <form id="search" action="#">
                <fieldset>
                    <input type="search" name="search" placeholder="rechercher">
                    <button type="submit" class="icon-search"><span>chercher</span></button>
                </fieldset>
            </form>
            <div id="langues">
                <a href="#" hreflang="fr">fr</a>
                <a href="#" hreflang="en">en</a>
            </div>
   </header>
   <nav>
   		<?php if (isset($primary_links)) { ?>
   		<div id="primary"><?php print theme('links', $primary_links) ?></div><?php } ?>
        <?php print theme('links__system_main_menu', array(
                                  'links' => $main_menu,
                                  'attributes' => array(
                                    'id' => 'main-menu-links',
                                    'class' => array('links', 'clearfix'),
                                  ),
                                  'heading' => array(
                                    'text' => t('Main menu'),
                                    'level' => 'h2',
                                    'class' => array('element-invisible'),
                                  ),   
        )); ?>
   </nav>
    <div>
            <section id="description">
           <?php if ($page['content']) :
	           		print render($page['content']); ?>
	       <?php endif; ?>
    		</section>
    		<?php if ($page['sidebar_first']): ?>
    		<section id="publications">
	    		<?php print render($page['sidebar_first']); ?>
    		</section>
    		<?php endif; ?>
    		<?php if($page['footer']):
    			print render($page['footer']); ?>
    		<?php endif; ?>
</body>
</html>
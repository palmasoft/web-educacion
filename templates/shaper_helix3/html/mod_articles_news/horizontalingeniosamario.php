<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<style type="text/css">
	
	#list-ult-articulos-puroingeniosamario a:before {
		content: '';
	}
	
	#list-ult-articulos-puroingeniosamario > li:first-child {
		padding-right: 5px;
	}
	
	#list-ult-articulos-puroingeniosamario > li {
		padding-left: 5px;
		padding-right: 5px;
	}
	
	#list-ult-articulos-puroingeniosamario > li:last-child {
		padding-left: 5px;
	}
	
</style>
<ul id="list-ult-articulos-puroingeniosamario" class="newsflash-horiz<?php echo $params->get('moduleclass_sfx'); ?>">
	<?php for ($i = 0, $n = count($list); $i < $n; $i ++) : ?>
		<?php $item = $list[$i]; ?>
		<?php	    
        $images = json_decode($item->images);  
        if (!empty($images->image_fulltext)) {
        	$image = $images->image_fulltext;
        	$caption = $images->image_fulltext_caption;
        	$alt = $images->image_fulltext_alt;
        } else if (!empty($images->image_intro)) {
        	$image = $images->image_intro;
        	$caption = $images->image_intro_caption;
        	$alt = $images->image_intro_alt;
        } else  {
        	$image = '/images/fondos/fondo-blank.png';
        	$caption = $item->title;
        	$alt = 'sin imagen';				
        }
        ?>
		<li class="<?php echo $params->get('moduleclass_sfx'); ?> <?php echo $params->get('header_class'); ?>  sppb-wow zoomInUp clearfix sppb-animated"  data-sppb-wow-duration="300ms"  data-sppb-wow-delay="700ms"  style="visibility: visible; animation-duration: 300ms; animation-delay: 700ms; animation-name: zoomInUp;"  >
			<a href="<?php echo $item->link; ?>">
				<img src="<?= $image ?>" alt="<?= $alt ?>" title="<?= $caption ?>" class="img d-block w-100 img-thumb pull pull-left" />
			</a>
			<?php require JModuleHelper::getLayoutPath('mod_articles_news', '_item'); ?>

			<?php if ($n > 1 && (($i < $n - 1) || $params->get('showLastSeparator'))) : ?>
				<span class="article-separator">&#160;</span>
			<?php endif; ?>
		</li>
		
		
		<?php if( ($i + 1) != 0 and ($i + 1) % 4  == 0): ?>
		<li class="clear clearfix" ></li>
		<?php endif; ?>
		
		
	<?php endfor; ?>
</ul>

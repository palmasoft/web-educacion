<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
$item_heading = $params->get('item_heading', 'h4');
	$images = json_decode($item->images);  
	if (!empty($images->image_intro)) {
		$image = $images->image_intro;
		$caption = $images->image_intro_caption;
		$alt = $images->image_intro_alt;
	} else if (!empty($images->image_fulltext)) {
		$image = $images->image_fulltext;
		$caption = $images->image_fulltext_caption;
		$alt = $images->image_fulltext_alt;
	} else {
		$image = 'templates/'.T3_TEMPLATE.'/images/blank.gif';
		$caption = '';
		$alt = '';				
	}
?>
<a href="<?php echo $item->link; ?>">
  <img  title="<?php echo htmlspecialchars( $item->title) ?>" src="<?php echo htmlspecialchars($image); ?>" 
        alt="<?php echo htmlspecialchars($alt); ?>" style="max-width: 100%" />
</a>
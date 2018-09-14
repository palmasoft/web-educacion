<?php
/**
 * @version    2.7.x
 * @package    K2
 * @author     JoomlaWorks http://www.joomlaworks.net
 * @copyright  Copyright (c) 2006 - 2016 JoomlaWorks Ltd. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;
?>

<div id="k2ModuleBox<?php echo $module->id; ?>" class="single-footer-widget k2ItemsBlock<?php if($params->get('moduleclass_sfx')) echo ' '.$params->get('moduleclass_sfx'); ?>">

	<?php if($params->get('itemPreText')): ?>
	<p class="modulePretext"><?php echo $params->get('itemPreText'); ?></p>
	<?php endif; ?>

	<?php if(count($items)): ?>
  
    <?php foreach ($items as $key=>$item):	?>
		
		
	<ul class="popular-news clearfix">
       <li class="single-popular-news-item clearfix">
          <div class="img-holder">
             <?php if($params->get('itemImage') && isset($item->image)): ?>
				<img class="img-responsive" src="<?php echo $item->image; ?>" alt="<?php echo K2HelperUtilities::cleanHtml($item->title); ?>"/>
			 <?php endif; ?>
			<div class="overlay">
				<div class="box">
					<div class="content">
						 <a href="<?php echo $item->link; ?>"><i class="fa fa-link" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
         </div>
         <div class="text-holder">
			 <?php if($params->get('itemTitle')): ?>
				<a class="moduleItemTitle" href="<?php echo $item->link; ?>"><p><?php echo $item->title; ?></p></a>
			<?php endif; ?>
		
          <ul class="info">
			 <li>
				<?php if($params->get('itemDateCreated')): ?>
					<?php echo JHTML::_('date', $item->created, JText::_('F, d Y')); ?>
				<?php endif; ?>
			  </li>
		  </ul>    
        </div>
      </li>
    </ul>
	<?php endforeach; ?>
   
  <?php endif; ?>

	<?php if($params->get('itemCustomLink')): ?>
	<a class="moduleCustomLink" href="<?php echo $params->get('itemCustomLinkURL'); ?>" title="<?php echo K2HelperUtilities::cleanHtml($itemCustomLinkTitle); ?>"><?php echo $itemCustomLinkTitle; ?></a>
	<?php endif; ?>

	<?php if($params->get('feed')): ?>
	<div class="k2FeedIcon">
		<a href="<?php echo JRoute::_('index.php?option=com_k2&view=itemlist&format=feed&moduleID='.$module->id); ?>" title="<?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?>">
			<i class="k2icon-feed"></i>
			<span><?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?></span>
		</a>
		<div class="clr"></div>
	</div>
	<?php endif; ?>

</div>

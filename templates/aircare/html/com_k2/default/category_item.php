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

// Define default image size (do not change)
K2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);

?>

<!-- Start K2 Item Layout -->
<div class="catItemView group<?php echo ucfirst($this->item->itemGroup); ?><?php echo ($this->item->featured) ? ' catItemIsFeatured' : ''; ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?>">


	<div class="single-blog-item">
            <div class="img-holder">
				 <?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>
				  <!-- Item Image -->
				  <div class="catItemImageBlock">
					  <span class="catItemImage">
						<a href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>">
							<img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px; height:auto;" />
						</a>
					  </span>
					  <div class="clr"></div>
				  </div>
				  <?php endif; ?>
				<div class="overlay">
                   <div class="box">
                      <div class="content">
						<a href="<?php echo $this->item->link; ?>"><i class="fa fa-link"></i></a>
                      </div>
                   </div>
                 </div>
            </div>

            <div class="text-holder">


								<?php if($this->item->params->get('catItemCategory')): ?>
									<!-- Item category name -->
									<span>
										<a class="text-primary uppercase" href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name; ?></a>
									</span>
								<?php endif; ?>


                <?php if($this->item->params->get('catItemTitle')): ?>
				  <!-- Item title -->

						<?php if(isset($this->item->editLink)): ?>
						<!-- Item edit link -->
						<span class="catItemEditLink">
							<a data-k2-modal="edit" href="<?php echo $this->item->editLink; ?>">
								<?php echo JText::_('K2_EDIT_ITEM'); ?>
							</a>
						</span>
						<?php endif; ?>

					<?php if ($this->item->params->get('catItemTitleLinked')): ?>
						<a href="<?php echo $this->item->link; ?>">
						<h3 class="blog-title"><?php echo $this->item->title; ?></h3>
						</a>
					<?php else: ?>
					<?php echo $this->item->title; ?>
					<?php endif; ?>

					<?php if($this->item->params->get('catItemFeaturedNotice') && $this->item->featured): ?>
					<!-- Featured flag -->
					<span>
						<sup>
							<?php echo JText::_('K2_FEATURED'); ?>
						</sup>
					</span>
					<?php endif; ?>

				  <?php endif; ?>

                  <ul class="meta-info">
                      <li>
                      <?php if($this->item->params->get('catItemAuthor')): ?>
						<!-- Item Author -->
							<?php if(isset($this->item->author->link) && $this->item->author->link): ?>
							<a rel="author" href="<?php echo $this->item->author->link; ?>"> <?php echo $this->item->author->name; ?></a>
							<?php else: ?>
							<?php echo $this->item->author->name; ?>
							<?php endif; ?>
						<?php endif; ?>
                      </li>

                      <li>
                      <?php if($this->item->params->get('catItemDateCreated')): ?>
						<!-- Date created -->

						<?php echo JHTML::_('date', $this->item->created, JText::_('F, d Y')); ?>
					  <?php endif; ?>
                      </li>

                      <li>

						  <?php if($this->item->params->get('catItemCommentsAnchor') && ( ($this->item->params->get('comments') == '2' && !$this->user->guest) || ($this->item->params->get('comments') == '1')) ): ?>
							<!-- Anchor link to comments below -->
							<div class="catItemCommentsLink">
								<?php if(!empty($this->item->event->K2CommentsCounter)): ?>
									<!-- K2 Plugins: K2CommentsCounter -->
									<?php echo $this->item->event->K2CommentsCounter; ?>
								<?php else: ?>
									<?php if($this->item->numOfComments > 0): ?>
									<a href="<?php echo $this->item->link; ?>#itemCommentsAnchor">

										<?php echo $this->item->numOfComments; ?> <?php echo ($this->item->numOfComments>1) ? JText::_('K2_COMMENTS') : JText::_('K2_COMMENT'); ?>
									</a>
									<?php else: ?>
									<a href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
								
										<?php echo JText::_('K2_BE_THE_FIRST_TO_COMMENT'); ?>
									</a>
									<?php endif; ?>
								<?php endif; ?>
							</div>
						  <?php endif; ?>
                      </li>
                  </ul>
                 <div class="text">
                  <?php if($this->item->params->get('catItemIntroText')): ?>
					  <!-- Item introtext -->
					  <div class="catItemIntroText">
						<?php echo $this->item->introtext; ?>
					  </div>
				  <?php endif; ?>

                  <div class="bottom clearfix">
                       <div class="readmore pull-left">
                       <?php if ($this->item->params->get('catItemReadMore')): ?>
						<!-- Item "read more..." link -->
						<div class="catItemReadMore">
							<a class="btn btn-primary" href="<?php echo $this->item->link; ?>">
								<?php echo JText::_('K2_READ_MORE'); ?>
							</a>
						</div>
						<?php endif; ?>
                       </div>
                  </div>
                 </div>
               </div>
            </div>


</div>
<!-- End K2 Item Layout -->

<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2017 Alcaldia de Santa Marta D.T.C.H.
 * @author      Juan Pablo Llinás Ramírez.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
$id = uniqid();
// print_r($list);
?>
<style type="text/css">
    #myCarousel<?php echo $id ?> .item {
        height: 480px;
    }
    #myCarousel<?php echo $id ?> .item img {
        width: 100%;
        height: 480px;
    }
    
    #myCarousel<?php echo $id ?> .carousel-caption {
      padding: 0px;
      width: 100%;
      padding-bottom: 30px;
      margin: 0px;
      left: 0px;
     bottom: 60px;
      background: rgba(76,76,76,0.65);
      height: 40px;
    }
    
    
    #myCarousel<?php echo $id ?> .carousel-caption h2 {
      height: 40px;
      margin: 0px;
      padding: 0px;
      text-align: center;
      vertical-align: middle;
     font-size: 170%;
    line-height: 40px;
    }
    
</style>
<div id="myCarousel<?php echo $id ?>" class="carousel slide carrusel-noticias" data-ride="carousel">
  <!-- Wrapper for slides -->
  <ol class="carousel-indicators"> 
    <?php for ($i = 0, $n = count($list); $i < $n; $i ++) : ?>
		<li data-target="#myCarousel<?php echo $id ?>" data-slide-to="<?php echo $i ?>" class="<?php echo ( ($i==0)? 'active' : '' ) ?>" ></li>
	  <?php endfor; ?>
  </ol>
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">    
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
	    <div class="item  <?php echo ( ($i==0)? 'active' : '' ) ?>"  >
	        <a href="<?php echo $item->link; ?>">
	       <img src="<?= $image ?>" alt="<?= $alt ?>" title="<?= $caption ?>" class="img d-block w-100" />
	       <div class="carousel-caption d-none d-md-block">
	            <h2><?= $item->title ?></h2>
	            <!--<small><?= $item->introtext ?></small>-->
	       </div>
	       </a>
        </div>
    <?php endfor; ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>
             
<div style="clear: both;" ></div>
<script>
jQuery('#myCarousel<?php echo $id ?>').carousel({
  interval: Math.floor((Math.random() * 3000) + 1000)
});
</script>
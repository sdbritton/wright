<?php
// Wright v.3 Override: Joomla 3.2.2
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

$wrightNewsEnableIcons = (isset($wrightNewsEnableIcons) ? $wrightNewsEnableIcons : true);  // Wright v.3: Enable icons parameter

$wrightEnableIntroText = (isset($wrightEnableIntroText) ? $wrightEnableIntroText : true);  // Wright v.3: Enable intro text parameter

$wrightTitlePosition = (isset($wrightTitlePosition) ? $wrightTitlePosition : 'above');  // Wright v.3: Title Position (above/below) parameter

// no direct access
defined('_JEXEC') or die;
$item_heading = $params->get('item_heading', 'h4');
?>

<?php if ($wrightTitlePosition == 'above') : ?> <?php /* Wright v.3: Added title above */ ?>

	<?php if ($params->get('item_title')) : ?>

		<<?php echo $item_heading; ?> class="newsflash-title<?php echo $params->get('moduleclass_sfx'); ?>">
			<?php if ($params->get('link_titles') && $item->link != '') : ?>
				<div class="page-header">  <?php // Wright v.3: Added page-header style ?>
					<a href="<?php echo $item->link;?>">
						<?php if ($wrightNewsEnableIcons) : ?> <i class="icon-file"></i>  <?php endif; // Wright v.3: Added icon ?>
						<?php echo $item->title;?>
					</a>
				</div>  <?php // Wright v.3: Added page-header style ?>
			<?php else : ?>
				<div class="page-header">  <?php // Wright v.3: Added page-header style ?>
					<?php if ($wrightNewsEnableIcons) : ?> <i class="icon-file"></i>  <?php endif; // Wright v.3: Added icon ?>
					<?php echo $item->title; ?>
				</div>  <?php // Wright v.3: Added page-header style ?>
			<?php endif; ?>
		</<?php echo $item_heading; ?>>

	<?php endif; ?>

<?php endif; ?> <?php /* End Wright v.3: Added title above */ ?>

<?php
	/* Wright v.3: Added intro image */
	$images = json_decode($item->images);
	if ($params->get('image','1')) :
		if (isset($images->image_intro) and !empty($images->image_intro)) :
?>
	<div class="item-image pull-left">
		<a href="<?php echo $item->link;?>">
			<img src="<?php echo $images->image_intro; ?>" class="" alt="<?php echo $images->image_intro_alt; ?>" />
		</a>
	</div>
<?php
		endif;
	endif;
	/* End Wright v.3: Added intro image */
?>

<?php if (!$params->get('intro_only')) :
	echo $item->afterDisplayTitle;
endif; ?>

<?php echo $item->beforeDisplayContent; ?>

<?php
	/* Wright v.3: Added intro text */
	if ($wrightEnableIntroText) :
		echo $item->introtext;
	endif;
	/* End Wright v.3: Added intro text */
?>

<?php if ($wrightTitlePosition == 'below') : ?> <?php /* Wright v.3: Added title below */ ?>

	<?php if ($params->get('item_title')) : ?>

		<<?php echo $item_heading; ?> class="newsflash-title<?php echo $params->get('moduleclass_sfx'); ?>">
			<?php if ($params->get('link_titles') && $item->link != '') : ?>
				<div class="page-header">  <?php // Wright v.3: Added page-header style ?>
					<a href="<?php echo $item->link;?>">
						<?php if ($wrightNewsEnableIcons) : ?> <i class="icon-file"></i>  <?php endif; // Wright v.3: Added icon ?>
						<?php echo $item->title;?>
					</a>
				</div>  <?php // Wright v.3: Added page-header style ?>
			<?php else : ?>
				<div class="page-header">  <?php // Wright v.3: Added page-header style ?>
					<?php if ($wrightNewsEnableIcons) : ?> <i class="icon-file"></i>  <?php endif; // Wright v.3: Added icon ?>
					<?php echo $item->title; ?>
				</div>  <?php // Wright v.3: Added page-header style ?>
			<?php endif; ?>
		</<?php echo $item_heading; ?>>

	<?php endif; ?>

<?php endif; ?> <?php /* End Wright v.3: Added title below */ ?>

<?php if (isset($item->link) && $item->readmore != 0 && $params->get('readmore')) :
	echo '<p class="readmore"><a class="readmore" href="'.$item->link.'">'.$item->linkText.'</a></p>'; // Wright v.3: Added p.readmore
endif; ?>

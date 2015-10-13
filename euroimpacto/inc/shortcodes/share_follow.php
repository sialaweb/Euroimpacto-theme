<?php
// [share]
function shareShortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'title'  => '',
		'tooltip' => 'top'
	), $atts));
	global $post, $flatsome_opt;

	if(!$post) return false;

	$permalink = get_permalink($post->ID);
	$featured_image =  wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
	$featured_image_2 = $featured_image['0'];
	$post_title = rawurlencode(get_the_title($post->ID));
	if($title) $title = '<span>'.$title.'</span>';

	ob_start();
	?>

	<?php if($flatsome_opt['custom_share_icons']){ ?>
	<div class="share-row">
		<?php echo $flatsome_opt['custom_share_icons']; ?>
	</div>
	<?php } else { ?>
	<div class="social-icons share-row">
		<?php echo $title; ?>
		<?php if($flatsome_opt['social_icons']['whatsapp']) { ?>
            <a href="whatsapp://send?text='<?php echo $post_title; ?>'" data-action="share/whatsapp/share"  class="icon icon_whatsapp tip-<?php echo $tooltip ?>"  rel="nofollow" title="<?php _e('comparte en WhatsApp','flatsome'); ?>"><span class="icon-phone"></span></a>
		<?php } ?>
		<?php if($flatsome_opt['social_icons']['facebook']) { ?>
			  <a href="http://www.facebook.com/sharer.php?u=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" class="icon icon_facebook tip-<?php echo $tooltip ?>" title="<?php _e('comparte en Facebook','flatsome'); ?>"><span class="icon-facebook"></span></a>
		<?php } ?>
		<?php if($flatsome_opt['social_icons']['twitter']) { ?>
            <a href="https://twitter.com/share?url=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" class="icon icon_twitter tip-<?php echo $tooltip ?>" title="<?php _e('comparte en Twitter','flatsome'); ?>"><span class="icon-twitter"></span></a>
		<?php } ?>
		<?php if($flatsome_opt['social_icons']['email']) { ?>
            <a href="mailto:enteryour@addresshere.com?subject=<?php echo $post_title; ?>&amp;body=<?php _e('Check%20this%20out:','flatsome'); ?>%20<?php echo $permalink; ?>" rel="nofollow" class="icon icon_email tip-<?php echo $tooltip ?>" title="<?php _e('Enviar producto por email','flatsome'); ?>"><span class="icon-envelop"></span></a>
		<?php } ?>
		<?php if($flatsome_opt['social_icons']['pinterest']) { ?>
            <a href="//pinterest.com/pin/create/button/?url=<?php echo $permalink; ?>&amp;media=<?php echo $featured_image_2; ?>&amp;description=<?php echo $post_title; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" class="icon icon_pintrest tip-<?php echo $tooltip ?>" title="<?php _e('Pin en Pinterest','flatsome'); ?>"><span class="icon-pinterest"></span></a>
		<?php } ?>
		<?php if($flatsome_opt['social_icons']['googleplus']) { ?>
            <a href="//plus.google.com/share?url=<?php echo $permalink; ?>" target="_blank" class="icon icon_googleplus tip-<?php echo $tooltip ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" title="<?php _e('comparte en Google+','flatsome'); ?>"><span class="icon-google-plus"></span></a>
		<?php } ?>
		<?php if($flatsome_opt['social_icons']['vk']) { ?>
            <a href="//vkontakte.ru/share.php?url=<?php echo $permalink; ?>" target="_blank" class="icon icon_vk tip-<?php echo $tooltip ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" title="<?php _e('comparte en VKontakte','flatsome'); ?>"><span class="icon-vk"></span></a>
		<?php } ?>
    </div>

    <?php } ?>

    <?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('share','shareShortcode');


// [follow]
function followShortcode($atts, $content = null) {
	$sliderrandomid = rand();
	extract(shortcode_atts(array(
		'size' => 'normal',
		'tooltip' => 'top',
		'title' => false,
		'title' => '',
		'twitter' => '',
		'facebook' => '',
		'pinterest' => '',
		'email' => '',
		'googleplus' => '',
		'instagram' => '',
		'rss' => '',
		'linkedin' => '',
		'youtube' => '',
		'flickr' => '',
		'vkontakte' => ''
	), $atts));
	ob_start();
	?>

    <div class="social-icons size-<?php echo $size;?>">

    	<?php if($title){?>
    	<span><?php echo $title; ?></span>
		<?php }?>

    	<?php if($facebook){?>
    		  <a href="<?php echo $facebook; ?>" target="_blank"  rel="nofollow" class="icon icon_facebook tip-<?php echo $tooltip; ?>" title="<?php _e('Síguenos en Facebook','flatsome') ?>"><span class="icon-facebook"></span></a>
		<?php }?>
		<?php if($twitter){?>
		       <a href="<?php echo $twitter; ?>" target="_blank" rel="nofollow" class="icon icon_twitter tip-<?php echo $tooltip; ?>" title="<?php _e('Síguenos en twitter','flatsome') ?>"><span class="icon-twitter"></span></a>
		<?php }?>
		<?php if($email){?>
		       <a href="mailto:<?php echo $email; ?>" target="_blank" rel="nofollow" class="icon icon_email tip-<?php echo $tooltip; ?>" title="<?php _e('Envianos un Email','flatsome') ?>"><span class="icon-envelop"></span></a>
		<?php }?>
		<?php if($pinterest){?>
		       <a href="<?php echo $pinterest; ?>" target="_blank" rel="nofollow" class="icon icon_pintrest tip-<?php echo $tooltip; ?>" title="<?php _e('Síguenos en Pinterest','flatsome') ?>"><span class="icon-pinterest"></span></a>
		<?php }?>
		<?php if($googleplus){?>
		       <a href="<?php echo $googleplus; ?>" target="_blank" rel="nofollow" class="icon icon_googleplus tip-<?php echo $tooltip; ?>" title="<?php _e('Síguenos en Google+','flatsome')?>"><span class="icon-google-plus"></span></a>
		<?php }?>
		<?php if($instagram){?>
		       <a href="<?php echo $instagram; ?>" target="_blank" rel="nofollow" class="icon icon_instagram tip-<?php echo $tooltip; ?>" title="<?php _e('Síguenos en Instagram','flatsome')?>"><span class="icon-instagram"></span></a>
		<?php }?>
		<?php if($rss){?>
		       <a href="<?php echo $rss; ?>" target="_blank" rel="nofollow" class="icon icon_rss tip-<?php echo $tooltip; ?>" title="<?php _e('Subscribe to RSS','flatsome') ?>"><span class="icon-feed"></span></a>
		<?php }?>
		<?php if($linkedin){?>
		       <a href="<?php echo $linkedin; ?>" target="_blank" rel="nofollow" class="icon icon_linkedin tip-<?php echo $tooltip; ?>" title="<?php _e('Síguenos en LinkedIn','flatsome') ?>"><span class="icon-linkedin"></span></a>
		<?php }?>
		<?php if($youtube){?>
		       <a href="<?php echo $youtube; ?>" target="_blank" rel="nofollow" class="icon icon_youtube tip-<?php echo $tooltip; ?>" title="<?php _e('Síguenos en YouTube','flatsome') ?>"><span class="icon-youtube"></span></a>
		<?php }?>
		<?php if($flickr){?>
		       <a href="<?php echo $flickr; ?>" target="_blank" class="icon icon_flickr tip-<?php echo $tooltip; ?>" title="<?php _e('Flickr','flatsome') ?>"><span class="icon-flickr"></span></a>
		<?php }?>
		<?php if($vkontakte){?>
		       <a href="<?php echo $vkontakte; ?>" target="_blank" rel="nofollow" class="icon icon_vk tip-<?php echo $tooltip; ?>" title="<?php _e('Follow on VKontakte','flatsome') ?>"><span class="icon-vk"></span></a>
		<?php }?>
     </div>


	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode("follow", "followShortcode");

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg"><head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    
    <!-- Meta -->
    <meta name="description" content="<?php echo my_get_description(); ?>"/>
    <meta name="keywords" content="みらいく,ちいきの保育園,長野県,長野市,保育園,アットホーム,0歳児,1歳児,2歳児,未就園児専門保育園,企業主導型保育所"/>
    <?php echo my_get_viewport();?>
    
    <!-- OG Tag -->
    <meta property="og:title" content="<?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?>" />
    <?php if(is_single()):?>
    <meta property="og:type" content="article" />
    <?php else:?>
    <meta property="og:type" content="website" />
    <?php endif;?>
    <meta property="og:type" content="<?php echo my_get_og_type(); ?>" />
    <meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/images/common/og_image.jpg" />
    <meta property="og:url" content="<?php echo((empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"]); ?>" />
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
    <meta property="og:description" content="<?php echo my_get_description(); ?>" />
    
    <!-- Icon -->
    <link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icon/apple-touch-icon.png" sizes="144x144" />
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/vnd.microsoft.icon">
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icon/64x64.png" sizes="64x64" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icon/favicon.ico" sizes="16x16 32x32 64x64" />
    
    <!-- RSS -->
    <link rel="alternate" type="application/rss+xml" title="RSS feed" href="feed/" />
    <link rel="author" href="author" />
    
    
	<?php if(is_page('contact/cv')): ?>
	<!-- Event snippet for 求人 conversion page --> <script> gtag('event', 'conversion', {'send_to': 'AW-734982849/PGq2CJSm8acBEMHlu94C'}); </script>
	<?php endif; ?>
	<?php 
        // disable retina size at mobile to reduce loading time.
        $is_2x = '';
        if (!wp_is_mobile()){
            $is_2x = '@2x';
        }
    ?>

    <!-- External files -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/minified-vendor.css<?php echo '?v=' . strtotime(date("Y-m-d H:i:s"));?>">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/minified-main.css<?php echo '?v=' . strtotime(date("Y-m-d H:i:s"));?>">
    <?php wp_head(); ?>
    <script data-ad-client="ca-pub-4055730938442528" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>
    <body <?php echo my_get_body_id();?>>
        <div class="p-skiplink"><a href="#l-main">このページの本文へ移動する</a></div>
        <div id="l-canvas" class="l-canvas">
            <div id="js-drawer__canvas" class="p-drawer__canvas">
                <header class="l-header c-box">
                    <div class="l-header__inner c-box__fixed c-box__padding--lr">
<?php if (is_home()) : ?>
                        <h1 class="logo"><a href="<?php echo home_url( '/' ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>images/common/logo1.svg" alt="企業主導型保育所 みらいく" /></a></h1>
                        <p class="contact hide-sp"><a href="<?php echo home_url( '/contact' ); ?>" class="p-contact_button"><i class="fa fa-envelope-o" aria-hidden="true"></i> お問い合わせ</a></p>
<?php else:?>
                        <h1 class="logo-page"><a href="<?php echo home_url( '/' ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/common/logo1_page.svg" alt="企業主導型保育所 みらいく" /></a></h1 >
<?php endif;?>
                    </div>
                </header>
<?php //header for pc
 if ( (is_home() || is_front_page()) and !wp_is_mobile() ) : ?>
                <aside class="c-box p-keyvisual">
                    <div class="slick-slider">
                        <div class="slick-slider__wrap">
                            <div class="slick-slider__slide">
                                <figure><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/index/slide1<?php echo $is_2x?>.jpg" alt="" width="1040" height="500" /></figure>
                            </div>
                        </div>
                        <div class="slick-slider__wrap">
                            <div class="slick-slider__slide">
                                <figure><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/index/slide2<?php echo $is_2x?>.jpg" alt="" width="1040" height="500" /></figure>
                            </div>
                        </div>
                        <div class="slick-slider__wrap">
                            <div class="slick-slider__slide">
                                <figure><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/index/slide3<?php echo $is_2x?>.jpg" alt="" width="1040" height="500" /></figure>
                            </div>
                        </div>
                    </div>
                </aside>
<?php endif;?>
<?php //header for mobile
if ( (is_home() || is_front_page()) and wp_is_mobile() ) : ?>
                <aside class="c-box p-keyvisual">
                    <div class="slick-slider">
                        <div class="slick-slider__wrap">
                            <div class="slick-slider__slide">
                                <figure><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/index/slide1<?php echo $is_2x?>.jpg" alt="" width="1040" height="500" /></figure>
                            </div>
                        </div>
                    </div>
                </aside>
<?php endif;?>
                <aside id="js-global-navi" class="js-global-navi c-box hide-sp">
                    <nav class="p-global-navi c-box__fixed">
                        <ul class="p-global-navi__items">
                            <li class="p-global-navi__items__item line"><a href="<?php echo home_url( '/about/vision' ); ?>"><span class="c-icon c-icon--pencil">みらいくについて</span></a></li>
                            <li class="p-global-navi__items__item line"><a href="<?php echo home_url( '/quality' ); ?>"><span class="c-icon c-icon--heart">みらいくのこだわり</span></a></li>
                            <li class="p-global-navi__items__item line"><a href="<?php echo home_url( '/preschool' ); ?>"><span class="c-icon c-icon--house">園舎紹介</span></a></li>
                            <li class="p-global-navi__items__item line"><a href="<?php echo home_url( '/schedule' ); ?>"><span class="c-icon c-icon--calendar">年間スケジュール</span></a></li>
                            <li class="p-global-navi__items__item"><a href="<?php echo home_url( '/recruit' ); ?>"><span class="c-icon c-icon--human">採用情報</span></a></li>
<?php if ( ! is_home()) : ?>
                            <li class="p-global-navi__items__item p-global-navi__items__item--contact"><a href="<?php echo home_url( '/contact' ); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i> お問い合わせ</a></li>
<?php endif;?>
                        </ul>
                    </nav>
                </aside>
<?php wp_reset_query(); ?>

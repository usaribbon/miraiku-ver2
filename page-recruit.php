<?php
/*
 * Template Name: page-recruit
 */
get_header(); ?>
<?php /* =============== BODY START =============== */ ?>

        <main role="main" id="page__recruit" class="l-main">
            <div class="l-main__inner">
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
<?php $sickchild_preschool_image = wp_get_attachment_image_src( get_field('recruit_keyvisual'), 'image2480x800' ); ?>
                <div class="p-page-header__wrap" style="background-image:url('<?php echo $sickchild_preschool_image[0];?>');">
                    <header class="p-page-header">
                        <div class="p-page-header__inner">
                            <div class="c-box">
                                <div class="c-box__fixed c-box__padding--lr">
                                    <div class="heading-group">
                                        <h1 class="primary">みらいくで<br />一緒に働きませんか？</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                </div>

                <section class="c-box u-bg--circle--lightpurple">
                    <div class="c-box__fixed c-box__padding">
                        <header class="p-page-subheader">
                            <h2 class="primary"><?php echo nl2br(get_field('recruit_copy'));?></h2>
                        </header>

                        <div class="p-content">
                            <div class="center-pc left-sp p-editor"><?php the_field('recruit_text');?></div>
                        </div>

                        <div class="concept-box">
<?php if(have_rows('recruit_place')): ?>
<?php while(have_rows('recruit_place')): the_row(); ?>
                            <div class="p-content p-content--mutual p-content--s">
                                <div class="p-content__grid p-content__grid--image">
                                    <div class="p-content__grid__item">
                                        <h3 class="p-heading--purple"><?php the_sub_field('recruit_place_copy');?></h3>
                                        <div class="wrap">
                                            <div class="text"><?php echo nl2br(get_sub_field('recruit_place_text'));?></div>
                                        </div>
                                    </div>
                                    <div class="p-content__grid__item">
                                        <figure class="image u-frame--brackets"><?php echo wp_get_attachment_image( get_sub_field('recruit_place_image'), 'image870x630' ); ?></figure>
                                    </div>
                                </div>
                            </div>
<?php endwhile; ?>
<?php endif; ?>

                        </div>
                    </div>
                </section><!-- /.c-box -->

<?php
// 働く人たちの声を一覧表示する
$args = array(
    'posts_per_page' => -1,
    'post_type' => 'voice',
    'status' => 'publish',
    'orderby' => 'menu_order',
    );
?>
<?php $the_query = new WP_Query($args);?>
<?php if ($the_query->have_posts()):?>
                <section class="c-box u-bg--stripe--type2">
                    <div class="c-box__fixed c-box__padding">
                        <div class="p-content p-content--s">
                            <header>
                                <h2 class="p-page-subheader-circle--purple">働く人たちの声 <span style="font-size:0.8em;">（2018年6月現在）</span></h2>
                            </header>

                            <div class="voice-box">
<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
                                <div class="voice-box__item">
                                    <div class="p-content__grid">
                                        <div class="p-content__grid__item center-sp">
                                            <figure class="voice-box__item__image"><?php echo wp_get_attachment_image( get_field('voice_message_image'), 'image328x328' ); ?></figure>
                                        </div>
                                        <div class="p-content__grid__item">
                                            <h3 class="voice-box__item__title center-sp"><?php the_field('voice_title');?></h3>
                                            <p class="voice-box__item__position center-sp"><?php the_field('voice_position');?></p>
                                            <p class="voice-box__item__name center-sp"><?php the_title();?></p>
                                            <p class="voice-box__item__button center-sp"><a href="<?php the_permalink();?>" class="c-button c-button--s c-button--redorange">詳しく見る</a></p>
                                        </div>
                                    </div>
                                </div>
<?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </section><!-- /.c-box -->
<?php endif;?>
<?php wp_reset_query();?>

                <section class="c-box u-bg--circle--lightpurple">
                    <div class="c-box__fixed c-box__padding">

                        <div class="p-content p-content--s">
<div class="indeedjobs-widget" data-id="aee90cdd3626b409e554" data-theme="light" data-height="400"></div> <a href="" class="engage-recruit-widget" data-height="300" data-width="500" data-url="https://en-gage.net/chiikihoiku_saiyo/widget/" target="_blank"></a><script src="https://en-gage.net/common/company_script/recruit/widget.js"></script></div>
                            </table>
                        </div>
<?php
/*
<?php if(have_rows('recruit_requirement')): ?>
                        <div class="p-content p-content--s">
                            <header class="p-page-subheader">
                                <h2 class="p-page-subheader-circle--purple">募集要項</h2>
                            </header>

                            <table class="p-table">
                                <tbody>
<?php while(have_rows('recruit_requirement')): the_row(); ?>
                                    <tr>
                                        <th scope="row"><?php the_sub_field('recruit_requirement_title');?></th>
                                        <td><?php echo nl2br(get_sub_field('recruit_requirement_text'));?></td>
                                    </tr>
<?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
<?php endif; ?>
*/
?>

                    </div>
                </section><!-- /.c-box -->

                <div class="u-bg--circle--lightpurple">
<?php get_template_part( 'template/common', 'contact_box' ); ?>
<?php get_template_part( 'template/common', 'footer_navi' ); ?>
                </div>
    <?php endwhile; ?>
<?php endif; ?>
            </div>
        </main>

<?php /* =============== BODY END =============== */ ?>
<?php get_footer(); ?>
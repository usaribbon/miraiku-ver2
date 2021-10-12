<?php get_header(); ?>
<?php /* =============== BODY START =============== */ ?>

        <main role="main" id="page__voice" class="l-main">
            <div class="l-main__inner">
<?php if ( have_posts() ) :?>
<?php while ( have_posts() ) : the_post();?>
<?php $voice_keyvisual_image = wp_get_attachment_image_src( get_field('voice_keyvisual'), 'image2480x800' ); ?>
                <header class="voice-page-header u-bg--circle--lightpurple">
                    <div class="bg"><div class="image" style="background-image:url('<?php echo $voice_keyvisual_image[0];?>');"></div></div>
                    <div class="voice-page-header__inner">
                        <div class="c-box voice-header-box">
                            <div class="c-box__fixed c-box__padding--lr">
                                <div class="wrap p-frame--purple">
                                    <p class="number">INTERVIEW</p>
                                    <h1 class="title"><?php echo nl2br(get_field('voice_title'));?></h1>
                                    <p class="position"><?php echo nl2br(get_field('voice_position'));?></p>
                                    <p class="name"><?php the_title();?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <section class="c-box u-bg--circle--lightpurple">
                    <div class="c-box__fixed c-box__padding">

<?php $voice_content = get_field('voice_content');?>
<?php if( ! empty($voice_content)):?>
                        <div class="voice-lead p-content--s">
                            <div class="voice_content　p-editor">
                                <?php the_field('voice_content');?>
                            </div>
                        </div>
<?php endif; ?>
                        <div class="content-group content-group--reverse">
                            <div class="question-group">
                                <div class="question-box">
                                    <h2 class="question-box__title">QUESTION.01</h2>
                                    <dl class="question-box__qa">
                                        <dt class="question-box__qa-q"><?php echo nl2br(get_field('voice_q1'));?></dt>
                                        <dd class="question-box__qa-a"><?php echo nl2br(get_field('voice_a1'));?></dd>
                                    </dl>
                                </div>

                                <div class="question-box">
                                    <h2 class="question-box__title">QUESTION.02</h2>
                                    <dl class="question-box__qa">
                                        <dt class="question-box__qa-q"><?php echo nl2br(get_field('voice_q2'));?></dt>
                                        <dd class="question-box__qa-a"><?php echo nl2br(get_field('voice_a2'));?></dd>
                                    </dl>
                                </div>
                            </div>

                            <div class="image-group">
                                <figure><?php echo wp_get_attachment_image( get_field('voice_image1'), 'image1000x700' ); ?></figure>
                                <div class="image-group-wrap">
                                    <figure><?php echo wp_get_attachment_image( get_field('voice_image2'), 'image490x460' ); ?></figure>
                                    <figure><?php echo wp_get_attachment_image( get_field('voice_image3'), 'image490x460' ); ?></figure>
                                </div>
                            </div>
                        </div>

                        <div class="content-group">
                            <div class="question-group">
                                <div class="question-box">
                                    <h2 class="question-box__title">QUESTION.03</h2>
                                    <dl class="question-box__qa">
                                        <dt class="question-box__qa-q"><?php echo nl2br(get_field('voice_q3'));?></dt>
                                        <dd class="question-box__qa-a"><?php echo nl2br(get_field('voice_a3'));?></dd>
                                    </dl>
                                </div>

                                <div class="question-box">
                                    <h2 class="question-box__title">QUESTION.04</h2>
                                    <dl class="question-box__qa">
                                        <dt class="question-box__qa-q"><?php echo nl2br(get_field('voice_q4'));?></dt>
                                        <dd class="question-box__qa-a"><?php echo nl2br(get_field('voice_a4'));?></dd>
                                    </dl>
                                </div>
                            </div>

                            <div class="image-group">
                                <figure><?php echo wp_get_attachment_image( get_field('voice_image4'), 'image1000x490' ); ?></figure>
                                <figure><?php echo wp_get_attachment_image( get_field('voice_image5'), 'image1000x490' ); ?></figure>
                            </div>
                        </div>
                    </div>
                </section><!-- /.c-box -->

                <section class="c-box u-bg--stripe--type2">
                    <div class="c-box__fixed c-box__padding">
                        <div class="message-box">
                            <div class="message-box__content">
                                <h2 class="title">MESSAGE</h2>
                                <div class="text center-pc left-sp"><?php echo nl2br(get_field('voice_message_text'));?></div>
                            </div>

                            <div class="message-box__image center-sp">
                                <figure><?php echo wp_get_attachment_image( get_field('voice_message_image'), 'image430x430' ); ?></figure>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="u-bg--circle--lightpurple">
<?php get_template_part( 'template/common', 'contact_box' ); ?>
<?php get_template_part( 'template/common', 'footer_navi' ); ?>
                </div>
                
<?php endwhile;?>
<?php endif;?>
            </div>
        </main>

<?php /* =============== BODY END =============== */ ?>
<?php get_footer(); ?>

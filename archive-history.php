<?php
/*
 * Template Name: page-about_newspaper
 */
get_header();
?>
<?php /* =============== BODY START =============== */ ?>
  <main role="main" id="page__about" class="l-main">
    <div class="l-main__inner">
      <?php if (have_posts()) : ?>
      
      <header class="p-page-header">
        <div class="p-page-header__inner">
          <div class="c-box">
            <div class="c-box__fixed c-box__padding--lr">
              <div class="heading-group">
                <h1 class="primary">みらいくの歴史</h1>
                <p class="secondary">
                  history
                </p>
              </div>
            </div>
          </div>
        </div>
      </header>
      <div id="history" class="c-box u-bg--circle--lightgray">
        <div class="c-box__fixed c-box__padding">
          <div class="c-column">
            <div class="c-column__inner">
              <div class="c-column__item">
                <section>
                  <header class="p-page-subheader">
                    <h2 class="primary">みらいくの歴史</h2>
                  </header>
                  <div class="p-content history-lead">
                    <p>
                      みらいく設立5周年を記念して今までの歴史をマンガとしてまとめました。<br>
                      今ある｢当たり前｣も、つくる過程では多くの葛藤や衝突がありました。<br>
                      先人達の努力の積み重ねによってできた｢今｣に感謝すると共に、<br class="hide-sp">
                      初心を思い出すための道しるべとなれば幸いです。<br>
                    </p>
                  </div>
                  <div class="p-content">
                    
                    <ul class="history-list">
                      <?php while (have_posts()) : the_post(); ?>
                      <li>
                        <img src="<?php the_post_thumbnail_url( 'history' ); ?>"/>
                      </li>
                      <?php endwhile; ?>
                    </ul>
                    <?php include( 'template/common-pagination.php'); ?>
                    
                  </div>
                </section>
              </div>
              <!-- /.c-column__primary -->
              <div class="c-column__item">
                <?php get_sidebar( 'about' ); ?>
              </div>
              <!-- /.c-column__secondary -->
            </div>
          </div>
        </div>
      </div>
      <!-- /.c-box -->
      
      <div class="u-bg--circle--lightgray">
        <?php get_template_part( 'template/common', 'footer_navi' ); ?>
      </div>
      
      <?php endif; ?>
    </div>
  </main>
  <?php /* =============== BODY END =============== */ ?>
  <?php get_footer(); ?>

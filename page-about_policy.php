<?php
/*
 * Template Name: page-about_policy
 */
get_header(); ?>
<?php /* =============== BODY START =============== */ ?>

        <main role="main" id="page__about" class="l-main">
            <div class="l-main__inner">
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
                <header class="p-page-header">
                    <div class="p-page-header__inner">
                        <div class="c-box">
                            <div class="c-box__fixed c-box__padding--lr">
                                <div class="heading-group">
                                    <h1 class="primary">みらいくについて</h1>
                                    <p class="secondary">about Miraiku</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="c-box u-bg--circle--lightgray">
                    <div class="c-box__fixed c-box__padding">
                        <div class="c-column">
                            <div class="c-column__inner">
                                <div class="c-column__item">
                                    <section>
                                        <header class="p-page-subheader">
                                            <h2 class="primary">教育方針</h2>
                                        </header>

                                        <div class="p-content">
                                            <h3 class="p-heading--redorange">代表理事あいさつ</h3>
                                            <div class="director-box">
                                                <div class="director">
                                                    <figure class="c-snap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/about/director<?php echo $is_2x?>.jpg" width="210" height="210" /></figure>
                                                    <p class="name">代表理事 <span>山岸 裕始</span></p>
                                                </div>
                                                <p class="text">古きよき時代の子育て環境を地域と一緒につくりあげていきたい。それが私たちの想いです。<br>
												<br>
												戦後の日本は「なんて豊かな国なのだろう」と言われていました。それは大人たちが十分な食事もとれず痩せ細っていても、
												子どもたちは血色がよい顔で、元気に走り回っていたからです。
												社会全体で子どもを大切にしている
												「子どもは宝」という理念が染み渡っていました。<br>
												<br>
												また、私が子どもの頃、家には祖父母、曾祖母がいて、
												年に何度も親戚の集まりがありました。
												一歩外に出ると隣組の人から声をかけられ、犬を散歩する家庭とふれあう。
												子育ては「社会全体で行う」という風土がありました。<br>
												<br>
												「みらいく」という名称は【未来をともに育む】ことを目指し、地域と一緒に子育てを行いたいという想いで名付け、保育園を運営をしています。
												日本の将来を支える子どもを地域で育てていきましょう！</p>
                                            </div>
                                        </div>

                                        <div class="p-content">
                                            <h3 class="p-heading--redorange">園の方針</h3>
                                            <p>あたたかな愛情のもと、安心安全清潔な環境の中『ともに』遊び・学ぶ場</p>
                                        </div>

                                        <div class="p-content">
                                            <h3 class="p-heading--redorange">目標</h3>
                                            <ol class="p-ol">
                                                <li class="p-ol__item">元気にあそび、よく食べ、丈夫な体をつくる</li>
                                                <li class="p-ol__item">お友達と仲良くあそぶ</li>
                                                <li class="p-ol__item">あいさつやルールを大事にする</li>
                                            </ol>
                                        </div>

                                        <div class="p-content">
                                            <h3 class="p-heading--redorange">教育方針</h3>
                                            <p>健康的な心と身体を育む。<br />
基本的な生活習慣を身につけ、集団生活の素地を育む。<br />
遊びを通して、考え・表現し・人とかかわる自立的な心を育む。<br />
地域と連携し、幅広い世代との交流から社会、道徳の心を育む。</p>
                                        </div>
                                    </section>
                                </div><!-- /.c-column__primary -->

                                <div class="c-column__item">
<?php get_sidebar( 'about' ); ?>
                                </div><!-- /.c-column__secondary -->
                            </div>
                        </div>
                    </div>
                </div><!-- /.c-box -->

                <div class="u-bg--circle--lightgray">
<?php get_template_part( 'template/common', 'footer_navi' ); ?>
                </div>
                
    <?php endwhile; ?>
<?php endif; ?>
            </div>
        </main>

<?php /* =============== BODY END =============== */ ?>
<?php get_footer(); ?>
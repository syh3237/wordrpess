<?php

/**
 * @package WordPress
 */

/*
 * Template Name: 메인 페이지
 */
get_header(); ?>







<div class="page-header">
    <div class="container">


    <!-- <div class="swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">Slide 1</div>
            <div class="swiper-slide">Slide 2</div>
            <div class="swiper-slide">Slide 3</div>
            ...
        </div>
        <div class="swiper-pagination"></div>

        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <div class="swiper-scrollbar"></div>
    </div> -->





       <!-- <img class="main-img" src="<?php echo get_template_directory_uri(); ?>/img/home-deco-01.png" alt=""> -->
        <h1 class="hero-title">
            <!-- <strong class="serif">Sonny theme</strong> -->
            <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
        </h1>
        <h3 class="archive-description"><?php bloginfo('description'); ?></h3>
        <!-- <div class="hero-deco">
            <div class="deco-01"></div>
            <div class="deco-02"></div>
            <div class="deco-03"></div>
        </div> -->
    </div>
</div>
<section class="work-section">
    <div class="container">
        <div class="category-title-wrap">
            <h2 class="category-title">Projects</h2>
            <a class="button line-button" href="<?php echo esc_url(home_url('/work')); ?>"">Show More</a>
        </div>
        <div class=" row">
                <!-- 배열에 대한 정의 -->
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                if (wp_is_mobile()) {
                    $work = new WP_Query(
                        array(
                            'posts_per_page' => 8,
                            'post_type' => 'work',
                            'order' => 'date',
                            'paged' => $paged
                        )
                    );
                } else {
                    $work = new WP_Query(
                        array(
                            'posts_per_page' => 12,
                            'post_type' => 'work',
                            'order' => 'date',
                            'paged' => $paged
                        )
                    );
                } ?>
                <!-- if문 : 해당 배열 안에 포스트 데이터를 가지고 있는지? -->
                <?php if ($work->have_posts()) : ?>
                    <!-- while문 : 해당 배열 안에 포스트를 반복해서 불러오기 -->
                    <?php while ($work->have_posts()) :
                        $work->the_post(); ?>
                        <!-- Start : 이 안에 코드 형식으로 출력 -->
                        <div class="col-4">
                            <?php get_template_part('content-work'); ?>
                        </div>
                        <!-- End : 이 안에 코드 형식으로 출력 -->
                    <?php endwhile; ?>

                <?php else : ?>
                    <!-- if문 : 해당 배열 안에 포스트 데이터를 가지고 있지 않을 때 해당 코드 실행 -->
                    <?php get_template_part('content', 'empty'); ?>
                <?php endif; ?>

                <?php the_posts_pagination(array('prev_text' => '', 'next_text' => '')); ?>
        </div>
    </div>
</section>

<section class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="img-wrap">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/about-me.png" alt="">
                </div>
            </div>
            <div class="col-6">
                <div class="text-wrap">
                    <h2>Hi! I'am {username}</h2>
                    <p>I am product designer specialized in UX/UI, currently living in South Korea.
                        Where I have been working as a freelancer for about 8 years.</p>
                    <a class="button" href="<?php echo esc_url(home_url('/about')); ?>">Learn more about me</a>
                </div>
            </div>



        </div>
    </div>
</section>
<section class="marquee-section">
    <div class="marquee">
        <div class="marquee__content">
            <ul class="list-inline">
                <li>UI/UX Design</li>
                <li>Brand Experiance</li>
                <li>Content Design</li>
                <li>Development</li>
            </ul>
            <ul class="list-inline">
                <li>UI/UX Design</li>
                <li>Brand Experiance</li>
                <li>Content Design</li>
                <li>Development</li>
            </ul>
            <ul class="list-inline">
                <li>UI/UX Design</li>
                <li>Brand Experiance</li>
                <li>Content Design</li>
                <li>Development</li>
            </ul>
        </div>
    </div>
</section>
<section class="section-blog">
    <div class="container">
        <div class="category-title-wrap">
            <h2 class="category-title">Blog</h2>
            <a class="button line-button" href="<?php echo esc_url(home_url('/blog')); ?>">Show More</a>
        </div>
        <div class="row">
            <!-- 배열에 대한 정의 -->
            <?php
            $args = array(
                // 'posts_per_page' => -1, //수 제한 없음
                'posts_per_page' => 4, // 표시할 항목
                // 'category_name' => 'basic',//특정 카테고리 리스트 원할때 사용 
                'paged' => $paged,
                'post_type' => 'post',
                // 'post_status' => 'publish',
            );
            $arr_posts = new WP_Query($args); ?>
            <!-- if문 : 해당 배열 안에 포스트 데이터를 가지고 있는지? -->
            <?php if ($arr_posts->have_posts()) : ?>
                <!-- while문 : 해당 배열 안에 포스트를 반복해서 불러오기 -->
                <?php while ($arr_posts->have_posts()) :
                    $arr_posts->the_post(); ?>
                    <!-- Start : 이 안에 코드 형식으로 출력 -->
                    <div class="col-3">
                        <?php get_template_part('content'); ?>
                    </div>
                    <!-- End : 이 안에 코드 형식으로 출력 -->
                <?php endwhile; ?>

            <?php else : ?>
                <!-- if문 : 해당 배열 안에 포스트 데이터를 가지고 있지 않을 때 해당 코드 실행 -->
                <?php get_template_part('content', 'empty'); ?>
            <?php endif; ?>

            <?php the_posts_pagination(array('prev_text' => '', 'next_text' => '')); ?>

        </div>
    </div>
</section>
<?php get_footer(); ?>
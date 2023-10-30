<?php

/**
 * @package WordPress
 * @subpackage Supernormal
 * @since Supernormal 1.0
 */

/*
 * 컴포넌트 - 푸터
 */
?>

</main><!-- #main -->
<footer class="site-footer" role="contentinfo">
    <div class="container">
        <div class="mail-info">
            <h2>Let's Work Together</h2>
            <a class="mailto" href="mailto:designbasekorea@gmail.com">designbasekorea@gmail.com</a>
        </div>
        <div class="site-info">
            <!-- 푸터 위젯 있는지 확인 -->
            <?php if (is_active_sidebar('footer-widget')) : ?>
                <div class="footer-widget">
                    <?php dynamic_sidebar('footer-widget'); ?>
                </div>
            <?php endif; ?>
            <div class="copyright">© 2022 <a href="www.designbase.co.kr" target="_blank">Designbase</a> All Rights Reserved.</div>

        </div>

    </div>
    <div class="scroll-top">
        <div class="scroll-top-icon"></div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>
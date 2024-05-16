<?php /* Template Name: Contact page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main>
    </main>
<?php endwhile; endif; ?>
<?= get_footer(); ?>
<footer class="site-footer">
    <a href="/mentions-legales">Mentions légales</a>
    <a href="<?php echo esc_url(get_privacy_policy_url()); ?>">Vie privée</a>
    <span>&copy; <?php echo date('Y'); ?> Tous droits réservés</span>
</footer>

<?php get_template_part('template-parts/contact_modal'); ?>
<?php get_template_part('template-parts/lightbox'); ?>


<?php wp_footer(); ?>
</body>
</html>
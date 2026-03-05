<?php
/**
 * Template for displaying the footer
 *
 * Site footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package air-light
 */

namespace Air_Light;

?>

</div><!-- #content -->

<footer class="bg-primary text-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="flex flex-col items-center justify-center space-y-6">
      <h2 class="text-4xl font-display font-bold text-white"><?php bloginfo( 'name' ); ?></h2>
      <p class="text-white/70 max-w-md text-center text-sm">
        Nơi hội tụ những giá trị tinh hoa của thảo dược thiên nhiên, mang lại vẻ đẹp bền vững và sự thư thái cho tâm hồn.
      </p>
      <!-- <div class="flex space-x-6 mt-4">
        <a class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-colors" href="#">
          <span class="material-icons text-xl">facebook</span>
        </a>
        <a class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-colors relative" href="#">
          <span class="material-icons text-xl">chat</span>
          <span class="absolute -top-1 -right-1 bg-red-500 text-[10px] font-bold px-1.5 py-0.5 rounded-full">Hot</span>
        </a>
        <a class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-colors" href="#">
          <span class="material-icons text-xl">photo_camera</span>
        </a>
      </div> -->
      <div class="border-t border-white/20 w-full pt-8 mt-8 text-center">
        <p class="text-sm text-white/50">&copy; <?php echo date_i18n( _x( 'Y', 'copyright date format', 'air-light' ) ); ?> <?php bloginfo( 'name' ); ?>.</p>
        <p class="text-xs text-white/30 mt-1">Designed with natural beauty in mind.</p>
      </div>
    </div>
  </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

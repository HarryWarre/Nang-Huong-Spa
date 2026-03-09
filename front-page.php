<?php
/**
 * The template for displaying front page
 *
 * Contains the closing of the #content div and all content after.
 * Initial styles for front page template.
 *
 * @Date:   2019-10-15 12:30:02
 * @Last Modified by:   Roni Laukkarinen
 * @Last Modified time: 2022-05-25 20:18:40
 *
 * @package air-light
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

namespace Air_Light;

// Featured image for Theme Checker (it's a requirement for theme to pass in official Theme directory)
// NB! Our dev version uses newtheme.sh build script which cleans ups things including this next line
$thumbnail = wp_get_attachment_url( get_post_thumbnail_id() ) ?: THEME_SETTINGS['default_featured_image'];

get_header(); ?>

<main class="site-main">
  <!-- Hero Section -->
  <?php
  $hero_top_title = get_field( 'hero_top_title' );
  $hero_main_1    = get_field( 'hero_main_title_line_1' );
  $hero_main_2    = get_field( 'hero_main_title_line_2' );
  $hero_desc      = get_field( 'hero_description' );
  $hero_img       = get_field( 'hero_image' ); // Should be set as "Image ID" in ACF settings
  $hero_btn_text  = get_field( 'hero_button_text' );
  $hero_btn_text_2  = get_field( 'hero_btn_text_2' );
  $hero_video     = get_field( 'hero_video_link' );
  $hero_quote     = get_field( 'hero_quote' );
  ?>
  <section class="relative pt-32 pb-16 lg:pt-40 lg:pb-24 overflow-hidden reveal reveal-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="lg:grid lg:grid-cols-12 lg:gap-8 items-center">
        <div class="lg:col-span-6 text-center lg:text-left mb-12 lg:mb-0">
          <?php if ( $hero_top_title ) : ?>
            <h2 class="text-lg tracking-widest text-secondary font-semibold uppercase mb-4"><?php echo esc_html( $hero_top_title ); ?></h2>
          <?php endif; ?>
          
          <?php if ( $hero_main_1 || $hero_main_2 ) : ?>
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-display font-bold text-gray-900 dark:text-white mb-6 leading-tight">
              <?php if ( $hero_main_1 ) : ?>
                <span class="block"><?php echo esc_html( $hero_main_1 ); ?></span>
              <?php endif; ?>
              <?php if ( $hero_main_2 ) : ?>
                <span class="bg-gradient-to-r from-[#b88746] via-[#fdf5a6] to-[#b88746] bg-clip-text text-transparent italic font-light inline-block"><?php echo esc_html( $hero_main_2 ); ?></span>
              <?php endif; ?>
            </h1>
          <?php endif; ?>

          <?php if ( $hero_desc ) : ?>
            <p class="mt-4 text-xl text-subtext-light dark:text-subtext-dark max-w-lg mx-auto lg:mx-0 leading-relaxed">
              <?php echo esc_html( $hero_desc ); ?>
            </p>
          <?php endif; ?>

          <?php if ( $hero_btn_text || $hero_video ) : ?>
            <div class="mt-10 flex justify-center lg:justify-start gap-4 flex-wrap">
              <?php if ( $hero_btn_text ) : ?>
                <a class="inline-flex items-center px-6 py-2 md:px-8 md:py-3 border border-transparent text-sm md:text-base font-medium rounded-full shadow-sm text-white bg-primary hover:bg-opacity-90 transition-all transform hover:scale-105" href="#services">
                  <?php echo esc_html( $hero_btn_text ); ?>
                  <span class="material-icons ml-2 text-sm">arrow_forward</span>
                </a>
              <?php endif; ?>
              
              <?php if ( $hero_video && $hero_btn_text_2 ) : ?>
                <a class="inline-flex items-center px-6 py-2 md:px-8 md:py-3 border border-primary text-sm md:text-base font-medium rounded-full text-primary bg-transparent hover:bg-primary hover:text-white dark:text-white dark:border-white dark:hover:bg-white/10 transition-all font-semibold" href="<?php echo esc_url( $hero_video ); ?>" target="_blank">
                  <span class="material-icons mr-2 text-xl">play_circle_outline</span>
                  <?php echo esc_html( $hero_btn_text_2 ); ?>
                </a>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="lg:col-span-6 relative">
          <div class="relative rounded-t-full rounded-b-[200px] overflow-hidden shadow-2xl mx-auto w-full max-w-md lg:max-w-full h-[300px] lg:h-[520px] border-8 border-white dark:border-gray-800">
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-80 h-80 bg-secondary/20 rounded-full blur-3xl"></div>
            <?php 
            if ( $hero_img ) {
              echo wp_get_attachment_image( $hero_img, 'full', false, [
                'class' => 'object-cover w-full h-full transform hover:scale-105 transition-transform duration-700',
                'alt'   => esc_attr( $hero_main_1 . ' ' . $hero_main_2 ),
              ] );
            } else {
              ?>
              <img alt="<?php echo esc_attr( $hero_main_1 . ' ' . $hero_main_2 ); ?>" class="object-cover w-full h-full transform hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDRCcyTFA5tY153UxaW-c7QTEqHtB4hKl1xOSE4F7-6M0DinnKZcUmnzeapj3Qs9poY3GjdpRDSKUjCPpGwHu7lSLOYCGxnzZJ8AUbA6LBFDkXpAeIuhVzJZDXJf5khC4XdIAWVLrgngM-olyF1GwyJIliu7LpCQgEDPSX6sqTCrQrQzLHwh0uJLZsSYm8G_kTa4pXeEeyak2EA-pfPXAOI2V2virAzfgqPyNQGB4YM3iAAKNOLKeD8U29RGGOUVY-8qJ6MNIHSgQ"/>
              <?php
            }
            ?>
            <div class="absolute bottom-10 left-0 right-0 mx-auto w-max bg-white/90 dark:bg-gray-900/90 backdrop-blur px-6 py-3 rounded-full shadow-lg border border-gray-100 dark:border-gray-700">
              <p class="font-display italic text-primary text-lg"><?php echo esc_html( $hero_quote ); ?></p>
            </div>
          </div>
          <div class="absolute -bottom-10 -left-10 w-24 h-24 bg-primary/10 rounded-full z-0"></div>
          <div class="absolute top-1/2 -right-12 w-16 h-16 bg-secondary/20 rounded-full z-0"></div>
        </div>
      </div>
    </div>
    <?php if ( have_rows( 'stats_list' ) ) : ?>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-16">
      <div class="bg-white dark:bg-card-dark rounded-2xl shadow-xl p-6 lg:p-8 flex flex-col sm:flex-row justify-around items-center divide-y sm:divide-y-0 sm:divide-x divide-gray-200 dark:divide-gray-700">
        <?php while ( have_rows( 'stats_list' ) ) : the_row();
          $stat_icon = get_sub_field( 'stat_icon' );
          $stat_number = get_sub_field( 'stat_number' );
          $stat_text = get_sub_field( 'stat_text' );
        ?>
        <div class="flex items-center space-x-4 px-6 py-2 pt-4 sm:pt-2">
          <?php if ( $stat_icon ) : ?>
          <div class="bg-primary/10 p-3 rounded-full">
            <span class="material-icons text-primary text-3xl"><?php echo esc_html( $stat_icon ); ?></span>
          </div>
          <?php endif; ?>
          <div>
            <?php if ( $stat_number ) : ?>
              <p class="text-2xl font-bold text-gray-900 dark:text-white"><?php echo esc_html( $stat_number ); ?></p>
            <?php endif; ?>
            <?php if ( $stat_text ) : ?>
              <p class="text-sm text-subtext-light dark:text-subtext-dark"><?php echo esc_html( $stat_text ); ?></p>
            <?php endif; ?>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
    <?php endif; ?>
  </section>

  <!-- About Section -->
  <?php
  $about_image = get_field('about_image');
  $about_quote = get_field('about_quote');
  $about_subtitle = get_field('about_subtitle');
  $about_title = get_field('about_title');
  $about_title_highlight = get_field('about_title_highlight');
  $about_description = get_field('about_description');
  $about_founder_image = get_field('about_founder_image');
  $about_founder_name = get_field('about_founder_name');
  $about_founder_role = get_field('about_founder_role');
  
  if ( $about_title || $about_description ) :
  ?>
  <section class="py-20 bg-stone-50 dark:bg-[#1f1f1f] reveal reveal-up" id="about">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="lg:grid lg:grid-cols-2 lg:gap-16 items-center">
        <div class="relative order-2 lg:order-1 mt-12 lg:mt-0">
          <?php if ( $about_image ) : ?>
          <div class="aspect-w-3 aspect-h-4 rounded-2xl overflow-hidden shadow-xl">
            <?php echo wp_get_attachment_image( $about_image, 'full', false, ['class' => 'object-cover w-full h-full'] ); ?>
          </div>
          <?php endif; ?>
          <?php if ( $about_quote ) : ?>
          <div class="absolute -bottom-10 -right-10 bg-white dark:bg-card-dark p-6 rounded-xl shadow-lg max-w-xs hidden md:block">
            <p class="font-display italic text-lg text-gray-800 dark:text-gray-200">
              "<?php echo esc_html( $about_quote ); ?>"
            </p>
          </div>
          <?php endif; ?>
        </div>
        <div class="order-1 lg:order-2 mt-4">
          <?php if ( $about_subtitle ) : ?>
          <span class="text-primary font-medium tracking-wider uppercase text-sm"><?php echo esc_html( $about_subtitle ); ?></span>
          <?php endif; ?>
          
          <?php if ( $about_title || $about_title_highlight ) : ?>
          <h2 class="mt-2 text-4xl lg:text-5xl font-display font-bold text-gray-900 dark:text-white mb-6">
            <?php echo nl2br( esc_html( $about_title ) ); ?> <?php if($about_title_highlight): ?><br/>
            <span class="italic font-light text-primary"><?php echo esc_html( $about_title_highlight ); ?></span><?php endif; ?>
          </h2>
          <?php endif; ?>
          
          <div class="w-16 h-1 bg-secondary mb-8"></div>
          
          <?php if ( $about_description ) : ?>
          <div class="prose prose-lg text-subtext-light dark:text-subtext-dark">
              <?php echo wp_kses_post( $about_description ); ?>
          </div>
          <?php endif; ?>
          
          <?php if ( $about_founder_name || $about_founder_image ) : ?>
          <div class="flex items-center space-x-4 mt-8 border-t border-gray-200 dark:border-gray-700 pt-8">
            <?php if ( $about_founder_image ) : ?>
            <?php echo wp_get_attachment_image( $about_founder_image, 'thumbnail', false, ['class' => 'w-16 h-16 rounded-full object-cover border-2 border-primary'] ); ?>
            <?php endif; ?>
            <div>
              <?php if ( $about_founder_name ) : ?>
              <p class="text-lg font-bold text-gray-900 dark:text-white font-display"><?php echo esc_html( $about_founder_name ); ?></p>
              <?php endif; ?>
              <?php if ( $about_founder_role ) : ?>
              <p class="text-sm text-secondary uppercase tracking-wide"><?php echo esc_html( $about_founder_role ); ?></p>
              <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- Services Section -->
  <?php
  $services_title = get_field('services_title');
  $services_title_highlight = get_field('services_title_highlight');
  $services_description = get_field('services_description');
  $services_view_all_link = get_field('services_view_all_link');
  $services_view_all_text = get_field('services_view_all_text');
  
  if ( $services_title || have_rows('services_list') ) :
  ?>
  <section class="py-24 bg-background-light dark:bg-background-dark reveal reveal-up" id="services">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <?php if ( $services_title || $services_title_highlight ) : ?>
        <h2 class="text-4xl md:text-5xl font-display font-bold text-gray-900 dark:text-white mb-4">
          <?php echo esc_html( $services_title ); ?> 
          <?php if ( $services_title_highlight ) : ?>
          <span class="italic text-primary border-b-2 border-secondary"><?php echo esc_html( $services_title_highlight ); ?></span>
          <?php endif; ?>
        </h2>
        <?php endif; ?>
        
        <?php if ( $services_description ) : ?>
        <p class="text-xl text-subtext-light dark:text-subtext-dark max-w-2xl mx-auto">
          <?php echo esc_html( $services_description ); ?>
        </p>
        <?php endif; ?>
      </div>
      
      <?php if ( have_rows('services_list') ) : ?>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php 
        $delay = 0;
        while ( have_rows('services_list') ) : the_row(); 
          $service_image = get_sub_field('service_image');
          $service_name = get_sub_field('service_name');
          $service_desc = get_sub_field('service_desc');
          $service_link = get_sub_field('service_link');
          $delay_class = $delay > 0 ? ' reveal-delay-' . $delay : '';
        ?>
          <div class="group relative rounded-2xl overflow-hidden cursor-pointer h-96 shadow-lg reveal reveal-up<?php echo $delay_class; ?>">
            <?php if ( $service_image ) : ?>
            <?php echo wp_get_attachment_image( $service_image, 'large', false, ['class' => 'absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110'] ); ?>
            <?php endif; ?>
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>
            <div class="absolute bottom-0 left-0 p-8 w-full">
              <?php if ( $service_name ) : ?>
              <h3 class="text-2xl font-display font-bold text-white mb-2"><?php echo esc_html( $service_name ); ?></h3>
              <?php endif; ?>
              
              <?php if ( $service_desc ) : ?>
              <p class="text-gray-200 text-sm mb-4 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-4 group-hover:translate-y-0"><?php echo esc_html( $service_desc ); ?></p>
              <?php endif; ?>
              
              <?php if ( $service_link ) : ?>
              <div class="flex justify-between items-center">
                <a href="<?php echo esc_url( $service_link ); ?>" class="text-white text-sm font-medium border-b border-white pb-1 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100 before:absolute before:inset-0">Xem chi tiết</a>
                <div class="w-10 h-10 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white group-hover:bg-primary transition-colors pointer-events-none">
                  <span class="material-icons">arrow_forward</span>
                </div>
              </div>
              <?php else : ?>
              <div class="flex justify-between items-center">
                <span class="text-white text-sm font-medium border-b border-white pb-1 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">Chi tiết</span>
                <div class="w-10 h-10 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white group-hover:bg-primary transition-colors">
                  <span class="material-icons">spa</span>
                </div>
              </div>
              <?php endif; ?>
            </div>
          </div>
        <?php 
          $delay += 2;
        endwhile; 
        ?>
      </div>
      <?php endif; ?>
      
      <?php if ( $services_view_all_link && $services_view_all_text ) : ?>
      <div class="text-center mt-12">
        <a class="inline-flex items-center text-primary dark:text-primary-light font-medium hover:text-secondary transition-colors text-lg group" href="<?php echo esc_url( $services_view_all_link ); ?>">
          <?php echo esc_html( $services_view_all_text ); ?>
          <span class="material-icons ml-1 transform group-hover:translate-x-1 transition-transform">arrow_right_alt</span>
        </a>
        <div class="w-24 h-0.5 bg-gray-300 dark:bg-gray-700 mx-auto mt-2"></div>
      </div>
      <?php endif; ?>
    </div>
  </section>
  <?php endif; ?>


  <!-- Reviews Section -->
  <?php
  $reviews_title = get_field('reviews_title');
  $reviews_title_highlight = get_field('reviews_title_highlight');
  
  if ( $reviews_title || have_rows('reviews_list') ) :
  ?>
  <section class="py-20 bg-stone-50 dark:bg-[#1f1f1f] reveal reveal-up" id="reviews">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <?php if ( $reviews_title || $reviews_title_highlight ) : ?>
      <h2 class="text-3xl md:text-4xl font-display font-bold text-gray-900 dark:text-white mb-12 text-center">
        <?php echo esc_html( $reviews_title ); ?> 
        <?php if ( $reviews_title_highlight ) : ?>
        <span class="text-primary"><?php echo esc_html( $reviews_title_highlight ); ?></span>
        <?php endif; ?>
      </h2>
      <?php endif; ?>
      
      <?php if ( have_rows('reviews_list') ) : ?>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php while ( have_rows('reviews_list') ) : the_row(); 
          $review_stars = get_sub_field('review_stars') ?: 5;
          $review_text = get_sub_field('review_text');
          $reviewer_avatar = get_sub_field('reviewer_avatar');
          $reviewer_name = get_sub_field('reviewer_name');
          $reviewer_role = get_sub_field('reviewer_role');
        ?>
          <div class="bg-white dark:bg-card-dark p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 hover:shadow-xl transition-shadow duration-300">
            <div class="flex text-yellow-400 mb-4">
              <?php for($i = 0; $i < $review_stars; $i++): ?>
              <span class="material-icons text-sm">star</span>
              <?php endfor; ?>
            </div>
            
            <?php if ( $review_text ) : ?>
            <p class="text-subtext-light dark:text-subtext-dark italic mb-6">
              "<?php echo esc_html( $review_text ); ?>"
            </p>
            <?php endif; ?>
            
            <div class="flex items-center space-x-4">
              <?php if ( $reviewer_avatar ) : ?>
              <?php echo wp_get_attachment_image( $reviewer_avatar, 'thumbnail', false, ['class' => 'w-12 h-12 rounded-full object-cover'] ); ?>
              <?php else: ?>
              <div class="w-12 h-12 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                <span class="material-icons text-gray-400">person</span>
              </div>
              <?php endif; ?>
              
              <div>
                <?php if ( $reviewer_name ) : ?>
                <h4 class="text-sm font-bold text-gray-900 dark:text-white"><?php echo esc_html( $reviewer_name ); ?></h4>
                <?php endif; ?>
                
                <?php if ( $reviewer_role ) : ?>
                <p class="text-xs text-subtext-light dark:text-subtext-dark"><?php echo esc_html( $reviewer_role ); ?></p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
      <?php endif; ?>
    </div>
  </section>
  <?php endif; ?>

  <!-- Contact Section -->
  <?php
  $contact_title = get_field('contact_title');
  $contact_title_highlight = get_field('contact_title_highlight');
  $contact_address = get_field('contact_address');
  $contact_phone = get_field('contact_phone');
  $contact_hours = get_field('contact_hours');
  $contact_map = get_field('contact_map');
  
  if ( $contact_title || $contact_address || $contact_phone ) :
  ?>
  <section class="py-24 bg-background-light dark:bg-background-dark reveal reveal-up" id="contact">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <?php if ( $contact_title || $contact_title_highlight ) : ?>
      <h2 class="text-3xl md:text-4xl font-display font-bold text-gray-900 dark:text-white mb-12 text-center">
        <?php echo esc_html( $contact_title ); ?> 
        <?php if ( $contact_title_highlight ) : ?>
        <span class="text-primary font-light"><?php echo esc_html( $contact_title_highlight ); ?></span>
        <?php endif; ?>
      </h2>
      <?php endif; ?>
      
      <div class="lg:grid lg:grid-cols-2 lg:gap-12 bg-white dark:bg-card-dark rounded-3xl shadow-2xl overflow-hidden">
        <div class="p-8 lg:p-12 space-y-8 bg-stone-50 dark:bg-stone-900/50">
          <?php if ( $contact_address ) : ?>
          <div class="flex items-start space-x-6">
            <div class="flex-shrink-0 w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
              <span class="material-icons text-primary">location_on</span>
            </div>
            <div>
              <h4 class="text-sm uppercase font-bold text-subtext-light dark:text-subtext-dark mb-1">Địa chỉ</h4>
              <p class="text-gray-900 dark:text-white font-medium"><?php echo esc_html( $contact_address ); ?></p>
            </div>
          </div>
          <?php endif; ?>
          
          <?php if ( $contact_phone ) : ?>
          <div class="flex items-start space-x-6">
            <div class="flex-shrink-0 w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
              <span class="material-icons text-primary">phone</span>
            </div>
            <div>
              <h4 class="text-sm uppercase font-bold text-subtext-light dark:text-subtext-dark mb-1">Hotline</h4>
              <p class="text-gray-900 dark:text-white font-medium"><?php echo esc_html( $contact_phone ); ?></p>
            </div>
          </div>
          <?php endif; ?>
          
          <?php if ( $contact_hours ) : ?>
          <div class="flex items-start space-x-6">
            <div class="flex-shrink-0 w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
              <span class="material-icons text-primary">schedule</span>
            </div>
            <div>
              <h4 class="text-sm uppercase font-bold text-subtext-light dark:text-subtext-dark mb-1">Giờ mở cửa</h4>
              <p class="text-gray-900 dark:text-white font-medium"><?php echo esc_html( $contact_hours ); ?></p>
            </div>
          </div>
          <?php endif; ?>
        </div>
        
        <?php if ( $contact_map ) : 
          $is_iframe = strpos( $contact_map, '<iframe' ) !== false;
        ?>
        <div class="relative h-96 lg:h-auto lg:min-h-[400px] bg-gray-200 overflow-hidden">
          <?php if ( $is_iframe ) : ?>
            <div class="absolute inset-0 w-full h-full [&>iframe]:w-full [&>iframe]:h-full border-0"><?php echo $contact_map; ?></div>
          <?php else : ?>
            <iframe class="absolute inset-0 w-full h-full border-0" src="https://maps.google.com/maps?q=<?php echo urlencode( wp_strip_all_tags( $contact_map ) ); ?>&hl=vi&z=15&output=embed" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php endif; ?>
          <div class="absolute bottom-4 right-4 bg-white px-4 py-2 rounded-lg shadow-md flex items-center gap-2 text-xs font-bold text-gray-800 pointer-events-none z-10">
            <span class="material-icons text-sm text-primary">directions</span> Chỉ đường
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>
</main>

<?php get_footer();

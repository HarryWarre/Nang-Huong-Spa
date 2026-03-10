<?php
/**
 * Template for header
 *
 * <head> section and everything up until <div id="content">
 *
 * @package air-light
 */

namespace Air_Light;

?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&amp;family=Quicksand:wght@300;400;500;600&amp;display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
  <script>
    window.tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            primary: {
              DEFAULT: "#4d6b53",
              light: "#6e8a75",
              dark: "#3a5240",
            },
            secondary: {
              DEFAULT: "#D4AF37",
              light: "#e5c05e",
              dark: "#b08d2c",
            },
            "background-light": "#FAFAF8",
            "background-dark": "#1a1a1a",
            "card-light": "#ffffff",
            "card-dark": "#2d2d2d",
            "text-light": "#333333",
            "text-dark": "#e5e5e5",
            "subtext-light": "#666666",
            "subtext-dark": "#a3a3a3",
          },
          fontFamily: {
            display: ["Playfair Display", "serif"],
            body: ["Quicksand", "sans-serif"],
          },
          borderRadius: {
            DEFAULT: "0.5rem",
            'xl': '1rem',
            '2xl': '1.5rem',
            '3xl': '2rem',
          },
          backgroundImage: {
            'hero-pattern': "url('https://images.unsplash.com/photo-1544161515-4ab6ce6db874?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80')",
          }
        },
      },
    };
  </script>
  <?php wp_head(); ?>
</head>

<body <?php body_class( 'font-body bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark transition-colors duration-300' ); ?>>
  <a class="skip-link screen-reader-text" href="#content"><?php echo esc_html( get_default_localization( 'Skip to content' ) ); ?></a>

  <?php wp_body_open(); ?>
  <div id="page" class="site">

    <header class="fixed w-full z-50 bg-background-light/90 dark:bg-background-dark/90 backdrop-blur-md border-b border-gray-200 dark:border-gray-800 transition-colors duration-300">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <?php
            wp_nav_menu( [
              'theme_location' => 'primary',
              'container'      => false,
              'menu_class'     => 'hidden md:flex space-x-8 list-none m-0 p-0 items-center justify-center',
              'fallback_cb'    => false,
              'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'walker'         => new \Air_Light\Nav_Walker(),
            ] );
            ?>

          <div class="flex-shrink-0 flex items-center justify-center absolute left-1/2 transform -translate-x-1/2 w-48 max-w-[50vw] h-full py-2">
            <?php
            // ACF: Header Logo (Image ID) or Site Name Text via get_option
            $header_logo = get_option( 'copacf_options_header_logo' );
            if ( $header_logo ) {
              echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="flex items-center justify-center h-full">';
              echo wp_get_attachment_image( $header_logo, 'full', false, [ 'class' => 'max-h-16 w-auto max-w-full object-contain hover:opacity-80 transition-opacity drop-shadow-sm mix-blend-multiply dark:mix-blend-normal' ] );
              echo '</a>';
            } else {
              ?>
              <a class="font-display text-2xl font-bold text-primary hover:text-secondary transition-colors tracking-wider flex items-center h-full" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
              <?php
            }
            ?>
          </div>
          <div class="flex items-center space-x-4">
            <?php
            // ACF: Header Button via get_option
            $header_btn_text = get_option( 'copacf_options_header_button_text' ) ?: 'Đặt lịch ngay';
            $header_btn_link = get_option( 'copacf_options_header_button_link' ) ?: '#contact';
            ?>
            <a class="hidden md:inline-flex items-center px-6 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-primary hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all" href="<?php echo esc_url( $header_btn_link ); ?>">
              <?php echo esc_html( $header_btn_text ); ?>
            </a>
            <button id="nav-toggle" aria-expanded="false" class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary" type="button">
              <span class="sr-only">Open main menu</span>
              <span class="material-icons menu-icon">menu</span>
              <span class="material-icons close-icon hidden">close</span>
            </button>
          </div>
        </div>
      </div>

      <!-- Mobile Menu -->
      <div id="nav" class="hidden md:hidden bg-background-light dark:bg-background-dark border-t border-gray-200 dark:border-gray-800 shadow-lg">
        <div class="px-4 pt-2 pb-6 space-y-2">
           <?php
            wp_nav_menu( [
              'theme_location' => 'primary',
              'container'      => false,
              'menu_class'     => 'space-y-4 list-none m-0 p-0 [&_a]:text-gray-800 dark:[&_a]:text-gray-200 [&_a]:font-medium [&_.current-menu-item>a]:!text-primary [&_.current-menu-parent>a]:!text-primary',
              'fallback_cb'    => false,
              'items_wrap'     => '<ul id="%1$s-mobile" class="%2$s">%3$s</ul>',
              'walker'         => new \Air_Light\Nav_Walker(),
            ] );
            ?>

          <a class="block px-3 py-3 mt-4 text-center border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-primary hover:bg-opacity-90" href="<?php echo esc_url( $header_btn_link ); ?>"><?php echo esc_html( $header_btn_text ); ?></a>
        </div>
      </div>
      
      <style>
        .js-nav-active #nav { display: block !important; }
        .js-nav-active .menu-icon { display: none !important; }
        .js-nav-active .close-icon { display: block !important; }
      </style>
    </header>

    <div class="site-content">

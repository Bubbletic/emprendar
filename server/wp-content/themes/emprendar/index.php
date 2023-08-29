<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8" />
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(); ?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>"> <!-- Enlace al archivo style.css -->
    <?php wp_head(); ?> <!-- Esto permite que WordPress agregue sus scripts y estilos en el encabezado -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
</head>

<body>
    <?php get_header() ?> <!-- Incluye el archivo header.php -->

    <!-- Backdrop filter START -->
    <div id="backdropFilter" class="backdrop-filter backdrop-filter--closed full-height"></div>
    <!-- Backdrop filter END -->

    <?php get_sidebar() ?> <!-- Incluye el archivo siderbar.php -->

    <!-- Sections START -->
    <main class="snap-sections">
        <!-- Section HOME START -->
        <?php get_template_part('parts/home'); ?> <!-- Incluye el archivo home.php -->
        <!-- Section HOME END -->

        <!-- Section SERVICES START -->
        <?php get_template_part('parts/services'); ?> <!-- Incluye el archivo services.php -->
        <!-- Section SERVICES END -->

        <!-- Section PODCAST START -->
        <?php get_template_part('parts/podcast'); ?> <!-- Incluye el archivo podcast.php -->
        <!-- Section PODCAST END -->

        <!-- Section STARTUPS START -->
        <?php get_template_part('parts/startups'); ?> <!-- Incluye el archivo startups.php -->
        <!-- Section STARTUPS START -->

        <!-- Section CONTACT START -->
        <?php get_template_part('parts/contact'); ?> <!-- Incluye el archivo contact.php -->
        <!-- Section STARTUPS END -->
    </main>

    <?php get_footer(); ?> <!-- Incluye el archivo footer.php -->
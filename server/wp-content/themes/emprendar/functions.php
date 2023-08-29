<?php

    function list_post_by_type($type) {
        $args = array(
            'post_type' => $type,  // Tipo de publicación (startups es para entradas)
            'posts_per_page' => -1, // -1 significa que se mostrarán todos los posts
            'post_status' => 'publish', // Solo publicaciones publicadas
        );
    
        return get_posts($args);
    }
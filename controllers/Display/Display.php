<?php namespace Bukvy\DisplayContent;

if( !defined( 'ABSPATH' ) ) exit;

class Display{

    public static function GetTemplatePart( $slug, $args = [], $echo = true ){
        if( empty( $slug ) ) return '';

        $content = static::GetTemplate( 'partials/'.$slug, $args, false );

        if( $echo ){
            echo $content;
            return;
        }

        return $content;
    }

    public static function GetTemplate( $slug, $args = [], $echo = true ){
        if( empty( $slug ) ) return '';

        $dir        = get_stylesheet_directory();
        $full_path  = $dir . '/' . $slug . '.php';

        if( !file_exists( $full_path ) ) return '';
        if( !empty( $args ) ) extract( $args );

        ob_start();
        include $full_path;

        $content = ob_get_clean();

        if( $echo ){
            echo $content;
            return;
        }

        return $content;
    }

}

class_alias('Bukvy\DisplayContent\Display', 'Display');
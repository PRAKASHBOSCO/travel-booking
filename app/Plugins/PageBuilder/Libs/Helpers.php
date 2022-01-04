<?php

use Illuminate\Support\Str;

if(!function_exists('render_css_page')) {
    function render_css_page($settings)
    {
        $margin = $settings['margin'];
        $padding = $settings['padding'];
        $screen = ['desktop', 'tablet', 'mobile'];
        $desktop = '';
        $tablet = '';
        $mobile = '';
        $cssID = str::random(8);
        foreach ($screen as $s) {
            $$s .= ($margin[$s]['top'] == "") ? '' : 'margin-top:' . $margin[$s]['top'] . 'px;';
            $$s .= ($margin[$s]['bottom'] == "") ? '' : 'margin-bottom:' . $margin[$s]['bottom'] . 'px;';
            $$s .= ($padding[$s]['top'] == "") ? '' : 'padding-top:' . $padding[$s]['top'] . 'px;';
            $$s .= ($padding[$s]['right'] == "") ? '' : 'padding-right:' . $padding[$s]['right'] . 'px;';
            $$s .= ($padding[$s]['bottom'] == "") ? '' : 'padding-bottom:' . $padding[$s]['bottom'] . 'px;';
            $$s .= ($padding[$s]['left'] == "") ? '' : 'padding-left:' . $padding[$s]['left'] . 'px;';
            $$s .= empty($settings['hidden'][$s]) ? 'display:block;' : 'display:none;';
            $css = Assets::build_css($cssID, $$s, $s);
        }

        if ($settings['columnGap'] == 'no-gap') {
            $str = 'padding-left:0;padding-right:0;';
            Assets::build_css($cssID, $str, 'desktop', '>[class^="container"]');
        }

        if (empty($settings['bgcTransparent'])) {
            $str = 'background-color:' . $settings['backgroundColor'] . ';';
            Assets::build_css($cssID, $str, 'desktop');
        }

        return $css;
    }
}


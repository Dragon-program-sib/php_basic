<?php

/* 5. Собрать страницу с меню и контентом, зарендерить как минимум 2 подшаблона через renderTemplate. ВАЖНОЕ */

function renderTemplate($page, $content = '', $menu = '')
{
    ob_start();
    include 'templates/' . $page . ".php";
    return ob_get_clean();
}

$main = renderTemplate('main');
$menu = renderTemplate('menu');

echo renderTemplate('layouts/layout', $main, $menu);

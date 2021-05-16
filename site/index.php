<?php

/* 5. Собрать страницу с меню и контентом, зарендерить как минимум 2 подшаблона через renderTemplate. ВАЖНОЕ */

function renderTemplate($page, $content = '')
{
    ob_start();
    include 'templates/' . $page . ".php";
    return ob_get_clean();
}

$about = renderTemplate('about');

echo renderTemplate('layouts/layout', $about);

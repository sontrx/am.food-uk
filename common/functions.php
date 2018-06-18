<?php

use Classes\Core\Container;

function containerPut($key, $value)
{
    return Container::put($key, $value);
}

function containerGet($key)
{
    return Container::get($key);
}

function getTheme()
{
    return containerGet('config')['theme'];
}
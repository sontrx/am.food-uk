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

function view($path, $params = [])
{
	return containerGet('view')->make($path, $params);
}
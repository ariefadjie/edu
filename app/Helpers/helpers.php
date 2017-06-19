<?php

function segmentMethod()
{
	return 2;
}

function segmentModel()
{
	return 1;
}

function routeRepo($value)
{
	$route = explode('.', Route::currentRouteName());
	if(isset($route[$value]))
	{
		return $route[$value]!='index' ? $route[$value] : null;
	}
	return null;
}

function routeMethod()
{
	return routeRepo(segmentMethod());
}

function routeModel()
{
	return routeRepo(segmentModel());
}
function alertMessage()
{
	$message = routeMethod().' '.routeModel();
	return ucfirst($message);
}
function swal($type)
{
    return alert()->{$type}(alertMessage(),ucwords($type).'!');
}


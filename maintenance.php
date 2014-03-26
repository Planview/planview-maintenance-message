<?php
/**
 * Plugin Name: Planview Maintenance Message
 * Description: Custom maintenance page.
 * Author: Planview WCS
 * Author URI: https://github.com/Planview
 * Version: 0.1
 *
 * Sends the correct headers so we don't scare of search bots, etc.
 * 
 * Adapted from code by Christopher Davis <http://christopherdavis.me>
 */

!defined('ABSPATH') && exit;

$headers = array(
    'Content-Type'  => 'text/html; charset=utf-8',
    'Retry-After'   => '600',
    'Expires'       => 'Wed, 11 Jan 1984 05:00:00 GMT',
    'Last-Modified' => gmdate('D, d M Y H:i:s') . ' GMT',
    'Cache-Control' => 'no-cache, must-revalidate, max-age=0',
    'Pragma'        => 'no-cache',
);

header("HTTP/1.1 503 Service Unavailable", true, 503);
foreach($headers as $h => $k)
    header("{$h}: {$k}", true);

?><!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Site is Temporarily Down for Maintenance</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.0/normalize.min.css">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro%3A300%2C400%2C600%2C700%2C300italic%2C400italic%2C600italic%2C700italic%7COpen+Sans%3A300italic%2C400italic%2C600italic%2C700italic%2C300%2C400%2C600%2C700">
        <style type="text/css">
        	body {background-color: #eff1f3; font-family: 'Open Sans', sans-serif;color: #333; }
        	.wrapper {text-align: center;margin: 40px 20px;}
        	.logo {display: block;margin:10px auto;}
        	h1 {color: #003479; font-family: 'Source Sans Pro', sans-serif; font-weight: 600;}
        	@media screen and (min-width: 768px) {.wrapper {margin-top: 20vh;}}
        	a {color: #003479;text-decoration: none;}
        	a:hover{text-decoration: underline;}
        </style>
    </head>
    <body>
        <!-- Add your site or application content here -->
    	<div class="wrapper">
			<img alt="Planview Logo" title="Planview" class="logo" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANAAAAAxCAYAAACrvCdTAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpDOTYxRjYyNEIwNDIxMUUyODZFNjk4MkU1N0QwMzcwRSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpDOTYxRjYyNUIwNDIxMUUyODZFNjk4MkU1N0QwMzcwRSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkM5NjFGNjIyQjA0MjExRTI4NkU2OTgyRTU3RDAzNzBFIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkM5NjFGNjIzQjA0MjExRTI4NkU2OTgyRTU3RDAzNzBFIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+UgMdOQAAEaJJREFUeNrsXQl4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" />


	        <h1>This Site is Temporarily Down for Maintenance</h1>
			<p>We apologize for any inconvenience; please try back in a few minutes.</p>

			<p>If this problem persists, please <a href="mailto:webmaster@planview.com">email webmaster@planview.com</a> or call us at +1 (800) 856-8600 (U.S only) or +1 (512) 346-8600.</p>
    	</div>
    </body>
</html>
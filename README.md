KitpagesRedirectBundle (work in progress)
=====================================

This is a very simple bundle that remove browser cache for a symfony2 website.

author : Philippe Le Van (@plv)

Current state of the project
----------------------------
Stable. It only add 3 headers on every responses :

    Cache-Control: must-revalidate, no-cache, no-store, post-check=0, pre-check=0, private
    Pragma: no-cache
    Expires: 2 years before current date


Installation
-------------
hum... as usual...

put the code in vendors/Kitpages/CacheControlBundle

add vendors/ in the app/autoload.php

add the new Bundle in app/appKernel.php

Users Guide
-----------
Nothing to do, juste include the bundle in appKernel.



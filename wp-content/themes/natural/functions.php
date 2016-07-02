<?php

// Standard functionality
require_once('modules/model/standardFunctionality.php');

// Add widgets
require_once('modules/model/newWidgets.php');

// Numbered pagination
//require_once('modules/model/pagination.php');

// Products
require_once('modules/model/shorcodeProducts.php');

// Breadcrumbs
require_once('modules/model/breadcrumbs.php');

// Ban Update WP, plugins, themes
require_once('modules/model/banUpdate.php');

// Custom post
require_once('modules/model/customPostProduct.php');
require_once('modules/model/customPostComments.php');
require_once('modules/model/customPostRecipes.php');
require_once('modules/model/customPostsProductsFood.php');

// Delete refirect canonical for products
require_once('modules/model/paginationRedirecCanonical.php');

// Delete empty <p>, <br>
//require_once('modules/model/deleteEmptyTags.php');

<?php 
defined( 'ABSPATH' ) || exit;
return array (
  'enable_page_caching' => true,
  'advanced_mode' => true,
  'enable_in_memory_object_caching' => false,
  'enable_gzip_compression' => true,
  'in_memory_cache' => 'memcached',
  'page_cache_length' => 1440,
  'cache_exception_urls' => '',
); 

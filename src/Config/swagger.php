<?php

return [
    'name' => env('SWAGGER_NAME'),    // 名称
    'title' => env('SWAGGER_TITLE'),    // 标题
    'scan_dir' => explode(',', env('SWAGGER_SCAN_DIR')), // 扫描目录
    'scan_options' => [],
    'enable_cache' => env('SWAGGER_ENABLE_CACHE'), // 是否开启缓存
    'cache_type' => env('SWAGGER_CACHE_TYPE'), // 缓存类型
    'cache_key' => env('SWAGGER_CACHE_KEY'), // 缓存key
];

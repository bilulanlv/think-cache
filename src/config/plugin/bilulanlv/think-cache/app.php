<?php
// 如果ThinkORM需要使用缓存，请取消注释，或者在其他合适的地方引入
//\think\facade\Db::setCache(new \Bilulanlv\ThinkCache\CacheManager());

return [
    // 开启插件
    'enable' => true,
    // 默认缓存驱动
    'default' => 'redis',
    // 缓存连接方式配置
    'stores'  => [
        // redis缓存
        'redis' => [
            // 驱动方式
            'type' => 'redis',
            // 服务器地址
            'host' => '127.0.0.1',
            // 缓存前缀
            'prefix' => 'cache:',
            // 默认缓存有效期 0表示永久缓存
            'expire'     => 0,
            // Thinkphp官方没有这个参数，由于生成的tag键默认不过期，如果tag键数量很大，避免长时间占用内存，可以设置一个超过其他缓存的过期时间，0为不设置
            'tag_expire' => 86400 * 7,
            // 缓存标签前缀
            'tag_prefix' => 'tag:',
        ],
        // 文件缓存
        'file' => [
            // 驱动方式
            'type' => 'file',
            // 设置不同的缓存保存目录
            'path' => runtime_path() . '/file/',
        ],
    ],
];

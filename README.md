## 说明
由于think-cache官方放弃了更新，且使用ThinkORM做缓存如果使用webman的Cache类，tag功能无法使用。

故本项目提取自ThinkPHP8最新的Cache模块，完美适配ThinkORM查询缓存的tag和其他所有方法。

详细情况请查看[ThinkPHP8官方缓存文档](https://doc.thinkphp.cn/v8_0/caches.html)
## 安装
```shell
composer require bilulanlv/think-cache
```

## 配置文件
配置文件参考文档，如下所示，将配置命名为`thinkcache.php`，存放在webman项目的config目录下
```php
// 如果ThinkORM需要使用缓存，请输入以下代码，或者在其他合适的地方引入
\think\facade\Db::setCache(new \bilulanlv\ThinkCache\CacheManager());

return [
    'default'    =>    'redis',
    'stores'    =>    [
        // 文件缓存
        'file'   =>  [
            // 驱动方式
            'type'   => 'file',
            // 设置不同的缓存保存目录 __DIR__ . '/../runtime/file/'
            'path'   => runtime_path() . '/file/',
        ],  
        // redis缓存
        'redis'   =>  [
            // 驱动方式
            'type'   => 'redis',
            // 服务器地址
            'host'       => '127.0.0.1',
            // Thinkphp官方没有这个参数，由于生成的tag键默认不过期
            // 如果tag键数量很大，避免长时间占用内存，可以设置一个超过其他缓存的过期时间
            'tag_expire' => 86400 * 30,
        ],  
    ],
];
```
## 使用说明
```php
use bilulanlv\ThinkCache\facade\ThinkCache;

ThinkCache::set('name', $value, 3600);
ThinkCache::remember('start_time', time());
ThinkCache::tag('tag')->set('name1','value1');
ThinkCache::tag('tag')->clear();

UserModel::where('id', 1)->cache($cache['key'], $cache['expire'], $cache['tag'])->find();
```
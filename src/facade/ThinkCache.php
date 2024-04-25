<?php

// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2023 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

namespace Bilulanlv\ThinkCache\facade;

use think\Facade;

/**
 * @see \Bilulanlv\ThinkCache\CacheManager
 * @mixin \Bilulanlv\ThinkCache\CacheManager
 */
class ThinkCache extends Facade
{
    /**
     * 获取当前Facade对应类名（或者已经绑定的容器对象标识）.
     *
     * @return string
     */
    protected static function getFacadeClass()
    {
        return 'Bilulanlv\ThinkCache\CacheManager';
    }
}

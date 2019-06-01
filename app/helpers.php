<?php
/**
 * Created by PhpStorm.
 * User: zhao
 * Date: 19-5-31
 * Time: 下午6:45
 */
// 方法讲当前请求路由名称转换为css类名称 作用是允许我们针对某个页面做样式定制
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

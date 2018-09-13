ThinkPHP 5.0
===============

[![Total Downloads](https://poser.pugx.org/topthink/think/downloads)](https://packagist.org/packages/topthink/think)
[![Latest Stable Version](https://poser.pugx.org/topthink/think/v/stable)](https://packagist.org/packages/topthink/think)
[![Latest Unstable Version](https://poser.pugx.org/topthink/think/v/unstable)](https://packagist.org/packages/topthink/think)
[![License](https://poser.pugx.org/topthink/think/license)](https://packagist.org/packages/topthink/think)

### 功能模块图
![img](http://pexpn9gr1.bkt.clouddn.com/%E5%8A%9F%E8%83%BD%E6%A8%A1%E5%9D%97%E5%9B%BE.png)
### 系统首页
![img](http://pexpn9gr1.bkt.clouddn.com/%E9%A6%96%E9%A1%B5.png)
### 移动端首页
![img](http://pexpn9gr1.bkt.clouddn.com/%E6%89%8B%E6%9C%BA%E7%AB%AF%E9%A6%96%E9%A1%B5.png)
### 用户登录、注册
![img](http://pexpn9gr1.bkt.clouddn.com/%E7%94%A8%E6%88%B7%E7%99%BB%E9%99%86.png)
&nbsp;&nbsp; ![img](http://pexpn9gr1.bkt.clouddn.com/%E7%94%A8%E6%88%B7%E6%B3%A8%E5%86%8C.png)
### 文章模块
![img](http://pexpn9gr1.bkt.clouddn.com/%E6%96%87%E7%AB%A0%E6%A8%A1%E5%9D%97.png)
### 个人中心、个人主页
![img](http://pexpn9gr1.bkt.clouddn.com/%E4%B8%AA%E4%BA%BA%E4%B8%AD%E5%BF%83.png)
&nbsp;&nbsp;![img](http://pexpn9gr1.bkt.clouddn.com/%E4%B8%AA%E4%BA%BA%E4%B8%BB%E9%A1%B5.png)
### 系统后台
![img](http://pexpn9gr1.bkt.clouddn.com/%E7%B3%BB%E7%BB%9F%E5%90%8E%E5%8F%B0.png)


> ThinkPHP5的运行环境要求PHP5.4以上。

详细开发文档参考 [ThinkPHP5完全开发手册](http://www.kancloud.cn/manual/thinkphp5)

## 目录结构

初始的目录结构如下：

~~~
www  WEB部署目录（或者子目录）
├─application           应用目录
│  ├─common             公共模块目录（可以更改）
│  ├─module_name        模块目录
│  │  ├─config.php      模块配置文件
│  │  ├─common.php      模块函数文件
│  │  ├─controller      控制器目录
│  │  ├─model           模型目录
│  │  ├─view            视图目录
│  │  └─ ...            更多类库目录
│  │
│  ├─command.php        命令行工具配置文件
│  ├─common.php         公共函数文件
│  ├─config.php         公共配置文件
│  ├─route.php          路由配置文件
│  ├─tags.php           应用行为扩展定义文件
│  └─database.php       数据库配置文件
│
├─public                WEB目录（对外访问目录）
│  ├─index.php          入口文件
│  ├─router.php         快速测试文件
│  └─.htaccess          用于apache的重写
│
├─thinkphp              框架系统目录
│  ├─lang               语言文件目录
│  ├─library            框架类库目录
│  │  ├─think           Think类库包目录
│  │  └─traits          系统Trait目录
│  │
│  ├─tpl                系统模板目录
│  ├─base.php           基础定义文件
│  ├─console.php        控制台入口文件
│  ├─convention.php     框架惯例配置文件
│  ├─helper.php         助手函数文件
│  ├─phpunit.xml        phpunit配置文件
│  └─start.php          框架入口文件
│
├─extend                扩展类库目录
├─runtime               应用的运行时目录（可写，可定制）
├─vendor                第三方类库目录（Composer依赖库）
├─build.php             自动生成定义文件（参考）
├─composer.json         composer 定义文件
├─LICENSE.txt           授权说明文件
├─README.md             README 文件
├─think                 命令行入口文件
~~~

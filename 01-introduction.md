# 简介

## 是什么
* 为复杂的数据提供一个转化层。
* 类似于 `json_encode()` 的工作。
* 如果单纯的使用 json_encode() 来返回数据，可能会造成 API 经常改动。

## 做什么
* 定义一个基础结构，作为数据和输出之间的桥梁，保证接口的不会经常变动。
* 集中的转化数据类型。
* 更方便的加载和格式化关联数据。
* 可以制定自己的数据格式。
* 支持数据结果分页。
* 方便的把复杂的数据简单化输出。

## 安装
### Composer
* 安装 `composer require league/fractal`
* 自动加载 `<?php require 'vendor/autoload.php';`

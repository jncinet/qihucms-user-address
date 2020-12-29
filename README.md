<h1 align="center">会员地址管理</h1>

## 安装

```shell
$ composer require jncinet/qihucms-user-address
```

## 使用
### 数据迁移
```shell
$ php artisan migrate
```

### 发布资源
```shell
$ php artisan vendor:publish --provider="Qihucms\UserAddress\AddressServiceProvider"
```

### 后台菜单
+ 地址管理：user/addresses

### 路由及参数说明

#### 会员收货地址

```
请求：GET
地址：/user/addresses?page={$page}&limit={$limit}
参数：
int          $page    （选填）页码
int          $limit   （选填）每页显示的条数
返回值：
{
    "data": [
        {
            "id"：1,
            "user_id"：1,
            "uri"：'公司' // 标识
            "name"：'张三' // 收货人姓名
            "phone"：'1300900****' // 收货人电话
            "address"：'安徽****' // 收货人地址
            "created_at": "3天前"  // 添加时间
        },
        ...
    ],
    "meta": {...},
    "links": {...}
}
```

#### 添加地址

```php
请求：POST
地址：/user/addresses
参数：
{
    "uri"：'公司' // 标识
    "name"：'张三' // 收货人姓名
    "phone"：'1300900****' // 收货人电话
    "address"：'安徽****' // 收货人地址
}
返回值：
{
    "id"：1,
    "user_id"：1,
    "uri"：'公司' // 标识
    "name"：'张三' // 收货人姓名
    "phone"：'1300900****' // 收货人电话
    "address"：'安徽****' // 收货人地址
    "created_at": "3天前"  // 添加时间
}
```

#### 更新地址

```php
请求：PAUTH|PUT
地址：/user/addresses/{id}
参数：
{
    "uri"：'公司' // 标识
    "name"：'张三' // 收货人姓名
    "phone"：'1300900****' // 收货人电话
    "address"：'安徽****' // 收货人地址
}
返回值：
{
    status: 'SUCCESS',
    result: {
        id: 1
    }
}
```

#### 删除地址

```php
请求：DELETE
地址：/user/addresses/{id}
返回值：
{
    status: 'SUCCESS',
    result: {
        id: 1
    }
}
```

## 数据库
### 会员地址：user_addresses

| Field             | Type      | Length    | AllowNull | Default   | Comment   |
| :----             | :----     | :----     | :----     | :----     | :----     |
| id                | bigint    |           |           |           |           |
| user_id           | bigint    |           |           |           | 会员ID     |
| uri               | varchar   | 55        |           |           | 标识       |
| name              | varchar   | 55        |           |           | 收货人     |
| phone             | varchar   | 55        |           |           | 联系电话    |
| address           | varchar   | 255       |           |           | 详细地址    |
| created_at        | timestamp |           | Y         | NULL      | 创建时间    |
| updated_at        | timestamp |           | Y         | NULL      | 更新时间    |

<?php
use SleepingOwl\Admin\Navigation\Page;
return [
    [
        'title' => "Contacts",
        'icon' => 'fa fa-credit-card',
        'pages' => [
            (new Page(\App\Post::class))
                ->setIcon('fa fa-fax')
                ->setPriority(0),
            (new Page(\App\User::class))
                ->setIcon('fa fa-fax')
                ->setPriority(100),
            (new Page(\App\Role::class))
                ->setIcon('fa fa-fax')
                ->setPriority(200),
            (new Page(\App\Role::class))
                ->setIcon('fa fa-fax')
                ->setPriority(400),
        ]
    ],
    [
        'title' => "Товар",
        'icon' => 'fa fa-newspaper-o',
        'pages' => [
            (new Page(\App\brand::class))
                ->setIcon('fa fa-newspaper-o')
                ->setPriority(0)->setTitle('Производители'),
            (new Page(\App\Category::class))
                ->setIcon('fa fa-newspaper-o')
                ->setPriority(10)->setTitle('Категории'),
            (new Page(\App\product::class))
                ->setIcon('fa fa-newspaper-o')
                ->setPriority(20)->setTitle('Товар'),
            (new Page(\App\Availability::class))
                ->setIcon('fa fa-newspaper-o')
                ->setPriority(30)->setTitle('Наличие'),
        ]
    ],
    [
        'title' => "Доставка и оплата",
        'icon' => 'fa fa-newspaper-o',
        'pages' => [
            (new Page(\App\Delivery::class))
                ->setIcon('fa fa-newspaper-o')
                ->setPriority(0)->setTitle('Способ доставки'),
            (new Page(\App\Payment::class))
                ->setIcon('fa fa-newspaper-o')
                ->setPriority(10)->setTitle('Способ оплаты'),
        ]
    ],




    [
        'title' => 'Доступ и разрешения',
        'icon' => 'fa fa-group',
        'pages' => [
            (new Page(\App\User::class))
                ->setIcon('fa fa-user')
                ->setPriority(0),
            (new Page(\App\Role::class))
                ->setIcon('fa fa-group')
                ->setPriority(100),
            (new Page(\App\Permit::class))
                ->setIcon('fa fa-group')
                ->setPriority(200)->setTitle('Доступ')
        ]
    ],

    [
        'title' => "Заказы",
        'icon' => 'fa fa-newspaper-o',
        'pages' => [
            (new Page(\App\order::class))
                ->setIcon('fa fa-newspaper-o')
                ->setPriority(0)->setTitle('Заказы'),

        ]
    ],


];
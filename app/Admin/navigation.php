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
            (new Page(\App\product::class))
                ->setIcon('fa fa-newspaper-o')
                ->setPriority(0),
            (new Page(\App\Category::class))
                ->setIcon('fa fa-newspaper-o')
                ->setPriority(10),
            (new Page(\App\Search::class))
                ->setIcon('fa fa-newspaper-o')
                ->setPriority(20),
            (new Page(\App\product::class))
                ->setIcon('fa fa-newspaper-o')
                ->setPriority(30),
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
                ->setPriority(200)
        ]
    ]
];
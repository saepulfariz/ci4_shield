# CI4_SHIELD

# Setup

- Install Codeigniter 4

```CLI
composer create-project codeigniter4/appstarter ci4_shield
```

- install shield

```CLI
  composer require codeigniter4/shield
```

- Setup shield

```CLI
  php spark shield:setup
```

- Add email, FromEmail, and Migrate Database

```CLI
php spark migrate --all
```

# Change File

## App\Config\App.php

- Change From

```PHP
public string $indexPage = 'index.php';
```

- To this

```PHP
public string $indexPage = '';
```

## App\Config\Filters.php

- Add in **`public array $aliases`**

```PHP
'session' => \CodeIgniter\Shield\Filters\SessionAuth::class,
'auth-rates' => \CodeIgniter\Shield\Filters\AuthRates::class,
'group' => \CodeIgniter\Shield\Filters\GroupFilter::class,
'permission' => \CodeIgniter\Shield\Filters\PermissionFilter::class,
```

- add in **`public array $globals`**

  ```PHP
  'before' => [
        // 'honeypot',
        // 'csrf',
        // 'invalidchars',
        'session' => ['except' => ['/', 'home', 'about', 'class', 'registerstudents', 'login*', 'register', 'auth/a/*']],
    ],
  ```

- add or change in **`public array $filters`**

```PHP
  public array $filters = [
    'auth-rates' => [
        'before' => [
            'login*', 'register', 'auth/*'
        ]
    ]
  ];
```

## App\Config\Auth.php

- Change Redirect **`public array $redirects`**

```PHP
public array $redirects = [
    'register'          => '/',
    // if login success redirect to dashboard
    'login'             => '/dashboard',
    // 'login'             => '/',
    'logout'            => 'login',
    'force_reset'       => '/',
    'permission_denied' => '/',
    'group_denied'      => '/',
];
```

- Change Action login and register **`public array $actions`**

```PHP
public array $actions = [
    'register' => null,
    'login'    => null,
];
```

- To this

```PHP
public array $actions = [
    'register' => \CodeIgniter\Shield\Authentication\Actions\EmailActivator::class,
    'login'    => \CodeIgniter\Shield\Authentication\Actions\Email2FA::class
];
```

- Allow Registration Page. http://localhost:8080/register

```PHP
public bool $allowRegistration = true;
// public bool $allowRegistration = false;
```

- Allow Reset Password. http://localhost:8080/login/magic-link

```PHP
public bool $allowMagicLinkLogins = true;
// public bool $allowMagicLinkLogins = false;
```

# References

- https://shield.codeigniter.com/user_management/managing_users/
- https://novawebbusiness.com/2023/05/22/codeigniter-4-shield-with-multi-role/
- https://www.youtube.com/watch?v=HteTgBwgy0c ( setup shield )
- https://www.youtube.com/watch?v=104Q76g7DWA ( Rest Api Shield )

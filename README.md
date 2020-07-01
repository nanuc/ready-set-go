# Ready-set-go
Package to quickly create side projects based n the TALL stack with user management, Paddle integration, ...


## Installation
### Add repository to you composer.json
```
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/nanuc/ready-set-go"
    }
]
```

### Add package to composer.json
You can install the package via composer:
```
"require": {
    ...
    "nanuc/ready-set-go": "dev-master"
},
```

### Update composer
`composer update`

## Setup
### Initialize
The command `php artisan rsg:initialize` copies all the stuff you need. Attention: files are changed! Know what you are doing!

### Run migrations
`php artisan vendor:publish --provider="Nanuc\ReadySetGo\ReadySetGoServiceProvider" --tag=migrations`
`php artisan migrate`

### Update user model
Your User model must extend `Nanuc\ReadySetGo\Models\BaseUser` instead of `Authenticatable`.

### Cashier Paddle
Update `.env` with Paddle data.
```
PADDLE_VENDOR_ID=your-paddle-vendor-id
PADDLE_VENDOR_AUTH_CODE=your-paddle-vendor-auth-code
PADDLE_PUBLIC_KEY="-----BEGIN PUBLIC KEY-----
...
-----END PUBLIC KEY-----"
CASHIER_MODEL=App\Models\User
``` 

The default Cashier currency is United States Dollars (USD). You can change the default currency by setting the CASHIER_CURRENCY environment variable:
`CASHIER_CURRENCY=EUR`


### Send mails
Mails are sent with the Nanuc AWS SES account. Verify a domain at [https://eu-west-1.console.aws.amazon.com/ses/home?region=eu-west-1#verified-senders-domain:].
Alternatively just use HELO.

#### Setup .env
##### AWS SES
```
MAIL_MAILER=ses 
MAIL_FROM_ADDRESS="${APP_NAME}@${APP_NAME}"
MAIL_FROM_NAME="${APP_NAME}"

SES_KEY=AKIA3I...
SES_KEY_SECRET=CK6fTy...
SES_REGION=eu-west-1
```
##### HELO
```
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME="${APP_NAME}"
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="${APP_NAME}@${APP_NAME}"
MAIL_FROM_NAME="${APP_NAME}"
```


### Loggy
#### Setup .env
```
LOGGY_KEY=nanuc-... 
```


### Flare (optional)
#### Create project
Create project at [https://flareapp.io/projects].

#### Setup .env
```
FLARE_KEY= 
```
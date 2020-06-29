# Ready-set-go
Package to quickly create side projects based n the TALL stack with user management, Paddle integration, ...


## Installation
### Install via composer
You can install the package via composer:
```
composer require nanuc/ready-set-go
```

## Setup
### Initialize
The command `php artisan rsg:initialize` copies all the stuff you need. Attention: files are changed! Know what you are doing!

### Run migrations
`php artisan vendor:publish --provider="Nanuc\ReadySetGo\ReadySetGoServiceProvider" --tag=migrations`
`php artisan migrate`

### Enable user mail address verification
Add `MustVerifyEmail` interface to `User` model:
`class User extends Authenticatable implements MustVerifyEmail`

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
# Ready-set-go
Package to quickly create side projects based n the TALL stack with user management, Paddle integration, ...


## Installation
### Install via composer
You can install the package via composer:
```
composer require nanuc/ready-set-go
```

## Setup
### Send mails
Mails are sent with the Nanuc AWS SES account. Verify a domain at [https://eu-west-1.console.aws.amazon.com/ses/home?region=eu-west-1#verified-senders-domain:].

#### Setup .env
```
MAIL_MAILER=ses 
MAIL_FROM_ADDRESS=hello@example.io
MAIL_FROM_NAME="${APP_NAME}"

SES_KEY=AKIA3I...
SES_KEY_SECRET=CK6fTy...
SES_REGION=eu-west-1
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
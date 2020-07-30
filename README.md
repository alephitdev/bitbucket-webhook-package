#BitBucket Webhook Deployment for Laravel Projects

## Installation
```
composer require alephit/bitbucket-webhook-package
```

## Usage
Every laravel project using this package has the following route included:
```
<project domain>/build
```

This will automatically updates the branch of the deployed application and runs the database migration.
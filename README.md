# Magento 2 Call For Price GraphQL / PWA
Mageplaza Call For Price Extension supports getting and pushing data on the website with GraphQl.

## How to install

Run the following command in Magento 2 root folder:

```
composer require mageplaza/module-call-for-price-graphql
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```
To start working with **Call For Price GraphQL** in Magento, you need to:

- Use Magento 2.3.x. Return your site to developer mode

- Install [chrome extension](https://chrome.google.com/webstore/detail/chromeiql/fkkiamalmpiidkljmicmjfbieiclmeij?hl=en) (currently does not support other browsers)

- Set **GraphQL endpoint** as `http://<magento2-3-server>/graphql` in url box, click **Set endpoint**. (e.g. http://develop.mageplaza.com/graphql/ce232/graphql)

- The mutation Mageplaza supports is creating customer requests,etc. Details can be viewed [here](https://documenter.getpostman.com/view/10589000/SzRxXrG9?version=latest).

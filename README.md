# Magento 2 Call For Price GraphQL / PWA
[Mageplaza Call For Price for Magento 2](https://www.mageplaza.com/magento-2-call-for-price/) is an effective solution for online store owners to control the visibility of products’ prices on the store. 

The purpose of hiding product prices is to encourage customers to contact the store and ask for the prices. This method can build up the interaction between customers and the store and create a chance for stores to dig deeper into customers’ needs and serve them better. Customers also have time to request and negotiate for a bargain with the online store. Hiding product prices is also an effective way to keep your price strategy secret from competitors.

The extension enables you to replace the Add to cart button with multiple different options, including Hide “Add to cart button,” Popup a quote from, Redirect to an URL, and Log-in to see price. These buttons are for drawing customers to a specific action that creates more customer engagement. 

The store admin can enable the Call for price feature available to specific products and categories by setting rules from the backend. Depending on the specific conditions, the rule will be applied to the products or categories that meet the conditions. You can also set a separate rule for a product from the backend. All the rule-related information will be logged in a management grid so that the store admin can quickly view and manage the rule and the applicable products. 

The store admin can also set the price to be visible to specific visitors. Usually, the customers are classified based on customer groups (General, Wholesale, and Retailer), store views, or by any groups admins want to set. From the rule management grid, the store admin can see  the rules are covering which customer groups.

Besides, an advanced report is included in this extension to help you track the call for price requests. The report will tell you monthly the number and names of the requests in the top 10. It also provides a comparison between two continuous months, so you can compare and know if your business is doing well. 

Another good news is that **Magento 2 Call For Price is now a part of Mageplaza Call For Price extension that adds GraphQL features.** This supports PWA compatibility and enables you to get and push data on the website with GraphQl.

## 1. How to install

Run the following command in Magento 2 root folder:

```
composer require mageplaza/module-call-for-price-graphql
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```
**Note:** 
Magento 2 Call For Price GraphQL requires installing [Mageplaza Call For Price](https://www.mageplaza.com/magento-2-call-for-price/) in your Magento installation. 

## 2. How to use
To start working with **Call For Price GraphQL** in Magento, you need to:

- Use Magento 2.3.x or higher. Return your site to developer mode
- Install [chrome extension](https://chrome.google.com/webstore/detail/chromeiql/fkkiamalmpiidkljmicmjfbieiclmeij?hl=en) (currently does not support other browsers)
- Set **GraphQL endpoint** as `http://<magento2-3-server>/graphql` in url box, click **Set endpoint**. (e.g. http://develop.mageplaza.com/graphql/ce232/graphql)
- The mutation Mageplaza supports is creating customer requests,etc. Details can be viewed [here](https://documenter.getpostman.com/view/10589000/SzRxXrG9?version=latest).

## 3. Devdocs
- [Magento 2 Call For Price API & examples](https://documenter.getpostman.com/view/10589000/SzRxWqD4?version=latest)
- [Magento 2 Call For Price GraphQL & examples](https://documenter.getpostman.com/view/10589000/SzRxXrG9?version=latest)

Click on Run in Postman to add these collections to your workspace quickly.

![Magento 2 blog graphql pwa](https://i.imgur.com/lhsXlUR.gif)

## 4. Contribute to this module 
Feel free to **Fork** and contribute to this module. 

You can create a pulll request for changes. We will consider to accept and merge your proposed changes in the main branch. 

## 5. Get support 
- Feel free to [contact us](https://www.mageplaza.com/contact.html) if you have any question. 
- If this post is helpful for you, please give it a **Star** ![star](https://i.imgur.com/S8e0ctO.png)


<h2 align="center">Wordpress Rest API Boilerplate</h2>
<p align="center">Wodpress API with Plop Generator</p>

---

<p align="center">
  <img src="https://github.com/lipex360x/wordpress_api_rest/blob/main/assets/screen.png" />
</p>

---

#### :bookmark_tabs: Content Index

- [Startup](#zap-startup)

- [Generators](#zap-generator)

- [REST Routes](#zap-rest-routes)

---

#### :zap: Startup
* Install Packages
- Run: `yarn` or `npm i` in terminal

* Install Plugins

- [WP File Manager](https://wordpress.org/plugins/wp-file-manager/)

- [JWT Authentication](https://br.wordpress.org/plugins/jwt-authentication-for-wp-rest-api/)


Using ***WP File Manager***, insert in `wp-config.php`

```php
define('JWT_AUTH_SECRET_KEY', 'JWT_AUTH_SECRET_KEY_STRING');

define('JWT_AUTH_CORS_ENABLE', true);
```

* Postman (optional)

Download, install [Postman](https://www.postman.com/downloads/) and import `postman_collection.json` available in this project

Create the Global Variables called to use pre-request script
* *BASE_URL*
* *ADMIN_USER*
* *ADMIN_PASS*

Update the pre-script from *MODULE* path

---

#### :zap: Generator

- Run: `yarn gen` or `npm run gen` in terminal

- Follow the instructions

---

#### :zap: Rest Routes

http://[wordpress.url]/wp-json/api/[entity]

---

:point_up_2: [Go to Content Index](#bookmark_tabs-content-index)

---

:pushpin: Tips: for easier navigation by github, consider installing the [Octotree](https://chrome.google.com/webstore/detail/octotree-github-code-tree/bkhaagjahfmjljalopjnoealnfndnagc) plugin


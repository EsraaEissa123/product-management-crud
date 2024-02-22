
# Product Management Crud

### How to setup this project?
* First step you need to clone it in your computer using this command:
```php
    git clone https://github.com/EsraaEissa123/product-management-crud.git
```

* Second step just need to run this command:
    * this command will install all dependincies
    * this command will migrate all database
    * this command will seed fake data 
    * this command will run the project
```php
    php artisan app:initialization //this a custom command I created to run project in one command
```
### Some hints to test
* you can test product with id 50000 to show its pharmacies
* you can test the command to the 5 cheapest by 

```php
   php artisan products:search-cheapest 50000
```
* you can test pharmacies CRUD as APIs by postman collection attached in the project with name
product-management-crud.postman_collection



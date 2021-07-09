## Shipping app

This small SPA is using Vue.js and Laravel for a back end API. Each of the endpoints are using laravels built in api.php and there is a single route in web.php to allow for the vue instance to load. The vue instance is using axios to make all api calls and data is called as and when needed using the shipper ID as the main point of reference. 

If this was a full piece of code going to production I would have certainly did more in terms of input validation on the front end, used more bespoke styles and classes, with the use of SCSS or LESS. I decided npm for speed of build instead of yarn and Bootstrap Vue to fast prototype the front end. 

To set up and run do the following:

- Clone the project
- composer install
- npm install
- php artisan migrate
- npm run dev



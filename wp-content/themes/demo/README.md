
EpicPress
===

This is a starter theme based of Automattic's _s built by [Willie Ching](http://willieching.com/).

Installation
---------------

### Requirements

EpicPress requires the following dependencies:

- [Node.js](https://nodejs.org/)
    
- [Composer](https://getcomposer.org/)


### Setup

To start using all the tools that come with EpicPress  you need to install the necessary Node.js and Composer dependencies :

```sh
$ npm install
```


### Available NPM commands

- `npm run build` : compiles and minifies all CSS, JS, and images into the dist folder
- `npm start` : watches all SASS files and recompiles them to css when they change.


### ACF Custom Button Field

To start using the ACF Field **Custom Button** follow these steps: 

1. Add a sites button colors by going to WP Admin Bar -> Custom Fields -> Button Options. 
    This will add these as options to the Button Style field
2. Add the corresponding button classes and styles to _global.scss
3. Add a new field with the field type **Custom Button**
4. Use the follow code to print your **Custom Button**
    ```php
        $test_button = get_field('field_name');
        print_button($test_button); 
    ```

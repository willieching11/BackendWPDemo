
## Generation Genius Demo

Here is a base theme I set up using bootstrap and underscore.
If needed, the demo db is located here, https://drive.google.com/file/d/12yp6vdX2fV4_f67GyGSgbM474GV1Het7/view?usp=sharing<br />
The test login that I have set up has these credentials:<br />
username: test<br />
password: testing123

When the plugin, "Wistia" is activated, a video is displayed on the homepage. If no user is logged in, the video won't play pasted 1 minutes until the user signs in. I am using Ajax to login users without a reload. The specific files where I did most of the work are in:<br />

wp-content/themes/demo/js/custom.js (JS Ajax Call)<br />
wp-content/themes/demo/index.php (Homepage)<br />
wp-content/plugins/wistia/wistia.php (Plugin/Login set up)


=========

EpicPress

=========

This is a starter theme based of Automattic's _s built by [Willie Ching](http://willieching.com/).

Installation
---------------
### Setup

To start using all the tools that come with EpicPress  you need to install the necessary Node.js and Composer dependencies :

```sh
$ npm install
```
### Available NPM commands

- `npm run build` : compiles and minifies all CSS, JS, and images into the dist folder
- `npm start` : watches all SASS files and recompiles them to css when they change.
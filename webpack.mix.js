const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .sourceMaps();

// <------ Admin ------> //
// Slug
mix.js("resources/js/admin/slug.js", "public/js/admin");
mix.postCss("resources/css/style.css", "public/css");

//Product Category
mix.js("resources/js/admin/ProductCategory.js", "public/js/admin");
//Brand
mix.js("resources/js/admin/brand.js", "public/js/admin");
//User
mix.js("resources/js/admin/user.js", "public/js/admin");
//Role
mix.js("resources/js/admin/role.js", "public/js/admin");
//Post Category
mix.js("resources/js/admin/PostCategory.js", "public/js/admin");
//Slide
mix.js("resources/js/admin/slide.js", "public/js/admin");
//Tag
mix.js("resources/js/admin/tag.js", "public/js/admin");
//Product
mix.js("resources/js/admin/product.js", "public/js/admin");
//Post
mix.js("resources/js/admin/post.js", "public/js/admin");
//NewsLetter
mix.js("resources/js/admin/NewsLetter.js", "public/js/admin");
//Discount
mix.js("resources/js/admin/discount.js", "public/js/admin");

// <------ Web ------> //
//Main
mix.js("resources/js/web/main.js", "public/js/web");
//Product
mix.js("resources/js/web/product.js", "public/js/web");
//Register
mix.js("resources/js/web/register.js", "public/js/web");
//Login
mix.js("resources/js/web/login.js", "public/js/web");
//Forgot Password
mix.js("resources/js/web/forgotPassword.js", "public/js/web");
//Reset Password
mix.js("resources/js/web/resetPassword.js", "public/js/web");
//Cart
mix.js("resources/js/web/cart.js", "public/js/web");

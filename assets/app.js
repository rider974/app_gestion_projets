import { registerReactControllerComponents } from '@symfony/ux-react';
import './bootstrap.js';
import 'bootstrap/dist/js/bootstrap.bundle.min';
import 'bootstrap/dist/css/bootstrap.min.css';
import './styles/app.css';
import './styles/header.css';
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
const $ = require('jquery');
// any CSS you import will output into a single css file (app.css in this case)

// loads the jquery package from node_modules

// create global $ and jQuery variables
global.$ = global.jQuery = $;
$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});
registerReactControllerComponents(require.context('./react/controllers', true, /\.(j|t)sx?$/));

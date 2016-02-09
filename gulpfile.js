var elixir = require('laravel-elixir'),
    watch = require('gulp-watch');

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    watch = require('gulp-watch'),
    jshint = require('gulp-jshint'),
    stylish = require('jshint-stylish'),
    uglify = require('gulp-uglify'),
    browserSync = require('browser-sync'),
    minifycss = require('gulp-minify-css'), 
    autoprefixer = require('gulp-autoprefixer'),
    plumber = require('gulp-plumber'),
    reload  = browserSync.reload,
    order = require("gulp-order"),
    browserify = require('gulp-browserify');

var resources = {
    js_src : [
        /* module,config, routes*/
        'dev/uuorkstore/js/module.js',
        'dev/uuorkstore/js/config.js',
        'dev/uuorkstore/js/config.lazyload.js',
        'dev/uuorkstore/js/routes.js',
        /* controllers, directives, filters, services*/
        'dev/uuorkstore/js/module.ctrl.js',
        'dev/uuorkstore/js/modules/**/js/*js',
        'dev/uuorkstore/js/framework/controllers/*.js',
        'dev/uuorkstore/js/controllers/*.js',
        'dev/uuorkstore/js/framework/directives/*.js',
        'dev/uuorkstore/js/directives/**/*.js',
        'dev/uuorkstore/js/framework/filters/*.js',
        'dev/uuorkstore/js/filters/*.js',
        'dev/uuorkstore/js/framework/services/*.js',
        'dev/uuorkstore/js/services/*.js',        
        /*modules*/ 
        'dev/uuorkstore/js/modules.js',
    ],
    js_dest : 'public/js/',
    mobile_js_dest: 'wrapper/www/js',
    /* lint */ 

    js_lint_src: [
        /* module,config, routes*/
        'dev/uuorkstore/js/module.js',
        'dev/uuorkstore/js/config.js',
        'dev/uuorkstore/js/routes.js',
        /* controllers, directives, filters, services*/
        'dev/uuorkstore/js/modules/**/js/*js',
        'dev/uuorkstore/js/controllers/*.js',
        'dev/uuorkstore/js/directives/**/*.js',
        'dev/uuorkstore/js/filters/*.js',
        'dev/uuorkstore/js/services/*.js',
        /*modules*/ 
        'dev/uuorkstore/js/modules.js',
    ],


    /* views */
    views:{
        src: [
        'dev/uuorkstore/views/*.html',
        'dev/uuorkstore/views/**/*.html',
        ],
        dest: 'public/views/'
    },

    sass_src: [
        'dev/uuorkstore/sass/*.scss',    
    ],
    css_dest: 'public/css/'
    
};


gulp.task('uu-sass', function() {
    gulp.src(resources.sass_src)
      .pipe(plumber())
      .pipe(sass())
      .pipe(autoprefixer(
        'last 2 version',
        '> 1%',
        'ie 8',
        'ie 9',
        'ios 6',
        'android 4'
      ))
      // .pipe(minifycss())
      .pipe(concat('all.css'))
      .pipe(gulp.dest(resources.css_dest));
});

/**
 * Lint tasl cheks Js files for errors
 * @return {none} 
 */
gulp.task('js-lint', function() {
    gulp.src(resources.js_lint_src)
      .pipe(jshint())
      .pipe(jshint.reporter(stylish));
});

gulp.task('uuorkstore-js', function() {
    gulp.src(resources.js_src)
    .pipe(concat('scripts.min.js'))
      .pipe(gulp.dest(resources.js_dest));
});

gulp.task('uuorkstore-js-production', function(){
    gulp.src(resources.js_src)
    .pipe(concat('ugly.min.js'))
        .pipe(uglify())
            .pipe(gulp.dest(resources.js_dest));
});

gulp.task('uuorkstore-html', function(){
    gulp.src(resources.views.src)
        .pipe(gulp.dest(resources.views.dest));

});

gulp.task('uuorkstore-dev', ['uuorkstore-js', 'uuorkstore-html', 'uu-sass', 'js-lint'], function(){
    gulp.watch(resources.js_src,['uuorkstore-js']);
    gulp.watch(resources.views.src, ['uuorkstore-html']);
    gulp.watch(resources.sass_src, ['uu-sass']);
    gulp.watch(resources.js_lint_src, ['js-lint']);
   // gulp.watch(resources.js_src,['uuorkstore-js-production']);
});
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */
/**

	scripts:
	- First files
	- Second output folder
	- Third  source folder 

 */
elixir(function(mix) {
    mix.sass(['*.scss'], 'public/css/all.css');
    /**

		scripts:
		- First files
		- Second output folder
		- Third  source folder 

 	*/
    
});



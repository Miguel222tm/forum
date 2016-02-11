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
        'dev/clubmein/scripts/app.js',
        'dev/clubmein/scripts/config.js',
        'dev/clubmein/scripts/config.lazyload.js',
        'dev/clubmein/scripts/config.router.js',
        'dev/clubmein/scripts/app.modules.js',
        'dev/clubmein/scripts/app.ctrl.js',
        'dev/clubmein/scripts/directives/*.js',
        'dev/clubmein/scripts/filters/*.js',
        'dev/clubmein/scripts/services/*.js',
        'dev/clubmein/scripts/controllers/*.js',

        

    ],
    js_dest : 'public/scripts/',
    mobile_js_dest: 'wrapper/www/js',
    /* lint */ 

    /* views */
    views:{
        src: [
        'dev/clubmein/views/*.html',
        'dev/clubmein/views/**/*.html',
        ],
        dest: 'public/views/'
    },

    sass_src: [
        'dev/clubmein/sass/*.scss',    
    ],
    css_dest: 'public/css/'
    
};


gulp.task('clubmein-sass', function() {
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

gulp.task('clubmein-js', function() {
    gulp.src(resources.js_src)
    .pipe(concat('scripts.min.js'))
      .pipe(gulp.dest(resources.js_dest));
});

gulp.task('clubmein-js-production', function(){
    gulp.src(resources.js_src)
    .pipe(concat('ugly.min.js'))
        .pipe(uglify())
            .pipe(gulp.dest(resources.js_dest));
});

gulp.task('clubmein-html', function(){
    gulp.src(resources.views.src)
        .pipe(gulp.dest(resources.views.dest));

});

gulp.task('clubmein-dev', ['clubmein-js', 'clubmein-html' , 'clubmein-sass'], function(){
    gulp.watch(resources.js_src,['clubmein-js']);
    gulp.watch(resources.views.src, ['clubmein-html']);
    gulp.watch(resources.sass_src, ['clubmein-sass']);
    /*gulp.watch(resources.js_lint_src, ['js-lint']);*/
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



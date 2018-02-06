var config = {
    sass: 'assets/scss/**/*.{scss,sass}',
    sassFolder: 'assets/sass/',
    css: 'dist/css',

    jsFiles: 'assets/js/**/*.js',
    js: 'assets/js/'
};

// Core
require('es6-promise').polyfill();
var gulp        = require('gulp');
var gutil       = require('gulp-util');

// Stylesheets
var sass        = require('gulp-sass');
var notify      = require("gulp-notify");
var plumber     = require('gulp-plumber');
var pleeease    = require('gulp-pleeease');
var sourcemaps  = require('gulp-sourcemaps');
var livereload = require('gulp-livereload');

// Javascripts
var concat = require('gulp-concat');
var uglify = require("gulp-uglify");

// Tools
var plumber     = require('gulp-plumber');

var PleeeaseOptions = {
    autoprefixer: true,
    pseudoElements: true,
    import: true,
    minifier: true,
    mqpacker: false,
    next: false,
    browsers: ["last 3 versions", "ie 9"]
};

gulp.task('serve', function(done) {
    var express = require('express');
    var app = express();
    app.use(express.static(__dirname));
    app.listen(4004, function () {
        done();
    });
});

gulp.task('sass', function () {
    gulp.src( './assets/scss/**/*.{scss,sass}' )
        .pipe(plumber({
            errorHandler: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        .pipe(sourcemaps.init())
        .pipe(sass({
            onError: function(err) {
                return notify().write(err);
            },
            includePaths : ['scss/'],
        }))
        .pipe(sourcemaps.write())
        .pipe(pleeease(PleeeaseOptions))
        .pipe(gulp.dest( './dist/css' ))
        .pipe(livereload());
    // .pipe(notify({ message: 'Styles generated' }));

});

gulp.task('build-js', function() {
    return gulp.src([
        './assets/js/**/*.js',
    ])
        .pipe(plumber({
            errorHandler: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        .pipe(concat('app.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('dist/js'))
        .pipe(livereload());
});

gulp.task('live', function() {
    gulp.src( '**/*.php' )
        .pipe(livereload());
});

gulp.task('default', ['serve', 'sass','build-js'], function () {
    gulp.watch( config.sass , ['sass']);
    gulp.watch( config.jsFiles , ['build-js']);
    gulp.watch('**/*.php', ['live']);
    livereload.listen(35743);
});
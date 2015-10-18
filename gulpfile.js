// Tasks som har användts (css-comblist,uncss,colorguard)
var gulp = require('gulp');
var uglify = require('gulp-uglify');
var minifyCss = require('gulp-minify-css');
var rename = require('gulp-rename');
var csslint = require('gulp-csslint');
var shorthand = require('gulp-shorthand');
var autoprefixer = require('gulp-autoprefixer');
var notify = require('gulp-notify');
var watch = require('gulp-watch');
var concat = require('gulp-concat');


gulp.task('css-theme-concat', function() {
  return gulp.src(['css/wpsvse-theme.css',
                  'css/font-awesome.css',
                  'css/dropdowns-enhancement.css'])

    .pipe(concat('wpsvse-concat.css'))
    .pipe(gulp.dest('./css/compressed/'));
});

// Körs på kommando när bbpress eller buddypess filer uppdateras med stilsättning. (gulp css-vendor-compress)
gulp.task('css-vendor-compress', function() {
  return gulp.src(['css/bootstrap.css',
                    'css/bbpress.css',
                    'css/buddypress.css'])

    .pipe(minifyCss({compatibility: 'ie8'}))
    .pipe(rename({
      extname: '.min.css'
    }))
    .pipe(gulp.dest('css/compressed'))
    .pipe(notify("Komprimerade externa CSS filer utan problem"));
});

// Stylesheet optimering
gulp.task('css-theme-compress', function() {
  return gulp.src(['css/compressed/wpsvse-concat.css',
                    'css/wpsvse-editor-style.css',
                    'css/wpsvse_adminbar.css'])

    .pipe(shorthand())
    .pipe(autoprefixer({
     browsers: ['last 2 versions'],
      cascade: false
    }))
    .pipe(minifyCss({compatibility: 'ie8'}))
    .pipe(rename({
      extname: '.min.css'
    }))
    .pipe(gulp.dest('css/compressed/'))
    .pipe(notify("Komprimerade temats CSS filer utan problem"));
})

// LintCSS för korrektion av stilsättningskod
gulp.task('lint-css', function() {
 return gulp.src('css/wpsvse-theme')
  .pipe(csslint())
  .pipe(csslint.reporter())
});


// Javascript optimering
gulp.task('javascript-compress', function() {
  return gulp.src(['js/wpsvse.js',
                   'js/buddypress.js',
                   'js/html5shiv.js',
                   'js/dropdowns-enhancement.js'])

  .pipe(uglify())
  .pipe(rename({
    extname: '.min.js'
  }))
  .pipe(gulp.dest('js/compressed/'))
  .pipe(notify("Komprimerade Javascript utan problem"));
});


// Övervakning av filändringar
gulp.task('watch', function() {
    gulp.watch('./css/**.css', ['css-theme-concat', 'css-theme-compress']);
    gulp.watch('./js/**.js', ['javascript-compress']);
    gulp.watch(['./css/buddypress.cs', './css/bbpress.css', './css/bootstrap.css'], ['css-vendor-compress']);
});


gulp.task('default', ['watch']);

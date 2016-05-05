var gulp = require('gulp'),
  postcss = require('gulp-postcss');
  autoprefixer = require('autoprefixer');
  focus = require('postcss-focus');
  nano = require('cssnano');
  rename = require('gulp-rename');

gulp.task('css', function() {
  var processors = [
    autoprefixer,
    focus,
    nano({discardComments: {removeAll: true}, zindex: false, filterPlugins: false})
  ];

  return gulp.src('./style.css')
    .pipe(postcss(processors))
    .pipe(rename({
      extname: '.min.css'
    }))
    .pipe(gulp.dest('./'))
});

var gulp = require('gulp'),
    postcss = require('gulp-postcss');
    focus = require('postcss-focus');
    nano = require('cssnano');
    rename = require('gulp-rename');
    watch = require('gulp-watch');
    cssnext = require('postcss-cssnext');

gulp.task('css', function() {
  var processors = [
    focus,
    cssnext({
      warnForDuplicates: false
    }), 
    nano({discardComments: {
      removeAll: true},
      zindex: false,
      filterPlugins: false
    })
  ];

  return gulp.src('./style.css')
    .pipe(postcss(processors))
    .pipe(rename({
      extname: '.min.css'
    }))
    .pipe(gulp.dest('./'))
});

gulp.task('default', ['css'], function() {
  gulp.watch('./style.css', ['css']);
});

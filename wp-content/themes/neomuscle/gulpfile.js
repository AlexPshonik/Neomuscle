var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer');


gulp.task('sass', function() {
  return gulp.src('assets/sass/**/*.scss')
  .pipe(sass().on('error', sass.logError))
  .pipe(autoprefixer(['last 15 versions']))
  .pipe(gulp.dest('.'))
});

gulp.task('sass:watch', function () {
  gulp.watch('assets/sass/**/*.scss', ['sass']);
});
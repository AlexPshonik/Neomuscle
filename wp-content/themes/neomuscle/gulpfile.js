var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    notify = require('gulp-notify');


gulp.task('sass', function() {
  return gulp.src('assets/sass/**/*.scss')
  .pipe(sass({ outputStyle: 'expanded' }).on("error", notify.onError()))
  .pipe(autoprefixer(['last 15 versions']))
  .pipe(gulp.dest('.'))
});

gulp.task('sass:watch', function () {
  gulp.watch('assets/sass/**/*.scss', ['sass']);
});
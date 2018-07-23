var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');

//Style paths
var sassFiles = 'sass/style.scss',
    cssDest = '.';

gulp.task('build', function () {
    gulp.src(sassFiles)
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer(['last 15 versions']))
        .pipe(gulp.dest(cssDest));
});
var gulp = require('gulp');
var sass = require('gulp-sass');

//Style paths
var sassFiles = 'sass/style.scss',
    cssDest = '.';

gulp.task('build', function(){
    gulp.src(sassFiles)
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest(cssDest));
});
var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

gulp.task('styles', function() {
    gulp.src('resources/assets/sass/**/*.scss')
    	.pipe(sass().on('error', sass.logError))
    	.pipe(sass({outputStyle: 'compressed'}))
        .pipe(gulp.dest('public/css/'))
});

gulp.task('scripts', function() {
  gulp.src('resources/assets/js/**/*.js')
    .pipe(concat('app.js'))
    .pipe(uglify())
    .pipe(gulp.dest('public/js/'))
});

//Watch task
gulp.task('default',function() {
    gulp.watch('resources/assets/sass/**/*.scss',['styles']);
    gulp.watch('resources/assets/js/**/*.js',['scripts']);
});
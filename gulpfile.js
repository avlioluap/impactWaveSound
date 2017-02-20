const gulp = require('gulp'),
      sass = require('gulp-sass'),
      concat = require('gulp-concat'),
      uglify = require('gulp-uglify'),
      refresh = require('gulp-refresh')

gulp.task('styles', function() {
    gulp.src('resources/assets/sass/**/*.scss')
        .pipe(sass({includePaths: ['resources/assets/sass']}))
    	//.pipe(sass().on('error', sass.logError))
    	.pipe(sass({outputStyle: 'compressed'}))
        .pipe(gulp.dest('public/css/'))
        .pipe(refresh())
});

gulp.task('scripts', function() {
  gulp.src('resources/assets/js/**/*.js')
    .pipe(concat('app.js'))
    .pipe(uglify())
    .pipe(gulp.dest('public/js/'))
    .pipe(refresh())
});

//Watch task
gulp.task('default',function() {
    refresh.listen()
    gulp.watch('resources/assets/sass/**/*.scss',['styles']);
    gulp.watch('resources/assets/js/**/*.js',['scripts']);
});
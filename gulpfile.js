let gulp        = require('gulp');
let autoprefix  = require('gulp-autoprefixer');
let minifyCss   = require('gulp-minify-css');
let cssSrc      = 'resources/css/main.css';
let cssDest     = 'resources/css/min';

gulp.task('css', function () {
    return gulp.src(cssSrc)
        .pipe(minifyCss())
        .pipe(autoprefix('last 2 version'))
        .pipe(gulp.dest(cssDest))
});
gulp.task('default',function () {
    gulp.watch('resources/css/*.css',gulp.series('css'));
});




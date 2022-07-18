const { src, dest, watch, parallel, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const htmlbeautify = require('gulp-html-beautify');
const babel = require('gulp-babel');
const sync = require('browser-sync').create();
const htmlPartial = require('gulp-html-partial');


function generateHTML(cb) {
    src('./src/*.html')
        .pipe(htmlPartial({
            basePath: './src/partials/'
        }))
        .pipe(htmlbeautify({"indent_size": 4,}))
        .pipe(dest('./dist'));
    cb();
}

function generateCSS(cb) {
    src('./src/sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(dest('dist/style'))
        .pipe(sync.stream());
    cb();
}

function generateJS(cb) {
    src('./src/js/*.js')
        .pipe(babel())
        .pipe(dest('./dist/js/'));
    cb();
}

function generateAssets(cb) {
    src('./src/assets/**/*')
        .pipe(dest('./dist/assets'));
    cb();
}

function watchFiles(cb) {
    watch('src/**/*.html', generateHTML);
    watch('src/sass/*.scss', generateCSS);
    watch('src/js/*.js', generateJS);
    watch('src/assets/**/*', generateAssets);
}

function browserSync(cb) {
    sync.init({
        injectChanges: true,
        server: {
            baseDir: './dist'
        }
    });

    watch('src/**/*.html', generateHTML);
    watch('src/sass/**.scss', generateCSS);
    watch('src/js/**.js', generateJS);
    watch('src/assets/**/*', generateAssets);
    watch('./dist/**.html').on('change', sync.reload);
}

exports.html = generateHTML;
exports.css = generateCSS;
exports.js = generateJS;
exports.assets = generateAssets;
exports.watch = watchFiles;
exports.sync = browserSync;

exports.default = series(parallel(generateCSS, generateHTML, generateJS, generateAssets));
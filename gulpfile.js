const gulp = require("gulp");
const sass = require("gulp-sass");
const uglify = require("gulp-uglify");
const autoprefixer = require("gulp-autoprefixer");
const rename = require("gulp-rename");

const styleSRC = "src/sass/**/*.scss";
const styleDIST = "dist/css/";

const jsSRC = "src/js/**/*.js";
const jsDIST = "dist/js/";

const styleWatch = "src/sass/**/*.scss";
const jsWatch = "src/js/**/*.js";

// sass compile and minify
function css(done) {
  gulp
    .src(styleSRC)
    .pipe(
      sass({
        errLogToConsole: true,
        outputStyle: "compressed"
      })
    )
    .on("error", console.error.bind("console"))
    .pipe(autoprefixer({ browsers: ["last 2 versions", "> 5%", "iOS 8"] }))
    .pipe(rename({ suffix: ".min" }))
    .pipe(gulp.dest(styleDIST));
  done();
}

// Minify js
function js(done) {
  gulp
    .src(jsSRC)
    .pipe(uglify())
    .pipe(rename({ suffix: ".min" }))
    .pipe(gulp.dest(jsDIST));
  done();
}

// Watch
function watchFiles(done) {
  gulp.watch(styleWatch, css);
  gulp.watch(jsWatch, js);
}

gulp.task("css", css);
gulp.task("js", js);

gulp.task("default", gulp.parallel(css, js));

gulp.task("watch", gulp.series(watchFiles));

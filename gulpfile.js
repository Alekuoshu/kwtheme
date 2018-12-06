var projectURL = 'http://localhost/drcalderon';
var gulpftp = require('./ftpconfig.js');

var gulp = require("gulp"),
	watch = require("gulp-watch"),
	plumber = require("gulp-plumber"),
	gulpsass = require("gulp-sass"),
	autoprefixer = require("gulp-autoprefixer"),
	cleanCss = require("gulp-clean-css"),
	sourcemaps = require("gulp-sourcemaps"),
	concat = require("gulp-concat"),
	jshint = require("gulp-jshint"),
	// uglify = require("gulp-uglify"),
	imagemin = require("gulp-imagemin"),
	browserSync = require('browser-sync').create(),
	livereload = require("gulp-livereload"),
	gutil = require('gulp-util'),
	ftp = require('vinyl-ftp'),
	notify = require("gulp-notify");


var onError = function (err) {
	console.log("Se ha producido un error: ", err.message);
	this.emit("end");
};

gulp.task("lint", function () {
	return gulp.src("./js/scripts/**/*.js")
		.pipe(jshint())
});

gulp.task("javascript", gulp.series(["lint"], function () {
	return gulp.src("./js/scripts/**/*.js")
		.pipe(plumber({
			errorHandler: onError
		}))
		.pipe(concat("master.js"))
		// .pipe(uglify())
		.pipe(gulp.dest("./js"))
		.pipe(livereload())
		.pipe(browserSync.reload({
			stream: true
		}))
		.pipe(notify({
			message: "JavaScript done!"
		}));
}));

gulp.task("imagemin", function () {
	return gulp.src("./images/raw/**/*.*")
		.pipe(plumber({
			errorHandler: onError
		}))
		.pipe(imagemin({
			progessive: true,
			interlaced: true
		}))
		.pipe(gulp.dest("./images/bin"))
		.pipe(livereload())
		.pipe(browserSync.reload({
			stream: true
		}))
		.pipe(notify({
			message: "Imagemin done!"
		}));
});

gulp.task("concactsass", function () {
	return gulp.src("./sass/styles/**/*.scss")
		.pipe(plumber({
			errorHandler: onError
		}))
		.pipe(concat("style.scss"))
		.pipe(gulp.dest("./sass"));
	// .pipe(livereload())
	// .pipe(browserSync.reload({stream: true}))
	// .pipe(notify({message: "Concat sass done!"}));
});

gulp.task("sass", function () {
	return gulp.src("./sass/style.scss")
		.pipe(plumber({
			errorHandler: onError
		}))
		.pipe(sourcemaps.init())
		.pipe(gulpsass())
		.pipe(autoprefixer("last 2 versions"))
		.pipe(gulp.dest("."))
		.pipe(cleanCss({
			keepSpecialComments: 1
		}))
		.pipe(sourcemaps.write("."))
		.pipe(gulp.dest("."))
		.pipe(browserSync.reload({
			stream: true
		}))
		.pipe(livereload())
		.pipe(notify({
			title: 'Gulp Task Complete',
			message: 'Styles have been compiled',
			onLast: true
		}));
});

gulp.task('deploy-dev', function () {
	var conn = ftp.create({
		host: gulpftp.config.host,
		user: gulpftp.config.user,
		password: gulpftp.config.pass,
		port: 21,
		parallel: 5,
		log: gutil.log
	});

	/* list all files you wish to ftp in the glob variable */
	var globs = [
		'./js/master.js',
		'./style.css',
		'./images/bin/**',
		'!node_modules/**',
		'!ftpconfig.js' // if you wish to exclude directories, start the item with an !
	];

	return gulp.src(globs, {
			base: '.',
			buffer: false
		})
		.pipe(conn.newer('./kwdevelopments/drcalderon/wp-content/themes/kwtheme')) // only upload newer files
		.pipe(conn.dest('./kwdevelopments/drcalderon/wp-content/themes/kwtheme'))
		.pipe(notify("Production site updated!"));

});

gulp.task('watch', function () {
	livereload.listen();
	gulp.watch("./sass/styles/**/*.scss", gulp.parallel(["concactsass"]));
	gulp.watch("./sass/**/*.scss", gulp.parallel(["sass"]));
	gulp.watch("./js/scripts/**/*.js", gulp.parallel(["javascript"]));
	gulp.watch("./images/raw/**/*.*", gulp.parallel(["imagemin"]));
	// gulp.watch(['js/master.js', 'style.css', 'images/bin/**'], ['deploy-dev']);
});

gulp.task("default", gulp.parallel(["concactsass", "sass", "javascript", "imagemin", "deploy-dev", "watch"], function () {
	browserSync.init({
		proxy: projectURL,
		open: true
	});
}));
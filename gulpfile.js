let gulp 		 = require('gulp'),
	sass 		 = require('gulp-sass'),
	browserSync  = require('browser-sync').create(),
	concat 		 = require('gulp-concat'),
	uglify 		 = require('gulp-uglifyjs'),
	cssnano 	 = require('gulp-cssnano'),
	rename 		 = require('gulp-rename'),
	del 		 = require('del'),
	imagemin 	 = require('gulp-imagemin'),
	pngquant 	 = require('imagemin-pngquant-gfw'),
	cache 		 = require('gulp-cache'),
	autoprefixer = require('gulp-autoprefixer')
	
//CLEAN + SYNC
gulp.task('clean', function() {
	return del.sync('build')
})

//CLEAR CACHE
gulp.task('clear', function() {
	return cache.clearAll()
})

//MINIFING IMG
gulp.task('img', function() {
	return gulp.src('app/img/**/*')
	.pipe(cache(imagemin({
		interlaced: true,
		progressive: true,
		optimizationLevel: 5,
		svgoPlugins: [{removeViewBox: false}],
		use: [pngquant()]
	})))
	.pipe(gulp.dest('build/img'))
})

//RUn SERVER WITTH WATCHERS
gulp.task('serve', ['css-libs', 'scripts'], function() {
	// browserSync.init({
		// server: "./app"
	// })	
	gulp.watch("app/sass/*.sass", ['css-libs'])
	gulp.watch("app/js/*.js") /*.on('change', browserSync.reload)*/
   	gulp.watch("app/*.html") /*.on('change', browserSync.reload)*/
   	gulp.watch("app/*.php") /*.on('change', browserSync.reload)*/
   	gulp.watch("app/css/*.css").on('change', browserSync.reload)
})
//watcher
gulp.task('watch', function() {
	gulp.watch("app/sass/*.sass", ['css-libs'])
	gulp.watch("app/js/*.js").on('change', browserSync.reload)
   	gulp.watch("app/*.html").on('change', browserSync.reload)
   	gulp.watch("app/*.php").on('change', browserSync.reload)
   	gulp.watch("app/css/*.css").on('change', browserSync.reload)
})

//SASS
gulp.task('sass', function() {
	return gulp.src('app/sass/*.sass')
		.pipe(sass())
		.pipe(autoprefixer({
			browsers: ['last 10 versions', '> 5%', 'ie 8', 'ie 7'],
			cascade: true,

		}))
		.pipe(gulp.dest('app/css'))
		.pipe(browserSync.stream())
})
//SCRIPTS
gulp.task('scripts', function() {
	return gulp.src([
		'app/libs/jquery/dist/jquery.min.js',
		'app/libs/magnific-popup/dist/jquery.magnific-popup.min.js'
	])
	.pipe(concat('libs.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest('app/js'))
})
//CSS-LIBS
gulp.task('css-libs', ['sass'], function() {
	return gulp.src([
		'app/css/*.css',
		'!app/css/*.min.css'
	])
	.pipe(cssnano())
	.pipe(rename({suffix: '.min'}))
	.pipe(gulp.dest('app/css'))
})
//BUILD
gulp.task('build', ['clean', 'img', 'sass', 'scripts'], function() {
	let buildCss = gulp.src([
		'app/css/*.css',
		'app/css/*.min.css'
	])
	.pipe(gulp.dest('build/css'))

	let buildFonts = gulp.src('app/fonts/**/*')
		.pipe(gulp.dest('build/fonts'))

	let buildJs = gulp.src('app/js/**/*')
		.pipe(gulp.dest('build/js'))

	let buildHtml = gulp.src([
		'app/*.html', 
		'app/*.php'
	])
	.pipe(gulp.dest('build'))

})
gulp.task('default', ['serve'])
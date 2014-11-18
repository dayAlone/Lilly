gulp         = require 'gulp'

autoprefixer = require 'gulp-autoprefixer'
csscomb      = require 'gulp-csscomb'
coffee       = require 'gulp-coffee'
concat       = require 'gulp-concat'
cssmin       = require 'gulp-cssmin'
sass         = require 'gulp-ruby-sass'
data         = require 'gulp-data'
gutil        = require 'gulp-util'
livereload   = require 'gulp-livereload'
less         = require 'gulp-less'
nib          = require 'nib'
notify       = require 'gulp-notify'
uglify       = require 'gulp-uglify'
plumber      = require 'gulp-plumber'
svgmin       = require 'gulp-svgmin'
stylus       = require 'gulp-stylus'
sequence     = require 'run-sequence'
replace      = require 'gulp-replace'
watch        = require 'gulp-watch'
imageop      = require 'gulp-image-optimization'
svgSymbols   = require 'gulp-svg-symbols'


plugins  = [ 'jquery', 'bootstrap', 'bem', 'hoverIntent', 'spin', 'velocity', 'table' ]

layout   = './layout/'
sources  = './sources/'

path     =
	css:
		frontend : "#{layout}/css/"
		sources  : "#{sources}/css/"
	js:
		frontend : "#{layout}/js/"
		sources  : "#{sources}/js/"

isArray = Array.isArray || ( value ) -> return {}.toString.call( value ) is '[object Array]'

loadPlugins = (x, y)->
	data =
		css   : []
		js    : []
		files : []
		
	bower   = './bower_components'
	plugins = require('./plugins.json')
	for i in x
		elm = plugins[i]
		for key of elm
			if isArray elm[key]
				for z in elm[key]
					data[key].push bower+z
			else
				data[key].push bower+elm[key]

	return data[y]

# JavaScript functions

gulp.task 'js', ->
	gulp.src [ "#{layout}/js/main.coffee" ]
	.pipe coffee()
	.pipe uglify()
	.pipe gulp.dest path.js.frontend

# CSS functions

gulp.task 'css_old', ->
	gulp.src [ "#{layout}/css/style.sass" ]
	.pipe sass({
		compass:true,
		sourcemap: false
	})
	.pipe csscomb()
	.pipe autoprefixer
		browsers: ['last 2 versions'],
		cascade: false
	.pipe cssmin()
	.pipe gulp.dest path.css.frontend

gulp.task 'css', ->
	gulp.src [ "#{layout}/css/style.styl" ]
	.pipe plumber
		errorHandler: notify.onError("Error: <%= error.message %>")
	.pipe stylus 
		use: nib()
	.pipe autoprefixer
		browsers: ['last 4 versions'],
		cascade: false
	.pipe gulp.dest path.css.frontend

gulp.task 'css_min', ->
	gulp.src [ "#{layout}/css/style.css" ]
	.pipe csscomb()
	.pipe cssmin()
	.pipe gulp.dest path.css.frontend

gulp.task 'copy', ->
	gulp.src loadPlugins plugins, 'files'
	.pipe gulp.dest "#{layout}/images/plugins/"

# SVG functions

gulp.task 'svg_mini', ->
	gulp.src [ "./public_html/public/images/svg/**/*.svg" ]
	.pipe svgmin([{ moveGroupAttrsToElems: false },
			{ removeUselessStrokeAndFill: false },
			{ removeComments: true }, 
			{ moveGroupAttrsToElems: false },
			{ convertPathData: { straightCurves: false}}
		])
	.pipe(replace(/<desc>(.*)<\/desc>/ig, ''))
	.pipe(replace(/<title>(.*)<\/title>/ig, ''))
	.pipe(svgSymbols())
	.pipe gulp.dest "./public_html/public/images/svg/"

gulp.task 'img_mini', ->
	gulp.src [ "#{sources}/images/**/*.jpg", "#{sources}/images/**/*.png" ]
	.pipe imageop
        optimizationLevel: 1
        progressive: true
        interlaced: true
    .pipe gulp.dest "#{layout}/images/"


# System functions

gulp.task 'reload', ->
	livereload.changed()

gulp.task 'ready', ->
	sequence 'js_plugins', 'js_front', 'js_mini', 'css_bootstrap', 'css_plugins', 'css_front', 'css_mini'

gulp.task 'default', ->
	
	livereload.listen();

	gulp.watch "#{layout}/js/main.coffee", ->
		sequence 'js', 'reload'
	
	gulp.watch "#{layout}/css/**/*.styl", ->
		sequence 'css', 'reload'

	gulp.watch "#{sources}/images/svg/**/*.svg", ->
		sequence 'svg_mini'

	gulp.watch [ "#{sources}/images/**/*.jpg", "#{sources}/images/**/*.png" ], ->
		sequence 'img_mini'

	gulp.watch ["./**/*.php",'!./bitrix/**'], {'dot':true}, ->
		sequence 'reload'
	
	gulp.watch ["#{path.css.sources}/bootstrap/bootstrap.less", "./sources/build/plugins.json"], ->
		sequence 'css_bootstrap', 'css_plugins', 'copy', 'css_front', 'reload'
	
	gulp.watch ["./sources/build/gulpfile.coffee"], ->
		sequence 'js_plugins', 'js_front', 'reload', 'css_bootstrap', 'css_plugins', 'copy', 'css_front', 'reload'

	gulp.watch ["./bower_components/**/*.js"], ->
		sequence 'js_plugins', 'js_front', 'reload'














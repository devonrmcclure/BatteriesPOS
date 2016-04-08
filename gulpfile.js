var elixir = require('laravel-elixir');

require('laravel-elixir-vueify');

elixir(function(mix) {
	mix.less('main.less')
	   .browserify('app.js')
	   .version([
	   		'./public/css/main.css',
			'./public/js/app.js'
	   ])
	   .browserSync({proxy: 'batteriespos.dev'});
});
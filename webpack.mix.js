// const mix = require('laravel-mix');
let mix = require('laravel-mix');
const path = require('path')

mix.webpackConfig({
//	plugins: [
//	],
//	resolve: {
//	},
	stats: {
		children: true
	}
});

mix.js('resources/js/app.js', 'public/js/app.js')
//		.sass('resources/scss/app.scss', 'public/css/app.css')
		.postCss('resources/css/app.css', 'public/css/app.css', [
			require('postcss-custom-properties'),
			require('tailwindcss'),
		])
	//	.scripts([
	//		'node_modules/chartjs/chart.js',
	//		'node_modules/fullcalendar/index.global.js'
	//	], 'public/js/app.js')
	//	.styles([
	//		'node_modules/chartjs/chart.css',
	//		'node_modules/fullcalendar/index.global.css'
	//	], 'public/js/app.css')
	//	.combine([
	//	'public/css/app.css',
	//	'./node_modules/select2-theme-bootstrap5/dist/select2-bootstrap.css',
	//	], 'public/css/app.css')
	// .setPublicPath('public/)
	.sourceMaps();

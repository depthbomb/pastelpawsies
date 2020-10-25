/* eslint-disable */
const fs = require('fs-extra');
const path = require('path');
const log = require('fancy-log');
const webpack = require('webpack');
const webpackStream = require('webpack-stream');
const gulp = require('gulp');
const csso = require('gulp-csso');
const imagemin = require('gulp-imagemin');
const header = require('gulp-header');
const sass = require('gulp-sass');
const autoprefix = require('gulp-autoprefixer');
const glob = require('glob');
const argv = require('minimist')(process.argv.slice(2));
const noop = require('gulp-noop');
const TerserPlugin = require('terser-webpack-plugin');

const PRODUCTION = argv.env === 'prod';
const settings = {
	optimizationLevel: PRODUCTION ? 7 : 0,
	imageQuality: PRODUCTION ? 100 : 0
};

const resourcesDir = path.join(__dirname, 'resources', 'assets');
const buildDir = path.join(__dirname, 'public', 'assets');

const license = [
	"/*!",
	"* By Caprine Logic for pastelpawsies",
	"*",
	"* This work is licensed under the Creative Commons Attribution-NonCommercial 4.0 International License. ",
	"* To view a copy of this license, visit http://creativecommons.org/licenses/by-nc/4.0/.",
	`* Copyright (c) 2014 - ${(new Date()).getFullYear()} Caprine Logic`,
	"*/",
	""
].join("\n");

gulp.task('license', done => {
	gulp.src([
		buildDir + '/js/*.js',
		buildDir + '/css/*.css',
		buildDir + '/img/ui/*.svg',
	], { base: buildDir, allowEmpty: true })
	.pipe(header(license))
	.pipe(gulp.dest(buildDir));

	done();
});


gulp.task('js', done => {
	gulp.src([
		resourcesDir + '/js/app.js'
	], { allowEmpty: true })
	.pipe(webpackStream({
		mode: PRODUCTION ? 'production' : 'development',
		entry: path.join(resourcesDir, 'js', 'app.js'),
		output: {
			path: buildDir,
			filename: '[name].js'
		},
		optimization: PRODUCTION ? {
			removeAvailableModules: true,
			sideEffects: false,
			runtimeChunk: 'single',
			minimize: true,
			minimizer: [
				new TerserPlugin({
					terserOptions: {
						output: {
							comments: false,
						}
					},
					extractComments: false
				})
			],
			splitChunks: {
				chunks: 'all',
				cacheGroups: {
					nodeModules: {
						test: /[\\/](node_modules)[\\/]/,
						name: 'node_modules',
					},
					vendor: {
						test: /[\\/](vendor)[\\/]/,
						name: 'vendor',
					},
				},
			}
		} : {},
		module: {
			rules: [
				{
					test: /\.js?/,
					include: resourcesDir,
					exclude: /node_modules/,
					loader: ['babel-loader']
				}
			]
		},
		plugins: []
	}, webpack))
	.pipe(gulp.dest(buildDir + '/js'));

	done();
});


gulp.task('sass', done => {
	gulp.src([
		resourcesDir + '/scss/app.scss',
	], { allowEmpty: true })
	.pipe(sass().on('error', sass.logError))
	.pipe(autoprefix())
	.pipe(csso())
	.pipe(gulp.dest(buildDir + '/css'));

	done();
});


gulp.task('images', done => {
	gulp.src([
		resourcesDir + '/img/**/*.{jpg,jpeg,png}'
	], { allowEmpty: true })
	.pipe(PRODUCTION ? imagemin([
		imagemin.mozjpeg({ quality: settings.imageQuality, progressive: true }),
		imagemin.optipng({ optimizationLevel: settings.optimizationLevel }),
	], { verbose: true }) : noop())
	.pipe(gulp.dest(buildDir + '/img'));

	done();
});


gulp.task('font', done => {
	gulp.src([
		resourcesDir + '/font/**/*.{ttf,woff,woff2,eot,svg,otf}'
	], { allowEmpty: true })
	.pipe(gulp.dest(buildDir + '/font'));

	done();
});


gulp.task('media', done => {
	gulp.src([
		resourcesDir + '/media/**/*.{mp3,wav,flac,webm,mp4,avi}'
	], { allowEmpty: true })
	.pipe(gulp.dest(buildDir + '/media'));

	done();
});


gulp.task('cleanupThumbsDB', done => {
	glob(`${resourcesDir}/**/*.db`, (e, f) => {
		f.forEach(file => {
			fs.unlink(path.join('./', file), (err) => {
				if (err && err.code != 'ENOENT') throw new Error(err);
				return log(`Deleted DB file:`, file);
			});
		});
	});

	glob(`./src/assets/**/*.db`, (e, f) => {
		f.forEach(file => {
			fs.unlink(path.join('./', file), (err) => {
				if (err && err.code != 'ENOENT') throw new Error(err);
				return log(`Deleted DB file:`, file);
			});
		});
	});

	done();
});


gulp.task('cleanup', gulp.series('cleanupThumbsDB', done => {
	glob(`${buildDir}/**/*.{jpg,jpeg,gif,png,svg,webp,mp3,db,css,js,json,mp4,webm,wav,ogg,otf,ttf,eot,woff,woff2,map}`, (e, f) => {
		f.forEach(file => {
			fs.unlink(path.resolve('./', file), (err) => {
				if (err && err.code != 'ENOENT') throw new Error(err);
				return log(`Cleared built file:`, file);
			});
		});
	});

	done();
}));


gulp.task('post_build', done => done());


gulp.task('default', gulp.series('sass', 'js', 'media', 'images', 'font'));
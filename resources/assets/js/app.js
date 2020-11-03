const Viewer = require('./vendor/viewer');
const Cookies = require('js-cookie');
const { Dropdown } = require('./vendor/bootstrap');
window.$PP = new function() {
	const self = this;
	this.Bridge = window.BRIDGE;
	this.Body = document.body;
	this.DebugLog = function(...args) {
		if (!self.Bridge.production) {
			console.log('[DEBUG]', ...args);
		}
	};
	this.Init = function() {
		if (!self.Bridge) {
			throw new Error('Bridge is invalid');
		}
		self.InitDropdowns();
		self.InitNavbar();
		self.InitGallery();
		self.CheckThemeCookie();
		self.InitThemeToggler();
	};
	this.InitDropdowns = function() {
		[].slice.call(document.querySelectorAll('[data-toggle="dropdown"]')).map(function(el) {
			return new Dropdown(el);
		});
	};
	this.InitNavbar = function() {
		const navbar = self.Body.querySelector('nav.navbar#navigation');
		if (navbar) {
			window.addEventListener('scroll', function(e) {
				if (document.body.scrollTop > 56 || document.documentElement.scrollTop > 56) {
					navbar.classList.remove('at-top');
				} else {
					navbar.classList.add('at-top');
				}
			});
		}
	};
	this.InitGallery = function() {
		const element = document.getElementById('gallery');
		if (element) {
			const viewer = new Viewer(element, { url: 'data-full' });
		}
	};
	this.CheckThemeCookie = function() {
		if (typeof Cookies.get('dark_theme') === 'undefined') {
			self.DebugLog('dark_theme cookie is missing, checking OS preference');
			const prefersDarkTheme = window.matchMedia('(prefers-color-scheme: dark)').matches;
			self.DebugLog('prefersDarkTheme=', prefersDarkTheme);
			Cookies.set('dark_theme', prefersDarkTheme ? 'yes' : 'no', { expires: 365 });
			self.RedrawPage();
		}
	};
	this.InitThemeToggler = function() {
		const toggler = document.querySelector('input#theme-toggler');
		if (toggler) {
			toggler.addEventListener('change', function(e) {
				Cookies.set('dark_theme', toggler.checked ? 'yes' : 'no', { expires: 365 });
				self.RedrawPage();
			});
		}
	};
	this.RedrawPage = function() {
		const url = window.location.href;
		fetch(url, {
			method: 'GET'
		})
		.then(response => response.text())
		.then(data => {
			document.open();
			document.write(data);
			document.close();
		})
		.catch(error => window.location.reload());
	};
};
const $PP = window.$PP;

document.addEventListener('DOMContentLoaded', function() {
	$PP.Init();
});
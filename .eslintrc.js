module.exports = {
	extends: 'eslint:recommended',
	parserOptions: {
		ecmaVersion: 8,
		sourceType: 'module'
	},
	env: {
		browser: true,
		commonjs: true,
		node: true,
	},
	rules: {
		indent: ['warn', 'tab', { SwitchCase: 1 }],
		quotes: ['warn', 'single'],
		semi: ['warn', 'always'],
		eqeqeq: 'warn',
		curly: ['warn', 'all'],
		'no-prototype-builtins': 'off',
		'no-eval': 'error',
		'no-throw-literal': 'warn',
		'no-undefined': 'warn',
		'no-undef': 'warn',
		'prefer-const': 'error',
		'no-var': 'error',
		'array-bracket-spacing': ['warn', 'never'],
		'no-empty': 'off',
		'no-mixed-spaces-and-tabs': 'off',
		'no-unused-vars': 'off'
	}, 
};
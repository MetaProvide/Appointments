const {merge} = require('webpack-merge')
const common = require('./webpack.common.js')
const TerserPlugin = require('terser-webpack-plugin')

module.exports = merge(common, {
	mode: 'production',
	// devtool: '#source-map',
	optimization: {
		minimizer: [new TerserPlugin({
			terserOptions: {
				output: {
					comments: false,
				}
			},
			// sourceMap: false,
		})],
		// splitChunks: {
		// 	chunks: 'all',
		// },
		// splitChunks: {
		// 	cacheGroups: {
		// 		vendor: {
		// 			test: /[\\/]node_modules[\\/]/,
		// 			name: 'vendors',
		// 			chunks: 'all',
		// 		},
		// 	},
		// },
	}
})

const path = require('path');
const webpack = require('webpack');
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;
const PrerenderSPAPlugin = require('prerender-spa-plugin');

var vueLoader = {};

if (process.env.NODE_ENV === 'production') {
  vueLoader = {
    'scss': ExtractTextPlugin.extract({
      use: ['css-loader', 'sass-loader'],
      fallback: 'vue-style-loader',
    }),
    'sass': ExtractTextPlugin.extract({
      use: ['css-loader', 'sass-loader?indentedSyntax'],
      fallback: 'vue-style-loader',
    }),
  };
} else {
  vueLoader = {
    'scss': [
      'vue-style-loader',
      'css-loader',
      'sass-loader'
    ],
    'sass': [
      'vue-style-loader',
      'css-loader',
      'sass-loader?indentedSyntax'
    ]
  };
}

module.exports = {
  entry: './resources/assets/js/main.js',
  output: {
    path: path.resolve(__dirname, './public/js'),
    publicPath: '/js/',
    filename: 'build.js'
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        use: [
          'vue-style-loader',
          'css-loader'
        ],
      },
      {
        test: /\.scss$/,
        use: [
          'vue-style-loader',
          'css-loader',
          'sass-loader'
        ],
      },
      {
        test: /\.sass$/,
        use: [
          'vue-style-loader',
          'css-loader',
          'sass-loader?indentedSyntax'
        ],
      },
      {
        test: /\.vue$/,
        loader: 'vue-loader',
        options: {
          loaders: vueLoader,
          // other vue-loader options go here
        }
      },
      {
        test: /\.js$/,
        loader: 'babel-loader',
        exclude: /node_modules/,
      },
      {
        test: /\.(png|jpg|gif|svg)$/,
        loader: 'file-loader',
        options: {
          name: '[name].[ext]?[hash]',
          outputPath: '../images/',
        }
      }
    ]
  },
  resolve: {
    alias: {
      'vue$': 'vue/dist/vue.esm.js'
    },
    extensions: ['*', '.js', '.vue', '.json']
  },
  devServer: {
    historyApiFallback: true,
    noInfo: true,
    overlay: true,
    proxy: {
      '/**': {
        target: 'http://localhost',
        secure: false,
        changeOrigin: true,
      },
    },
  },
  performance: {
    hints: false
  },
  devtool: '#eval-source-map'
}

if (process.env.NODE_ENV === 'production') {
  module.exports.devtool = '#source-map'
  // http://vue-loader.vuejs.org/en/workflow/production.html
  module.exports.plugins = (module.exports.plugins || []).concat([
    new webpack.DefinePlugin({
      'process.env': {
        NODE_ENV: '"production"'
      }
    }),
    new webpack.optimize.UglifyJsPlugin({
      sourceMap: true,
      compress: {
        warnings: false
      }
    }),
    new webpack.LoaderOptionsPlugin({
      minimize: true
    }),
    new ExtractTextPlugin("../css/style.css"),
   /* new PrerenderSPAPlugin(
      path.join(__dirname, './public'),
      [
        '/uk/about_us',
        '/en/about_us',
        '/uk/constructor',
        '/en/constructor',
      ],
    ),*/
  ])
} else {
/*  module.exports.plugins = (module.exports.plugins || []).concat([
    new BundleAnalyzerPlugin(),
  ]);*/
}

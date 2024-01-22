const path = require('path');
const glob = require('glob');
const defaultConfig = require( '@wordpress/scripts/config/webpack.config.js' );

module.exports = {
    ...defaultConfig,
    ...{
        entry: () => {
        const basePath = './src/scripts';
        const entryFiles = glob.sync(path.join(basePath, '*.js'));
        console.log(entryFiles);
        const entry = {};

        entryFiles.forEach((file) => {
        console.log(file)
        const fileName = path.basename(file, '.js');
        entry[fileName] = file;
        });

        return entry;
    },
    output: {
        filename: 'build/scripts/[name].js',
        path: path.resolve(__dirname),
    },    
    }
};
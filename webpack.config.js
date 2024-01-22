const path = require('path');
const glob = require('glob');

module.exports = {
    ...defaultConfig,
    ...{
        entry: () => {
        const entryFiles = glob.sync('./src/scripts/*.js');
        const entry = {};

        entryFiles.forEach((file) => {
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
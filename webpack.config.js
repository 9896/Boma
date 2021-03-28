const path = require('path');

module.exports = {
    resolveLoader:{
        modules: [
            'node_modules'
        ],
    },
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
        },
        modules: [
            'node_modules'
        ]
    },
};

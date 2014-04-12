/*global module:false, require:false */
/**!
* Gruntfile
* Follow README.md to get started
*/
module.exports = function(grunt) {

    // Load all grunt tasks.
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

    // Project configuration.
    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),

        less: {
            build: {
                files: {
                    "css/feature-banners.css" : "css/less/feature-banners.less"
                },
                options: {
                    sourceMap: true,
                    sourceMapFilename: "css/feature-banners.css.map",
                    sourceMapBasepath: "css/"
                }
            },
            min: {
                options: {
                    yuicompress: true
                },
                files: {
                    "css/feature-banners.min.css" : "css/less/feature-banners.less"
                }
            }
        },

        watch: {
            less: {
                files: ['css/less/feature-banners.less', 'css/less/**/*.less'],
                tasks: ['less']
            }
        }
    });

    grunt.registerTask('build', [
        'less'
    ]);
    grunt.registerTask('default', [
        'build'
    ]);

};

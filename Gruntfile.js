module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        watch: {
            css: {
                files: 'resources/assets/less/*',
                tasks: ['less:development']
            },
            js: {
                files: 'resources/assets/js/*',
                tasks: ['browserify']
            }
        },
        less: {
            development: {
                files: {
                    "public/css/style.css": "resources/assets/less/main.less"
                }
            },
            production: {
                files: {
                    "public/css/style.css": "resources/assets/less/main.less"
                },
                compress: true,
            }
        },
        browserify: {
            options: {},
            'public/js/app.js': ['resources/assets/js/*']
        }
    });


    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-browserify');

    grunt.registerTask('default', ['watch']);
    grunt.registerTask('build-dev', ['less:development']);
    grunt.registerTask('build-prod', ['less:production']);

};
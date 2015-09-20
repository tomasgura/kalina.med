module.exports = function (grunt) {

	grunt.initConfig({
		concat: {
			options: {
				separator: ';'
			},
			dist: {
				files: {
					'build/build.js': ['js/*.js'],
					'build/build.css': ['css/*.css'],
				},
			},
		},
		uglify: {
			dist: {
				files: {
					'build/build.min.js': ['build/build.js']
				

				}
			}
		},
		cssmin: {
			target: {
				files: [{
						expand: true,
						cwd: 'build',
						src: ['build.css'],
						dest: 'build',
						ext: '.min.css'
					}]
			}
		},
		default: {
				
		},
		jsvalidate: {
			options: {
				globals: {},
				esprimaOptions: {},
				verbose: false
			},
			targetName: {
				files: {
					src: ['./app/**/*.js']
				}
			}
		},
		nodeunit: {
			files: ['test/**/*.js']
		},
		watch: {
			scripts: {
				files: ['./app/js/prehravac.js'],
				tasks: ['jshint'],
				options: {
					spawn: false,
				},
			},
		},
		jshint: {
			all: ['./app/js/prehravac.js']
		},
		phplint: {
			options: {
				limit: 10,
				phpCmd: 'c:/wamp/bin/php/php5.4.3/php.exe', // Defaults to php 
				phpArgs: {
					"-l": null
				},
				stdout: true,
				stderr: true,
				tmpDir: './lint/', // Defaults to os.tmpDir() 
				cacheDirName: './lint' // Defaults to php-lint 
			},
			files: './**/*.php'
		}
	});
	grunt.registerTask('default', ['concat', 'uglify', 'cssmin']);

	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks("grunt-phplint");
	grunt.loadNpmTasks('grunt-jsvalidate');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-cssmin');

};
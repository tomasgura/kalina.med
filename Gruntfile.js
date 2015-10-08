module.exports = function (grunt) {

	grunt.initConfig({
		clean: ["build"],
		concat: {
			options: {
				separator: ';'
			},
			dist: {
				files: {
					'build/build.js': ['js/jquery-1.11.3.js','js/bootstrap.min.js','js/Wallop.min.js'],
					'build/build.css': ['css/bootstrap.css', 'css/bootstrap-theme.min.css','css/main.css'],
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
	grunt.registerTask('default', ['clean','concat:dist', 'uglify', 'cssmin']);

	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks("grunt-phplint");
	grunt.loadNpmTasks('grunt-jsvalidate');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-clean');

};
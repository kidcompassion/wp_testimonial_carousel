const { src, dest, watch } = require('gulp');
const sass = require('gulp-sass');

function compileSass(done) {
    src('sass/*')
    .pipe(sass().on('error', sass.logError))
    .pipe(dest('./'));
   done();
  }

  exports.compileSass = compileSass;

  function watchSass() {
    watch('sass/*', compileSass);
 }

 exports.watchSass = watchSass;
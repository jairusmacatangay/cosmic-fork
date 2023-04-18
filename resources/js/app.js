import './bootstrap';

// For compiling all custom js files
const modules = import.meta.glob('./**/*.js');
console.log(modules);

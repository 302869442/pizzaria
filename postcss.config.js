const purgecss = require("@fullhuman/postcss-purgecss")
const cssnano = require("cssnano")
const autoprefixer = require('autoprefixer');

module.exports = {
  plugins: [
    autoprefixer({}),
    cssnano({ preset: "default" }),
    // purgecss({
    //   content: ["./**/*.html"],
    // }),
  ],
}


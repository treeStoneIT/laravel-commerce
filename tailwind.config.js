module.exports = {
    purge: {
        content: [
            './resources/**/*.php',
            './resources/**/**/*.php',
            './resources/**/**/**/*.php',
            './resources/**/**/**/**/*.php',
            './resources/**/**/**/**/**/*.php',
        ],
        options: {
            defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
        },
    },
    plugins: [require('@tailwindcss/custom-forms'), require('@tailwindcss/ui')],
}

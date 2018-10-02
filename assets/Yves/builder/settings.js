const path = require('path');
const coreDetector = require('./libs/core-detector');
const isCoreNonSplitVersion = coreDetector.isNonSplitVersion();

// define the applicatin name
// important: the name must be normalized
const name = 'yves_default';

// define the current theme
const theme = 'default';

// define the current context (root)
const context = process.cwd();

// define project relative paths to context
const paths = {
    // locate the typescript configuration json file
    tsConfig: './tsconfig.json',

    // assets folder
    assets: './frontend/assets',

    // public folder
    public: `./public/Yves/assets/${theme}/shopui`,

    // core folders
    core: {
        // all modules
        modules: isCoreNonSplitVersion
            ? './vendor/spryker/spryker-shop/Bundles'
            : './vendor/spryker/spryker-shop',
        // ShopUi source folder
        shopUiModule: isCoreNonSplitVersion
            ? `./vendor/spryker/spryker-shop/Bundles/ShopUi/src/SprykerShop/Yves/ShopUi/Theme/${theme}`
            : `./vendor/spryker/spryker-shop/shop-ui/src/SprykerShop/Yves/ShopUi/Theme/${theme}`
    },

    eco: {
        // all modules
        modules: './vendor/spryker-eco'
    },

    // project folders
    project: {
        // all modules
        modules: './src/Pyz/Yves',
        // ShopUi source folder
        shopUiModule: `./src/Pyz/Yves/ShopUi/Theme/${theme}`
    }
};

// define relative urls to site host (/)
const urls = {
    // assets base url
    assets: `/assets/${theme}/shopui`
};

// export settings
module.exports = {
    name,
    theme,
    context,
    paths,
    urls,

    // define settings for suite-frontend-builder finder
    find: {
        // webpack entry points (components) finder settings
        componentEntryPoints: {
            // absolute dirs in which look for
            dirs: [
                path.join(context, paths.core.modules),
                path.join(context, paths.eco.modules),
                path.join(context, paths.project.modules)
            ],
            // files/dirs patterns
            patterns: [
                `**/Theme/${theme}/components/atoms/*/index.ts`,
                `**/Theme/${theme}/components/molecules/*/index.ts`,
                `**/Theme/${theme}/components/organisms/*/index.ts`,
                `**/Theme/${theme}/templates/*/index.ts`,
                `**/Theme/${theme}/views/*/index.ts`,
                '!config',
                '!data',
                '!deploy',
                '!node_modules',
                '!public',
                '!test'
            ]
        },

        // core component styles finder settings
        // important: this part is used in shared scss environment
        // do not change unless necessary
        componentStyles: {
            // absolute dirs in which look for
            dirs: [
                path.join(context, paths.core.modules)
            ],
            // files/dirs patterns
            patterns: [
                `**/Theme/${theme}/components/atoms/*/*.scss`,
                `**/Theme/${theme}/components/molecules/*/*.scss`,
                `**/Theme/${theme}/components/organisms/*/*.scss`,
                `**/Theme/${theme}/templates/*/*.scss`,
                `**/Theme/${theme}/views/*/*.scss`,
                `!**/Theme/${theme}/**/style.scss`,
                '!config',
                '!data',
                '!deploy',
                '!node_modules',
                '!public',
                '!test'
            ]
        }
    }
}

const path = require('path');
const glob = require('fast-glob');
const cwd = path.join(process.cwd(), './vendor/spryker/spryker');
const patterns = [
    'Bundles/ShopUiCompatibility/assets/Yves/builder/libs/core-detector.js',
    'shop-ui-compatibility/assets/Yves/builder/libs/core-detector.js'
];

function isNonSplitVersion() {
    process.stdout.write('Checking Spryker core... ');

    const results = glob.sync(patterns, {
        cwd,
        followSymlinkedDirectories: false,
        onlyFiles: true,
        onlyDirectories: false
    });

    const filePath = results.length > 0 ? results[0] : '';
    const isNonSplit = filePath.indexOf('Bundles/ShopUiCompatibility') >= 0;

    if (isNonSplit) {
        console.log('non-split version detected');
    } else {
        console.log('done');
    }

    return isNonSplit;
}

module.exports = {
    isNonSplitVersion
}

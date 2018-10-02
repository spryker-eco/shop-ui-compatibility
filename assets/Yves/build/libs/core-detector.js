const path = require('path');
const glob = require('fast-glob');
const cwd = path.join(process.cwd(), './vendor/spryker');
const patterns = [
    'spryker-shop/Bundles/ShopUi/**/ShopUiFactory.php',
    'spryker-shop/shop-ui/**/ShopUiFactory.php'
];

function isNonSplitVersion() {
    process.stdout.write('Checking Spryker core... ');

    const results = glob.sync(patterns, {
        cwd,
        followSymlinkedDirectories: false,
        onlyFiles: false,
        onlyDirectories: true
    });

    const filePath = results.length > 0 ? results[0] : '';
    const isNonSplit = filePath.indexOf('Bundles/ShopUi') >= 0;

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

if (phantom.args.length === 0) {
    console.log('Usage: sahi.js <Sahi Playback Start URL>');
    phantom.exit();
} else {
    var address = unescape(phantom.args[0]);
    console.log('Loading ' + address);
    var page = new WebPage();
    page.open(address, function(status) {
        if (status === 'success') {
            var title = page.evaluate(function() {
                return document.title;
            });
            console.log('Page title is ' + title);
        } else {
            console.log('FAIL to load the address');
        }
    });
}
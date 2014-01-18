require.config({
    "baseUrl" : "/js",
    "urlArgs" : "1",
    "paths"   : {
        "jquery"     : "../vendor/jquery.2.0.3/jquery",
        "underscore" : "../vendor/underscore.1.5.2/underscore",
        "backbone"   : "../vendor/backbone.1.1.0/backbone",
        "react"      : "../vendor/react.0.8.0/react"
    },
    "map" : {
        "*" : {
            "jquery" : "jquery.private"
        },
        "jquery.private" : {
            "jquery" : "jquery"
        }
    }
});

require(["app"], function(app) {
    app.initialize();
});
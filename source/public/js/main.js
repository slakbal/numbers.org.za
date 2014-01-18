require.config({
    "baseUrl" : "/js",
    "urlArgs" : (new Date()).getTime(),
    "paths"   : {
        "jquery"     : "../vendor/jquery.2.0.3/jquery",
        "underscore" : "../vendor/underscore.1.5.2/underscore",
        "backbone"   : "../vendor/backbone.1.1.0/backbone",
        "react"      : "../vendor/react.0.8.0/react"
    },
    "shim" : {
        "backbone" : {
            "deps" : [
                "jquery",
                "underscore"
            ],
            "exports" : "Backbone"
        },
        "jquery" : {
            "exports" : "$"
        },
        "underscore" : {
            "exports" : "_"
        }
    }
});

require([
    "backbone",
    "router"
], function(
    Backbone,
    Router
) {
    new Router();

    Backbone.history.start({
        "pushState" : true
    });
});
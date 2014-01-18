define([], function() {

    return {

        "getQueryStringParameters" : function() {
            var query = window.location.search.substring(1);
            return query.split("&");
        },

        "all" : function() {
            var pairs = [];
            var parameters = this.getQueryStringParameters();

            for (var i = 0; i < parameters.length; i++) {
                var parts = parameters[i].split("=");
                pairs[parts[0]] = parts[1];
            }

            return pairs;
        },

        "get" : function(key, def) {
            var pairs = this.all();

            for (var k in pairs) {
                if (pairs.hasOwnProperty(key)) {
                    if (k == key) {
                        return decodeURIComponent(pairs[key]);
                    }
                }
            }

            return (def || null);
        },

        "has" : function(key) {
            var pairs = this.all();

            for (var k in pairs) {
                if (pairs.hasOwnProperty(key)) {
                    if (k == key) {
                        return true;
                    }
                }
            }

            return false;
        }

    };

});
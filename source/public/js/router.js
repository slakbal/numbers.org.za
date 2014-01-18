/**
 * @jsx React.DOM
 */

define([
    "backbone",
    "component/index/index",
    "component/person/search",
    "collection/people",
    "react"
], function(
    Backbone,
    IndexIndex,
    PersonSearch,
    People,
    React
) {

    return Backbone.Router.extend({

        "routes" : {
            ""              : "index/index",
            "person/search" : "person/search"
        },

        "index/index" : function() {
            React.renderComponent(
                IndexIndex(null ),
                document.body
            );
        },

        "person/search" : function() {
            var collection = new People();

            React.renderComponent(
                PersonSearch( {collection:collection} ),
                document.body
            );

            collection.fetch({
                "data" : {
                    "page"  : this.get("page", 1),
                    "limit" : this.get("limit", 10)
                }
            });
        },

        "getQueryStringParemeters" : function() {
            var query = window.location.search.substring(1);
            return query.split("&");
        },

        "get" : function(key, def) {
            parts = this.getQueryStringParemeters();

            for (var i = 0; i < parts.length; i++) {

                var pair = parts[i].split("=");

                if (pair[0] == key) {
                    return unescape(pair[1]);
                }
            }

            return (def || null);
        },

        "has" : function(key) {
            parts = this.getQueryStringParemeters();

            for (var i = 0; i < parts.length; i++) {

                var pair = parts[i].split("=");

                if (pair[0] == key) {
                    return true;
                }
            }

            return false;
        }

    });

});
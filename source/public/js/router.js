/**
 * @jsx React.DOM
 */

define([
    "backbone",
    "component/index/index",
    "component/person/search",
    "collection/people",
    "input",
    "react"
], function(
    Backbone,
    IndexIndex,
    PersonSearch,
    People,
    Input,
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

        "person/search" : function(query) {
            var collection = new People();

            React.renderComponent(
                PersonSearch( {router:this, collection:collection} ),
                document.body
            );

            collection.fetch({
                "data" : {
                    "page"  : Input.get("page", 1),
                    "limit" : Input.get("limit", 10)
                }
            });
        }

    });
});
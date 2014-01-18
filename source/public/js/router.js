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

            collection.fetch();
        }

    });

});
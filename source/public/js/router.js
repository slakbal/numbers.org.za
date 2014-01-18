/**
 * @jsx React.DOM
 */

define([
    "backbone",
    "component/index/index",
    "component/person/search",
    "react"
], function(
    Backbone,
    IndexIndex,
    PersonSearch,
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
            React.renderComponent(
                PersonSearch(null ),
                document.body
            );
        }

    });

});
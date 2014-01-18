/**
 * @jsx React.DOM
 */

define([
    "react"
], function(
    React
) {

    return React.createClass({
        "render" : function() {
            return (
                React.DOM.div( {className:"person"}, 
                    this.props.person
                )
            );
        }
    });

});
/**
 * @jsx React.DOM
 */

define(["react"], function(React) {

    return React.createClass({
        "render" : function() {
            return React.DOM.div( {className:(this.props.className || "") + " row"}, this.props.children);
        }
    });

});
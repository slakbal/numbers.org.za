/**
 * @jsx React.DOM
 */

define(["react"], function(React) {

    return React.createClass({
        "render" : function() {
            return React.DOM.div( {className:(this.props.className || "") + " container"}, this.props.children);
        }
    });

});
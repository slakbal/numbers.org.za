/**
 * @jsx React.DOM
 */

define([
    "backbone",
    "input",
    "react"
], function(
    Backbone,
    Input,
    React
) {
    return React.createClass({
        "componentWillMount" : function() {
            this.callback = (function() {
                this.forceUpdate();
            }).bind(this);

            this.props.collection.on("add change remove", this.callback);
        },
        "componentWillUnmount" : function() {
            this.props.collection.off("add change remove", this.callback);
        },
        "handleFirst" : function() {
            this.props.router.navigate("person/search?page=1", {
                "trigger" : true
            });
        },
        "handlePrevious" : function() {
            this.props.router.navigate("person/search?page=" + (this.props.collection.meta.page - 1), {trigger: true});
        },
        "render" : function() {
            if (!this.props.collection.meta) {
                return React.DOM.div(null );
            }

            var meta = this.props.collection.meta;

            var first = "";

            if (meta.page > 1) {
                first = React.DOM.a( {onClick:this.handleFirst}, "first");
            }

            return (
                React.DOM.div( {className:"pagination"}, 
                    first
                )
            );
        }
    });
});
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
                <div className="person">
                    {this.props.model.first_name}
                </div>
            );
        }
    });

});
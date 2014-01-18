/**
 * @jsx React.DOM
 */

define([
    "backbone",
    "react",
    "component/person/search/list/person"
], function(
    Backbone,
    React,
    PersonSearchListPerson
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
        "render" : function() {
            var personNodes = _(this.props.collection.attributes).map(function(person) {
                return <PersonSearchListPerson key={person.id} model={person} />;
            });

            return (
                <div className="people">
                    {personNodes}
                </div>
            );
        }
    });
});
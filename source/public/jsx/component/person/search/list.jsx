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
            this.props.collection.on("add change remove", (function() {
                this.forceUpdate();
            }).bind(this));
        },
        "componentWillUnmount" : function() {
            this.props.collection.off("add change remove");
        },
        "render" : function() {
            console.log(this.props.collection.each);

            // var personNodes = this.state.people.map(function(person) {
            //     return <PersonSearchListPerson key={person.id} model={person} />;
            // });

            return (
                <div className="people">
                    
                </div>
            );
        }
    });

});
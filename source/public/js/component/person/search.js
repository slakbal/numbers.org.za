/**
 * @jsx React.DOM
 */

define([
    "react",
    "component/bootstrap/column",
    "component/bootstrap/container",
    "component/bootstrap/row",
    "component/person/search/list"
], function(
    React,
    Column,
    Container,
    Row,
    PersonSearchList
) {

    return React.createClass({
        "render" : function() {
            return (
                Container(null, 
                    Row(null, 
                        Column( {className:"md-12"}, 
                            React.DOM.h1(null, "Person Search")
                        )
                    ),
                    Row(null, 
                        Column( {className:"md-12"}, 
                            PersonSearchList( {collection:this.props.collection} )
                        )
                    )
                )
            );
        }
    });

});
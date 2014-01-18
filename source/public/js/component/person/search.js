/**
 * @jsx React.DOM
 */

define([
    "react",
    "component/bootstrap/column",
    "component/bootstrap/container",
    "component/bootstrap/row",
    "component/person/search/list",
    "component/person/search/pagination"
], function(
    React,
    BootstrapColumn,
    BootstrapContainer,
    BootstrapRow,
    PersonSearchList,
    PersonSearchPagination
) {
    return React.createClass({
        "render" : function() {
            return (
                BootstrapContainer(null, 
                    BootstrapRow(null, 
                        BootstrapColumn( {className:"md-12"}, 
                            React.DOM.h1(null, "Person Search")
                        )
                    ),
                    BootstrapRow(null, 
                        BootstrapColumn( {className:"md-12"}, 
                            PersonSearchList( {router:this.props.router, collection:this.props.collection} )
                        )
                    ),
                    BootstrapRow(null, 
                        BootstrapColumn( {className:"md-12"}, 
                            PersonSearchPagination( {router:this.props.router, collection:this.props.collection} )
                        )
                    )
                )
            );
        }
    });
});
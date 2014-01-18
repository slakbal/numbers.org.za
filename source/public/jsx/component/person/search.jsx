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
                <BootstrapContainer>
                    <BootstrapRow>
                        <BootstrapColumn className="md-12">
                            <h1>Person Search</h1>
                        </BootstrapColumn>
                    </BootstrapRow>
                    <BootstrapRow>
                        <BootstrapColumn className="md-12">
                            <PersonSearchList router={this.props.router} collection={this.props.collection} />
                        </BootstrapColumn>
                    </BootstrapRow>
                    <BootstrapRow>
                        <BootstrapColumn className="md-12">
                            <PersonSearchPagination router={this.props.router} collection={this.props.collection} />
                        </BootstrapColumn>
                    </BootstrapRow>
                </BootstrapContainer>
            );
        }
    });
});
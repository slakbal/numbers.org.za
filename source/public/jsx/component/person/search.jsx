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
                <Container>
                    <Row>
                        <Column className="md-12">
                            <h1>Person Search</h1>
                        </Column>
                    </Row>
                    <Row>
                        <Column className="md-12">
                            <PersonSearchList />
                        </Column>
                    </Row>
                </Container>
            );
        }
    });

});
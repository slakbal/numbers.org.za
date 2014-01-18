/**
 * @jsx React.DOM
 */

define([
    "react",
    "component/bootstrap/column",
    "component/bootstrap/container",
    "component/bootstrap/row"
], function(
    React,
    Column,
    Container,
    Row
) {

    return React.createClass({
        "render" : function() {
            return (
                <Container>
                    <Row>
                        <Column className="md-12">
                            index/index
                        </Column>
                    </Row>
                </Container>
            );
        }
    });

});
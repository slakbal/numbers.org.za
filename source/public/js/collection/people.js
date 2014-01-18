define([
    "backbone",
    "model/person"
], function(
    Backbone,
    Person
) {
    return Backbone.Model.extend({
        "model" : Person,
        "url"   : "/api/person/index",
        "parse" : function(response) {
            this.meta = response.meta;
            return response.data;
        }
    });
});
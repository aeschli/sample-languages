var _ = require("lodash");
var Backbone = require("backbone");
var ResultsModel = require('./../../../shared/components/results/models/ResultsModel');

var _PROP_FILTER_ = "filter";
var _PROP_RESULTS_ = "results";

var ResultsContainerModel = Backbone.Model.extend({

    refresh: function (searchText) {
        return this._refresh(searchText).done(_.bind(function (results) {
            this.set(_PROP_RESULTS_, results);
        }, this));
    },

    _refresh: function (searchText) {
        var results = new ResultsModel();
        return results.fetch(searchText);
    }
});

module.exports = ResultsContainerModel;

var Backbone= require("backbone");
var SearchModel= require("./../search/models/SearchModel");
var ResultsContainerModel= require("./ResultsContainerModel");

var _PROP_SEARCH_ = "SEARCH";
var _PROP_RESULTS_CONTAINER_   = "SERCH_RESULTS";

var PageModel= Backbone.Model.extend({

    defaults: function(searchText) {
        var defaults= {};
        defaults[_PROP_SEARCH_]= new SearchModel();
        defaults[_PROP_RESULTS_CONTAINER_]= new ResultsContainerModel();
        return defaults;
    },

}, {
    propSearch: _PROP_SEARCH_,
    propResultsContainer: _PROP_RESULTS_CONTAINER_
});

module.exports= PageModel;

var ResultsContainerModel= Backbone.Model.extend({

    refresh: function (searchText) {
        return this._refresh(searchText).done(_.bind(function (results) {
            this.set(_PROP_RESULTS_, results);
        }, this));
    },

    _refresh: function (searchText) {
        var results = new ResultsModel();
        return results.fetch(searchText);
    }
});
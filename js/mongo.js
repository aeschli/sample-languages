var mongoClient = require("mongodb").MongoClient;
mongoClient.connect("mongodb://aeschli-test1:w9V8XfTFRYyDNu18yr12CMjITLEeYtQFZbLtZn9Y0wAw2ZNmcI6Yby7RKUIzwIZX9u4z1Vqxv3zbtfKcqGkELg==@aeschli-test1.documents.azure.com:10250/?ssl=true", function (err, db) {
    db.collection('inventory').find({}).next().then(r => console.log(r));
    db.close();
});
var lib_api = require('node-telegram-bot-api');
var lib_colors = require('colors');
var lib_ws = require('./webservice');
var lib_log = require('./log');
var lib_sensitive = require('./sensitive');
var lib_message = require('./message');
var lib_chat = require('./chat');
var lib_strings = require('./strings');
var lib_keyboard = require('./keyboard');
var lib_database = require('./database');
var lib_pagination = require('./pagination');
var lib_button = require('./button');
var lib_objectid = new require('mongodb').ObjectId;

var tchBot = new lib_api(lib_sensitive.api_token, lib_sensitive.api_options);
tchBot.setWebHook(lib_sensitive.api_webHook_url, lib_sensitive.api_certificate);

tchBot.on('message', function (message)
{
    lib_chat.init(message.chat, function()
    {
        if(lib_message.is_text_only(message))
        {
            lib_message.is_valid(message, function(is_msg_valid)
            {
                if (is_msg_valid)
                {
                    lib_chat.update_status(message, function()
                    {
                        lib_database.find_chat({"chat.id":message.chat.id}, function(results)
                        {
                            //console.log("status", results[0].status);
                            //console.log(results[0]);
                            var chat = results[0];
                            //steps that can be backed to and update a chat value need to be if/elsed


                            //begin search conditions
                            if(chat.status == "main_menu")
                            {
                                lib_keyboard.main_menu(function(result)
                                {
                                    lib_chat.set_valid_responses(message.chat, result.valid_responses, result.response_values, function()
                                    {
                                        tchBot.sendMessage(message.chat.id, lib_strings.msg_sel_menu, {reply_markup: JSON.stringify(result.keyboard)});
                                    });
                                });
                            }
                            else if(chat.status == "search_begin")
                            {
                                lib_database.update_chat({"chat.id": message.chat.id}, {back_to_more: false}, function (dox)
                                {
                                    lib_database.find_chat({"chat.id":message.chat.id}, function(results)
                                    {
                                        //console.log(results[0]);
                                        var chat = results[0];
                                        lib_keyboard.select_begin(function(result)
                                        {
                                            lib_chat.set_valid_responses(message.chat, result.valid_responses, result.response_values, function()
                                            {
                                                tchBot.sendMessage(message.chat.id, lib_strings.msg_sel_beg, {reply_markup: JSON.stringify(result.keyboard)});
                                            });
                                        });
                                    });
                                });
                            }
                            else if(chat.status == "search_more")
                            {
                                lib_database.update_chat({"chat.id": message.chat.id}, {back_to_more: true}, function (dox)
                                {
                                    lib_database.find_chat({"chat.id":message.chat.id}, function(results)
                                    {
                                        //console.log(results[0]);
                                        var chat = results[0];
                                        lib_keyboard.select_more(function(result)
                                        {
                                            lib_chat.set_valid_responses(message.chat, result.valid_responses, result.response_values, function()
                                            {
                                                tchBot.sendMessage(message.chat.id, lib_strings.msg_sel_beg, {reply_markup: JSON.stringify(result.keyboard)});
                                            });
                                        });
                                    });
                                });
                            }
                            else if(chat.status == "search_destination")
                            {
                                if(lib_message.is_back(message))
                                {
                                    lib_keyboard.select_destination(chat.beginning, function(result)
                                    {
                                        lib_chat.set_valid_responses(message.chat, result.valid_responses, result.response_values, function()
                                        {
                                            tchBot.sendMessage(message.chat.id, lib_strings.msg_sel_destination, {reply_markup: JSON.stringify(result.keyboard)});
                                        });
                                    });
                                }
                                else
                                {
                                    lib_chat.get_value(message, function (value)
                                    {
                                        lib_database.update_chat({"chat.id":message.chat.id}, {beginning: value}, function (dox)
                                        {
                                            lib_database.find_chat({"chat.id":message.chat.id}, function(results)
                                            {
                                                //console.log(results[0]);
                                                var chat = results[0];
                                                lib_keyboard.select_destination(chat.beginning, function(result)
                                                {
                                                    lib_chat.set_valid_responses(message.chat, result.valid_responses, result.response_values, function()
                                                    {
                                                        tchBot.sendMessage(message.chat.id, lib_strings.msg_sel_destination, {reply_markup: JSON.stringify(result.keyboard)});
                                                    });
                                                });
                                            });
                                        });
                                    });
                                }
                            }
                            else if(chat.status == "search_date")
                            {
                                if(lib_message.is_back(message))
                                {
                                    lib_keyboard.select_date(chat.beginning, chat.destination, function (result)
                                    {
                                        lib_chat.set_valid_responses(message.chat, result.valid_responses, result.response_values, function ()
                                        {
                                            tchBot.sendMessage(message.chat.id, lib_strings.msg_sel_date, {reply_markup: JSON.stringify(result.keyboard)});
                                        });
                                    });
                                }
                                else
                                {
                                    lib_chat.get_value(message, function (value)
                                    {
                                        lib_database.update_chat({"chat.id":message.chat.id}, {destination: value}, function (results)
                                        {
                                            lib_database.find_chat({"chat.id":message.chat.id}, function(new_docs)
                                            {
                                                //console.log(results[0]);
                                                chat = new_docs[0];

                                                lib_keyboard.select_date(chat.beginning, chat.destination, function (result)
                                                {
                                                    lib_chat.set_valid_responses(message.chat, result.valid_responses, result.response_values, function ()
                                                    {
                                                        tchBot.sendMessage(message.chat.id, lib_strings.msg_sel_date, {reply_markup: JSON.stringify(result.keyboard)});
                                                    });
                                                });
                                            });
                                        });
                                    });
                                }
                            }
                            else if(chat.status == "search_sort")
                            {
                                lib_chat.get_value(message, function (value)
                                {
                                    lib_database.update_chat({"chat.id":message.chat.id}, {date: value}, function (dox)
                                    {
                                        lib_database.find_chat({"chat.id":message.chat.id}, function(results)
                                        {
                                            //console.log(results[0]);
                                            var chat = results[0];
                                            lib_keyboard.select_sort(function (result)
                                            {
                                                lib_chat.set_valid_responses(message.chat, result.valid_responses, result.response_values, function ()
                                                {
                                                    tchBot.sendMessage(message.chat.id, lib_strings.msg_sel_sort, {reply_markup: JSON.stringify(result.keyboard)});
                                                });
                                            });
                                        });
                                    });
                                });
                            }
                            else if(chat.status == "search_results")
                            {
                                lib_chat.get_value(message, function (value)
                                {
                                    lib_database.update_chat({"chat.id":message.chat.id}, {sort: value, valid_responses:[], response_values:[]}, function (dox)
                                    {
                                        lib_database.insert_pagination({},function (inserted_docs)
                                        {
                                            var pagination_id = inserted_docs.ops[0]._id;
                                            lib_pagination.ticket_grabber(chat.beginning, chat.destination, chat.date, value, 1, function(tickets)
                                            {
                                                var options = lib_pagination.inline_keyboard(pagination_id, 1, tickets.pages_count, true);
                                                tchBot.sendMessage(message.chat.id, tickets.text, options).then(function (sent_message)
                                                {
                                                    lib_database.update_pagination({"_id": lib_objectid(pagination_id)}, {chat: message.chat, message_id: sent_message.message_id, beginning: chat.beginning, destination:chat.destination, date: chat.date, sort:value, page:1, has_return: true}, function(docs)
                                                    {
                                                        //here, search is done! :)
                                                    });
                                                });
                                            });
                                        });
                                    });
                                });
                            }
                            //end of the search conditions


                            else if(chat.status == "add_support")
                            {
                                if(chat.hasOwnProperty("contact"))
                                {
                                    if(lib_message.contains(message, "contact"))
                                    {
                                        //just logged in
                                        tchBot.sendMessage(message.chat.id, "logined!").then(function()
                                        {
                                            lib_database.update_chat({"chat.id": message.from.id}, {status: "main_menu"}, function(dox)
                                            {
                                                lib_keyboard.main_menu(function(result)
                                                {
                                                    lib_chat.set_valid_responses(message.from, result.valid_responses, result.response_values, function()
                                                    {
                                                        tchBot.sendMessage(message.chat.id, lib_strings.msg_sel_menu, {reply_markup: JSON.stringify(result.keyboard)});
                                                    });
                                                });
                                            });
                                        });
                                    }
                                    else
                                    {
                                        //was loggeed in before
                                        lib_database.update_chat({"chat.id": message.from.id}, {status: "main_menu"}, function(dox)
                                        {
                                            lib_keyboard.main_menu(function(result)
                                            {
                                                lib_chat.set_valid_responses(message.from, result.valid_responses, result.response_values, function()
                                                {
                                                    tchBot.sendMessage(message.chat.id, lib_strings.msg_sel_menu, {reply_markup: JSON.stringify(result.keyboard)});
                                                });
                                            });
                                        });
                                    }
                                }
                                else
                                {
                                    var valid_types = chat.valid_types;
                                    if(valid_types.indexOf("contact") < 0)
                                    {
                                        valid_types.push("contact");
                                    }
                                    //updating chat and valid response_values at same time
                                    lib_database.update_chat({"chat.id": message.chat.id}, {valid_types: valid_types, valid_responses: lib_keyboard.login.valid_responses, response_values: lib_keyboard.login.response_values}, function(dox)
                                    {
                                        tchBot.sendMessage(message.chat.id, lib_strings.msg_sel_menu, {reply_markup: JSON.stringify(result.keyboard)});
                                    });
                                }
                            }
                        });
                    });


                    lib_log.message({message:message, is_valid:true, is_text_only:true});
                }
                else
                {
                    tchBot.sendMessage(message.chat.id, lib_strings.msg_not_valid);
                    lib_log.message({message:message, is_valid:false, is_text_only:true});
                }
            });
        }
        else
        {
            tchBot.sendMessage(message.chat.id, lib_strings.msg_not_text);
            lib_log.message({message:message, is_text_only:false});
        }
    });
});

tchBot.on('callback_query', function(message)
{
    // var user = message.from.id;
    // var data = message.data;
    var pagination_id = (message.data.split(","))[0];
    var data = (message.data.split(","))[1];

    if(data == lib_button.inline_return.data)
    {
        lib_database.update_chat({"chat.id": message.from.id}, {status: "main_menu"}, function(dox)
        {
            lib_keyboard.main_menu(function(result)
            {
                lib_chat.set_valid_responses(message.from, result.valid_responses, result.response_values, function()
                {
                    lib_database.update_pagination({"_id": lib_objectid(pagination_id)}, {has_return:false}, function(up_dox)
                    {
                        lib_database.find_pagination({"_id": lib_objectid(pagination_id)}, function (docs)
                        {
                            var pagination = docs[0];
                            lib_pagination.ticket_grabber(pagination.beginning, pagination.destination, pagination.date, pagination.sort, pagination.page, function(tickets)
                            {
                                var options = lib_pagination.inline_keyboard(pagination._id, pagination.page, tickets.pages_count, false);
                                tchBot.answerCallbackQuery(message.id, lib_strings.inline.search_done).then(function (par_acq)
                                {
                                    tchBot.editMessageReplyMarkup(options.reply_markup, {message_id: pagination.message_id, chat_id: pagination.chat.id}).then(function (par_emrm)
                                    {
                                        tchBot.sendMessage(message.from.id, lib_strings.msg_sel_menu, {reply_markup: JSON.stringify(result.keyboard)});
                                    });
                                });
                            });
                        });
                    });
                });
            });
        });
    }
    else
    {
        lib_database.update_pagination({"_id": lib_objectid(pagination_id)}, {page:parseInt(data)}, function(dox)
        {
            lib_database.find_pagination({"_id": lib_objectid(pagination_id)}, function (docs)
            {
                var pagination = docs[0];
                lib_pagination.ticket_grabber(pagination.beginning, pagination.destination, pagination.date, pagination.sort, pagination.page, function(tickets)
                {
                    var options = lib_pagination.inline_keyboard(pagination_id, pagination.page, tickets.pages_count, pagination.has_return);
                    options.message_id = pagination.message_id;
                    options.chat_id = pagination.chat.id;
                    tchBot.answerCallbackQuery(message.id).then(function (par_acq)
                    {
                        tchBot.editMessageText(tickets.text, options);
                    });
                });
            });
        });
    }
});
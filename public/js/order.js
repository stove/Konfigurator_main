

/*! PRICE CALCULATOR SCRIPT */
(function($) {

    $.fn.PriceCalc= function (options) {
console.log("    ---       DEFAULT SETTINGS   ---")
        // Default options for text

        var settings = $.extend({
            totallabel: "Total:",
            detailslabel: "Order details",
            currency:"Kr"
        }, options );

// Initialize Variables

        var total=0;
        var child=this.find('*');
        var formdropdowns=this.find('select');

        //Built in function that can be called outside of script to update total
        this.updatetotal = function(){ setTimeout(function() {
            UpdateTotal();
        }, 100);};


        this.addClass("price_calc");
        InitialUpdate();

        // Change select data cost on each change to current selected value

        formdropdowns.change( function() {
            console.log("formdropdowns change  event")
            if($(this).attr('multiple')) {
                var selectedOptions = $(this).find(':selected');
                var selectedOptionstotal=0;
                if (selectedOptions != '')
                {
                    selectedOptions.each( function() {
                        selectedOptionstotal += $(this).data('price');
                    });
                }
                $(this).attr('data-total',selectedOptionstotal);
            }
            else{
                var selectedOption = $(this).find(':selected');
                if($(this).data('mult') >= 0)
                    $("#price_total label").attr('data-mult',selectedOption.val());
                else
                    $(this).attr('data-total',selectedOption.data('price')) ;
            }
            UpdateTotal();
        });

        //Update total when user inputs or changes data from input box

        $(".price_calc input[type=text]").change( function() {

            if($(this).attr('data-price') || $(this).attr('data-mult')) {

                var userinput= $(this).val();
                if($.isNumeric(userinput)) { var usernumber = parseFloat(userinput);} else if(userinput != '') { alert('Please enter a valid number'); var usernumber = 1; } else { usernumber = 1; }
                var multiple=parseFloat($(this).data('mult')) || 0;
                var pricecost=parseFloat($(this).data('price')) || 0;
                var percentage=$(this).data('prcnt') || 1;

                if($.isNumeric(pricecost) && pricecost !=0) {
                    var updpricecost=pricecost * usernumber;
                    $(this).attr('data-total', updpricecost);
                }

                if(multiple && multiple !=0) {
                    $("#price_total label").attr('data-mult',usernumber);
                }

            }

            UpdateTotal();

        });

        $(".price_calc input[type=checkbox]").change( function() {

            if($(this).is(':checked')) {
                var checkboxval= $(this).data('price');
                if($.isNumeric(checkboxval)) {
                    $(this).attr('data-total', checkboxval);
                }
                else {
                    $(this).attr('data-total', 0);
                }
            }
            else {
                $(this).attr('data-total', 0);
            }

            UpdateTotal();

        });

        $(".price_calc input[type=radio]").change( function() {
            console.log("---- Change method for type radio -----");
            // my_total = $("#answer_0_group_1").attr("data-total");
            // console.log("Total now = " + my_total);
            $(".price_calc input[type=radio]").each( function() {
                if($(this).is(':checked')) {
                    let model = $(this).attr('data-label');
                    console.log(" Model on chair is:  " + model);
                    let name =  $(this).attr('name');
                    if (name == 'answer_group_1') {
                        if (model.includes('Eco-Vinyl')) {
                            $('.vinyl').css("display", "block");

                        } else {
                            $('.vinyl').css("display", "none");
                        }
                        if (model.includes('Läder')) {
                            $(".leather").css("display", "block");
                            $(".ribbon.span").css("baclground", "brown");
                        } else $(".leather").css("display", "none");
                        if (model.includes('Textil')) {
                            $('.textil').css("display", "block");
                        } else {
                            $('.textil').css("display", "none");
                        }
                    }
                    //TODO kvar att hantera .....
                    $(".exclusive").css('display', "block");

                    my_total = $("#answer_0_group_1").attr("data-total");
                    my_total = $("input#answer_0_group_1").attr("data-total");
                    my_price = $("#answer_0_group_1").attr("data-price");
                    my_price = $("input#answer_0_group_1").attr("data-price");
                    console.log("model from storage = " + localStorage.getItem("model"));
                    var radioval = $(this).attr("data-price");
                    // var radioval= $(this).data('price');

                    if($.isNumeric(radioval)) {
                        $(this).attr('data-total', radioval);
                    }
                    else {
                        $(this).attr('data-total', 0);
                    }
                }
                else {
                    $(this).attr('data-total', 0);
                }
            });

            UpdateTotal();

        });



        //Initialize all fields if data is there

        function InitialUpdate() {
            console.log("------            INITIAL UPDATE          ---------------");
            formdropdowns.each( function() {
                if($(this).attr('multiple')) {
                    var selectedOptions = $(this).find(':selected');
                    var selectedOptionstotal=0;
                    if (selectedOptions != '')
                    {
                        selectedOptions.each( function() {
                            selectedOptionstotal += $(this).data('price');
                        });
                    }
                    $(this).attr('data-total',selectedOptionstotal);
                }
                else{
                    var selectedOption = $(this).find(':selected');
                    $(this).attr('data-total',selectedOption.data('price')) ;
                }
            });

            //Update total when user inputs or changes data from input box

            $(".price_calc input[type=text]").each( function() {

                if($(this).attr('data-price') || $(this).attr('data-mult')) {

                    var userinput= $(this).val();
                    if($.isNumeric(userinput)) { var usernumber = parseFloat(userinput);} else if(userinput != '') { alert('Please enter a valid number'); var usernumber = 1;} else { usernumber = 1; }
                    var multiple=parseFloat($(this).data('mult')) || 0;
                    var pricecost=parseFloat($(this).data('price')) || 0;
                    var percentage=$(this).data('prcnt') || 1;

                    if($.isNumeric(pricecost) && pricecost !=0) {
                        var updpricecost=pricecost * usernumber;
                        $(this).attr('data-total', updpricecost);
                    }

                    if(multiple && multiple !=0) {
                        $("#price_total label").attr('data-mult',usernumber);
                    }

                }

            });

            $(".price_calc input[type=checkbox]").each( function() {

                if($(this).is(':checked')) {
                    var checkboxval= $(this).val();
                    if($.isNumeric(checkboxval)) {
                        $(this).attr('data-total', checkboxval);
                    }
                    else {
                        $(this).attr('data-total', 0);
                    }
                }
                else {
                    $(this).attr('data-total', 0);
                }

            });


            $(".price_calc input[type=radio]").each( function() {

                if($(this).is(':checked')) {
                    alert("Input type radio  for each ...and is checked..");
                    var radioval= $(this).attr('data-price');
                    if($.isNumeric(radioval)) {
                        $(this).attr('data-total', radioval);
                    }
                    else {
                        $(this).attr('data-total', 0);
                    }
                }
                else {
                    $(this).attr('data-total', 0);
                }
            });

            $(".price_calc input[type=hidden]").each( function() {

                if($(this).attr('data-price')) {
                    console.log("***   SETTING HIDDEN VALUES ***");
                    var hiddeninputval= $(this).attr('data-price');

                    if($.isNumeric(hiddeninputval) && hiddeninputval !=0) {
                        $(this).attr('data-total', hiddeninputval);
                    }

                }

            });

            UpdateTotal();

        }

        //Change value of total field by adding all data totals in form

        function UpdateTotal() {
           console.log(" ------------->  UPDATE TOTAL  <-------------------")
            total=0;
            totalmult=$(".price_calc #price_total label").attr("data-mult");
            console.log("totalmult =" + totalmult);
            console.log(" after totalmult....");
            my_total = $("#answer_0_group_1").attr("data-total");
            console.log("Total now = " + my_total);
            //For each input with data-merge attr, take merge ids value and multiply by current data-price
            $("input[data-merge]").each(function(){
                console.log("Inside input[data-merge] I want to know this. !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");
                var ids=$(this).data('merge');
                var ids=ids.split(',');
                var arraytotals=1;
                $.each(ids, function(key,value) {
                    var inputid =$("#"+value);
                    if( (inputid.attr('type') == 'checkbox' || inputid.attr('type') == 'radio')  && inputid.is(':checked') )
                        arraytotals*=$("#"+value).val();
                    else if (inputid.attr('type') == 'text')
                        arraytotals*=$("#"+value).val();
                    else if (inputid.prop('nodeName') == "SELECT")
                        arraytotals*=$("#"+value).find(':selected').val();
                });
                var idtotal=arraytotals;
                if($.isNumeric(idtotal)) {
                    var pricecost=parseFloat($(this).data('price')) || 0;
                    $(this).val($.number(idtotal,2));
                    var updpricecost= pricecost * parseFloat($(this).val());
                    console.log("Setting data-total to: " + updpricecost);
                    $(this).attr('data-total',$.number(updpricecost,2));
                }
            });
            //TODO check this out bjosto
            // child.each(function () {
            //     console.log(this);
            // });
            console.log(" Before iterating child.each");
            my_total = $("#answer_0_group_1").attr("data-total");
            console.log("Total now = " + my_total);
            child.each(function () {
                itemcost= 	$(this).attr("data-total") || 0;
                total += parseFloat(itemcost);
                // console.log($(this)[0].nodeName);
                // console.log("This id =   " + $(this).attr("id"));
                // console.log("total = " + total);
            });
            console.log("After iterating each.child total == " + total);
            dataT = $("#answer_0_group_1").attr("data-total");
            console.log("data-total after click for item was " + "#answer_1_group_1" + "  =" + dataT);
            if(totalmult) {
                total = total * parseFloat(totalmult);
            }
            console.log("Know setting #price_total label to : " + total);
            $(".price_calc #price_total label").html($.number(total,2)+settings.currency);

            setTimeout(function() {
                UpdateDescriptions();
            }, 100);


        }

        //Update Field Labels and Pricing

        function UpdateDescriptions() {
            console.log(" ---   UpdateDescriptions");
            var selectedformvalues= [];
            var currtag='';

            $(".price_calc").find('*').each( function () {

                currtag=$(this).prop('tagName');

                if(currtag == "SELECT") {
                    if($(this).attr('multiple')) {
                        var selectedOptions = $(this).find(':selected');
                        if (selectedOptions != '')
                        {
                            selectedOptions.each( function() {
                                var optionlabel= $(this).data('label') || '';
                                var optionprice = $(this).data('price');
                                if(optionlabel != '') {
                                    selectedformvalues.push(optionlabel + ": " + optionprice + settings.currency );
                                }
                            });
                        }

                    }
                    else{
                        var selectedOption = $(this).find(':selected');
                        if (selectedOption != '')
                        {
                            var optionlabel= selectedOption.data('label') || '';
                            var optionprice = selectedOption.data('price');
                            if(optionlabel != '') {
                                selectedformvalues.push(optionlabel +": " + optionprice + settings.currency );
                            }

                        }
                    }

                } // End of Form dropdown

                if(currtag == "INPUT" && $(this).attr('type') == "text")
                {
                    if($(this).attr('data-price') || $(this).attr('data-mult')) {

                        var userinput= $(this).val();
                        if($.isNumeric(userinput)) { var usernumber = parseFloat(userinput);}  else { var usernumber = 1; }
                        var pricecost=parseFloat($(this).data('price')) || 0;
                        var currlabel= $(this).attr('data-label') || '';
                        var currinput= userinput;

                        if (currlabel != '' && currinput !='') {

                            if($.isNumeric(pricecost) && pricecost !=0) {
                                var updpricecost=pricecost * usernumber;
                                selectedformvalues.push(currlabel + ": " + updpricecost + settings.currency );
                            }
                            else{
                                selectedformvalues.push(currlabel + ": " + currinput);
                            }
                        }


                    }
                }  // End of input type text

                if(currtag == "INPUT" && $(this).attr('type') == "hidden")
                {
                    console.log(" *** INSIDE IMPORTANT HANDLING HIDDEN FUNCTION ");
                    if($(this).attr('data-price')) {
                        console.log("I want to know this..inside hidden...hidden is set to attr(data-price)....");
                        var hiddeninputval= $(this).attr('data-price');
                        var currlabel= $(this).attr('data-label') || '';


                        if (currlabel != '') {
                            console.log("  ----------------------------  MOST IMPORTANT  -----------------------");

                            if($.isNumeric(hiddeninputval) && hiddeninputval !=0)
                                selectedformvalues.push(currlabel + ": " + hiddeninputval + settings.currency );
                        }

                    }
                }  // End of input type hidden

                if($("input[type=checkbox]") ||  $("input[type=radio]") )
                {
                    if($(this).is(':checked')) {
                        var checkboxval= $(this).attr('data-price') ;
                        if($.isNumeric(checkboxval)) {
                            var currlabel= $(this).attr('data-label') || '';
                            var currprice= checkboxval;
                            if (currlabel != '') { selectedformvalues.push(currlabel + ": " + currprice + settings.currency ); }
                        }
                    }
                }  // End of input type checkbox or radio

            });

            $("#order_details").html("");
            if (selectedformvalues != '') {
                $("#order_details").append("<h4>"+ settings.detailslabel +"</h4>");
                $.each(selectedformvalues, function(key,value) {
                    $("#order_details").append("<p>"+"- " + value + "</p>");
                });

            }

        }
        // End of UpdateDescriptions()
        // Start for my code
        $(".item_price").click(function (e){
            e.preventDefault();
            let button_id = e.target.id;
            console.log("button_id raw = " + button_id);
            let id_nr = button_id.replace(/\D/g, "");
            if (parseInt(id_nr) > 99) {
                id_nr = button_id.charAt(button_id.length - 2);
                console.log("id_nr is > 99 " + id_nr +"  button_id = " + button_id);
            } else {
                id_nr = button_id.charAt(button_id.length - 1);
                console.log("id_nr is < 99 " + id_nr +"  button_id = " + button_id);
            }
            console.log("id_nr = " + id_nr);
            let full_id = "#" + button_id;
            let buttonprice =  $(this).data('buttonprice');
            let buttonlabel = $(this).data('buttonlabel');
            // let i_nr = button_id.charAt(button_id.length - 1);
            let product_and_price = buttonlabel + " " + buttonprice + " Kr"
            input_radio_id = "input#answer_"+ id_nr.toString() +"_group_1";
            $(input_radio_id).attr("data-price", buttonprice);
            $(input_radio_id).attr("data-label", buttonlabel);
            $(input_radio_id).attr("data-total", buttonprice);
            $(input_radio_id).attr("value", product_and_price);
            $(input_radio_id).prop("checked", true);

            console.log("values set");
            setTimeout(function(){
                $(input_radio_id).change();
            },50);

            function triggerChange() {
                // $(input_radio_id).change();


            }


        });

        $( "#order_summary").append('<div id="order_details"></div><div id="price_total"><h3>' + settings.totallabel + ' </h3><label id="total_value"> ' + $.number(total,2) + settings.currency  + ' </label></div>');

        return this;

    };  // End of plugin

}(jQuery));

    // $(".item_price").click(function (e){
    //
    //     console.log("clicked  " + this.id);
    //     let button_id = e.target.id;
    //     let full_id = "#" + button_id;
    //     let buttonprice =  $(this).data('buttonprice');
    //     let buttonlabel = $(this).data('buttonlabel');
    //     // id for radio box = answer_this.id_group1
    //     //get the i number from id
    //     let i_nr = button_id.charAt(button_id.length - 1);
    //     console.log(i_nr);
    //     console.log("data value  "+ buttonprice + "  and label:  " + buttonlabel);
    //     input_radio_id = "#answer_"+ i_nr.toString() +"_group_1";
    //     console.log(input_radio_id);
    //     $(input_radio_id).attr("data-price", buttonprice);
    //     $(input_radio_id).attr("data-label", buttonlabel);
    //     var testone =  $(input_radio_id).attr("data-label");
    //     var testtwo = $(input_radio_id).attr("data-price");
    //     console.log(" data-price =  " + testtwo + " and data-labet = " + testone);
    //    let selectedRadio =  $(input_radio_id);
    //
    //     $("#female").prop("checked", true);


      /* setTimeout(50, newUpdate);

        function newUpdate() {
            $(this).PriceCalc().updateDescription();
        }*/


        // Lista ut id beroende på vilken brn ....nästa group id kanske behöver fås från btn....
        // let bravo = $(this).closest("#answer_0_group_1").data('price');
        // let bravo2 = $('form input[type=radio]#answer_0_group_1').data('price');
        // $('form input[type=radio]#answer_0_group_1').data('price', my_button_val);





     /*var compare = '#answer_0_group_1';
      var selected = $('#answer_0_group_1');
        var datap = $(input_radio_id).attr("data-price");
        console.log(datap);
        var elements = selected.get();
        console.log(elements);*/

/*
        callRadioChange();

        function callRadioChange() {
            console.log("radiochange called");
            $(".price_calc input[type=radio]").trigger('change');
        }*/

        // console.log($("form input[type=radio]"));


        // $("form :input, form textarea, form select, form button").change(function () {
        //     console.log("Total value is set from order.js");
        //     setTimeout(function () {
        //         var total = $('#total_value').html();
        //         console.log("Totalen = " + total);
        //         $('#hidden_total').val(total);
        //     }, 150);
        // });

    // });



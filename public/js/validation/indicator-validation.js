var FormWizard = function () {


    return {
        //main function to initiate the module
        init: function () {
            if (!jQuery().bootstrapWizard) {
                return;
            }

            function format(state) {
                if (!state.id) return state.text; // optgroup
                return "<img class='flag' src='../../assets/global/img/flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
            }

            $("#country_list").select2({
                placeholder: "Select",
                allowClear: true,
                formatResult: format,
                width: 'auto', 
                formatSelection: format,
                escapeMarkup: function (m) {
                    return m;
                }
            });

            var form = $('#submit_form');
            var error = $('.alert-danger', form);
            var success = $('.alert-success', form);

            form.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    name: {
                        required: true,
                        maxlength: 100
                    },
                    short_description: {
                        required: true,
                        maxlength: 255
                    },
                    content: {
                        required: true
                    },
                    type: {
                        required: true
                    },
                    'tag_id[]': {
                        required: true
                    },
                    
                    product_image: {
                        accept: "image/*"
                    },
                    mt5_file: {
                        required: function(){
                            return $("#mt4_file").val() == "";
                        }
                    },
                    screenshots: {
                        required: true,
                        accept: "image/*"
                    },
                    video: {
                        required: true
                    },
                    brief_introduction: {
                        required: true
                    },
                    novice_traders: {
                        required: true
                    },
                    trading_setup: {
                        required: true
                    },
                    trend_changes: {
                        required: true
                    },
                    pullbacks: {
                        required: true
                    },
                    breakout: {
                        required: true
                    },
                    correction: {
                        required: true
                    },
                    parameters: {
                        required: true
                    },
                    developers: {
                        required: true
                    },
                    publish_at: {
                        required: true
                    },
                    version: {
                        required: true
                    },
                    meta_keyword: {
                        maxlength: 255
                    },
                    meta_description: {
                        maxlength: 255
                    }
                },

                messages: { // custom messages for radio buttons and checkboxes
                    "name": {
                        required: "Please enter Product Name",
                        maxlength: "Maximum length is 100"
                    },
                    "short_description": {
                        required: "Please enter Short Description",
                        maxlength: "Maximum length is 255"
                    },
                    "content": {
                        required: "Please provide Product Description",
                    },
                    "type": {
                        required: "Product Type is required",
                    },
                    "tag_id": {
                        required: "Please provide tag",
                    },
                    "product_image": {
                        required: "Please provide product image",
                        accept: "Only jpeg | jpg | png image extension allowed",
                    },
                    "mt5_file": {
                        required: "Please provide either MT4 or MT5",
                    },
                    "screenshots": {
                        required: "Please provide Screenshots",
                        accept: "Only jpeg | jpg | png image extension allowed",
                    },
                    "video": {
                        required: "Please provide Video Embed code.",
                    },
                    "brief_introduction": {
                        required: "Please provide Brief Introduction",
                    },
                    "novice_traders": {
                        required: "Please provide Novice Traders",
                    },
                    "trading_setup": {
                        required: "Please provide Trading Setup",
                    },
                    "trend_changes": {
                        required: "Please provide Trend Changes",
                    },
                    "pullbacks": {
                        required: "Please provide Pullbacks",
                    },
                    "breakout": {
                        required: "Please provide Breakout",
                    },
                    "correction": {
                        required: "Please provide Correction",
                    },
                    "parameters": {
                        required: "Please provide Parameters",
                    },
                    "developers": {
                        required: "Please provide Developers",
                    },
                    "publish_at": {
                        required: "Please provide Publish Date",
                    },
                    "meta_keyword": {
                        maxlength: "Maximum length is 255"
                    },
                    "meta_description": {
                        maxlength: "Maximum length is 255"
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success.hide();
                    error.show();
                    App.scrollTo(error, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    if (label.attr("for") == "status") { // for checkboxes and radio buttons, no need to show OK icon
                        label
                            .closest('.form-group').removeClass('has-error').addClass('has-success');
                        label.remove(); // remove error label here
                    } else { // display success icon for other inputs
                        label
                            .addClass('valid') // mark the current input as valid and display OK icon
                        .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    }
                },

                submitHandler: function (form) {
                    success.show();
                    error.hide();
                    form.submit();
                    //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
                }

            });

            var displayConfirm = function() {
                $('#tab4 .form-control-static', form).each(function(){
                    var input = $('[name="'+$(this).attr("data-display")+'"]', form);
                    if (input.is(":radio")) {
                        input = $('[name="'+$(this).attr("data-display")+'"]:checked', form);
                    }
                    if (input.is(":text") || input.is("textarea")) {
                        $(this).html(input.val());
                    } else if (input.is("select")) {
                        $(this).html(input.find('option:selected').text());
                    } else if (input.is(":radio") && input.is(":checked")) {
                        $(this).html(input.attr("data-title"));
                    } else if ($(this).attr("data-display") == 'payment[]') {
                        var payment = [];
                        $('[name="payment[]"]:checked', form).each(function(){ 
                            payment.push($(this).attr('data-title'));
                        });
                        $(this).html(payment.join("<br>"));
                    }
                });
            }

            var handleTitle = function(tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 1;
                // set wizard title
                $('.step-title', $('#form_wizard_1')).text('Step ' + (index + 1) + ' of ' + total);
                // set done steps
                jQuery('li', $('#form_wizard_1')).removeClass("done");
                var li_list = navigation.find('li');
                for (var i = 0; i < index; i++) {
                    jQuery(li_list[i]).addClass("done");
                }

                if (current == 1) {
                    $('#form_wizard_1').find('.button-previous').hide();
                } else {
                    $('#form_wizard_1').find('.button-previous').show();
                }

                if (current >= total) {
                    $('#form_wizard_1').find('.button-next').hide();
                    $('#form_wizard_1').find('.button-submit').show();
                    displayConfirm();
                } else {
                    $('#form_wizard_1').find('.button-next').show();
                    $('#form_wizard_1').find('.button-submit').hide();
                }
                App.scrollTo($('.page-title'));
            }

            // default form wizard
            $('#form_wizard_1').bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                onTabClick: function (tab, navigation, index, clickedIndex) {
                    return false;
                    
                    success.hide();
                    error.hide();
                    if (form.valid() == false) {
                        return false;
                    }
                    
                    handleTitle(tab, navigation, clickedIndex);
                },
                onNext: function (tab, navigation, index) {
                    success.hide();
                    error.hide();
                    tinyMCE.triggerSave();
                    if (form.valid() == false) {
                        return false;
                    }

                    handleTitle(tab, navigation, index);
                },
                onPrevious: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    handleTitle(tab, navigation, index);
                },
                onTabShow: function (tab, navigation, index) {
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    var $percent = (current / total) * 100;
                    $('#form_wizard_1').find('.progress-bar').css({
                        width: $percent + '%'
                    });
                }
            });

            $('#form_wizard_1').find('.button-previous').hide();
            $('#form_wizard_1 .button-submit').hide();

            //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
            $('#country_list', form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
        }

    };

}();

jQuery(document).ready(function() {
    FormWizard.init();
});
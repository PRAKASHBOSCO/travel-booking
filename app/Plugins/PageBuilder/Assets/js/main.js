(function ($) {
    'use strict';

    $.getMultiScripts = function (arr, path) {
        var _arr = $.map(arr, function (scr) {
            return $.getScript((path || "") + scr);
        });

        _arr.push($.Deferred(function (deferred) {
            $(deferred.resolve);
        }));

        return $.when.apply($, _arr);
    }

    function delay(callback, ms) {
        var timer = 0;
        return function () {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
                callback.apply(context, args);
            }, ms || 0);
        };
    }

    function objectifyForm(formArray) {
        var returnArray = {};
        for (var i = 0; i < formArray.length; i++) {
            returnArray[formArray[i]['name']] = formArray[i]['value'];
        }
        return returnArray;
    }

    jQuery.fn.serializeObject = function () {
        var arrayData, objectData;
        arrayData = this.serializeArray();
        objectData = {};

        $.each(arrayData, function () {
            var value;

            if (this.value != null) {
                value = this.value;
            } else {
                value = '';
            }

            if (objectData[this.name] != null) {
                if (!objectData[this.name].push) {
                    objectData[this.name] = [objectData[this.name]];
                }

                objectData[this.name].push(value);
            } else {
                objectData[this.name] = value;
            }
        });

        return objectData;
    };

    function isset(accessor) {
        try {
            // Note we're seeing if the returned value of our function is not
            // undefined or null
            return accessor() !== undefined && accessor() !== null
        } catch (e) {
            // And we're able to catch the Error it would normally throw for
            // referencing a property of undefined
            return false
        }
    }

    var GmzBuilder = {
        init: function () {
            this.initButtons();
            this.initSortable();
            this.initDragable();
            this.initBlocks();
            this.initformChange();
            this.initGlobal();
            this.savePage();
            this.initApplySettingRow();
        },

        initApplySettingRow: function () {
            const x = this;
            $('.builder__render .__row-wrapper').each(function () {
                let currentSection = $(this);
                let sectionClassName = currentSection.attr('class');
                let settings = currentSection.find('.__row').data('settings');
                x._setSettingRow(currentSection, sectionClassName, settings);
            });

        },

        initRowSettings: function () {
            var x = this;
            var currentSection = $('.doing-settings').parents('.__row-wrapper');
            let settings = $('.doing-settings').data('settings');
            //get all class names except those added in settings
            let sectionClassName = currentSection.attr('class');
            if (isset(() => settings.cssClass)) {
                let cssClass = settings.cssClass.trim();
                sectionClassName = sectionClassName.replace(cssClass, '');
            }
            //push data into form
            x._pushSettingRowToForm(currentSection);
            //set setting row first times
            $('.row-settings input, .row-settings select').on('input', function () {
                x._setSettingRow(currentSection, sectionClassName);
            });
        },

        _setSettingRow: function (currentSection, sectionClassName, settings) {
            if (!settings) {
                var data = {};
                var form = $('.row-settings form');
                $.each(form.serializeArray(), function () {
                    data[this.name] = this.value;
                });
                settings = {};
                settings.margin = {};
                settings.padding = {};

                ['desktop','tablet','mobile'].forEach(key => {
                    settings.padding[key] = {};
                    settings.margin[key] = {};
                    ['top','bottom',].forEach( pos =>{
                        settings.margin[key][pos] = data[`margin_${key}_${pos}`];
                    });

                    ['top', 'right', 'bottom', 'left'].forEach( pos =>{
                        settings.padding[key][pos] = data[`padding_${key}_${pos}`];
                    });
                });

                settings.contentWidth = data["content_width"];
                settings.columnGap = data["column_gap"];
                settings.cssID = data["css_id"] || "";
                settings.cssClass = data["css_class"] || "";
                settings.hidden = {
                    desktop: data["hide_desktop"] || "",
                    tablet: data["hide_tablet"] || "",
                    mobile: data["hide_mobile"] || "",
                };
                settings.reverseColumnsMobile = data["reverse_columns_mobile"] || "";
                settings.bgcTransparent = data["bgc_transparent"] || "";
                settings.backgroundColor = data["background_color"] || "";
            }

            // Render css
            let sectionID = currentSection.data('id');
            settings.sectionID = sectionID;

            let style = {desktop: '', tablet: '', mobile: ''};
            Object.keys(style).forEach(key => {

                ['top', 'bottom'].forEach(pos => {
                    if (isset(() => settings.margin[key][pos]) && settings.margin[key][pos] !== "") {
                        style[key] += 'margin-' + pos + ':' + settings.margin[key][pos] + 'px;';
                    }
                });

                ['top', 'right', 'bottom', 'left'].forEach(pos => {
                    if (isset(() => settings.padding[key][pos]) && settings.padding[key][pos] !== "") {
                        style[key] += 'padding-' + pos + ':' + settings.padding[key][pos] + 'px;'
                    }
                });

                if (key === 'desktop') {
                    if (typeof settings.bgcTransparent != 'undefined'
                        && settings.bgcTransparent !== 'on'
                        && typeof settings.backgroundColor != 'undefined') {
                        style[key] += 'background-color:' + settings.backgroundColor + ';'
                    }
                }
                if (key === 'mobile') {
                    if (typeof settings.reverseColumnsMobile != 'undefined'
                        && settings.reverseColumnsMobile === "on") {
                        style[key] += 'flex-direction: row-reverse;'
                    }
                }
            });

            let css = '';
            css += '.gmz-' + sectionID + '{' + style.desktop + '}';
            css += '@media(min-width: 768px) and (max-width:1024px){' + '.gmz-' + sectionID + '{' + style.tablet + '}}';
            css += '@media(max-width: 767.99px){' + '.gmz-' + sectionID + '{' + style.mobile + '}}';
            $('#style-element-' + sectionID).remove();
            $('head').append("<style id='style-element-" + sectionID + "' type='text/css'>" + css + "</style>");

            //Validate css-class input, css-id input
            const classRegex = new RegExp(/^[a-z_ -][a-z\d_ -]*$/i);
            const idRegex = new RegExp(/^[a-z_-][a-z\d_-]*$/i);
            if (typeof settings.cssClass != 'undefined') {
                if (!classRegex.test(settings.cssClass)) {
                    $('#css-class').addClass('bd-input-error');
                } else {
                    $('#css-class').removeClass('bd-input-error');
                    currentSection.removeClass().addClass(sectionClassName + ' ' + settings.cssClass);
                }

                //remove invalid css class names
                let cl = settings.cssClass.split(' ');
                settings.cssClass = '';
                cl.forEach(function (val) {
                    if (idRegex.test(val)) {
                        settings.cssClass += val + ' ';
                    }
                });
                settings.cssClass.trim();
            }

            if (typeof settings.cssID != 'undefined') {
                if (settings.cssID && !idRegex.test(settings.cssID)) {
                    $('#css-id').addClass('bd-input-error');
                } else {
                    $('#css-id').removeClass('bd-input-error');
                    currentSection.attr('id', settings.cssID);
                }
            }

            if (typeof settings.contentWidth != 'undefined') {
                if (settings.contentWidth === 'boxed') {
                    currentSection.find('.bd-container-section').addClass('bd-container');
                } else if (settings.contentWidth === 'fullwidth') {
                    currentSection.find('.bd-container-section').removeClass('bd-container');
                }
            }
            if (typeof settings.columnGap != 'undefined') {
                if (settings.columnGap === 'default') {
                    currentSection.removeClass('no-gap');
                } else if (settings.columnGap === 'no-gap') {
                    currentSection.addClass('no-gap');
                }
            }
            $('.doing-settings').attr('data-settings', JSON.stringify(settings));
        },

        _pushSettingRowToForm: function (currentSection) {
            let data = currentSection.find('.__row').data('settings');
            if (typeof data === 'object' && data !== null) {
                let form = $('.row-settings form');
                ['desktop', 'tablet', 'mobile'].forEach(screen => {
                    ['top', 'bottom'].forEach(position => {
                        if (isset(() => data.margin[screen][position])) {
                            $(`[name='margin_${screen}_${position}']`, form).val(data.margin[screen][position]);
                        }
                    });
                    ['top', 'right', 'bottom', 'left'].forEach(position => {
                        if (isset(() => data.padding[screen][position])) {
                            $(`[name='padding_${screen}_${position}']`, form).val(data.padding[screen][position]);
                        }
                    });
                });

                if (typeof data.contentWidth != 'undefined'){
                    $("[name='content_width']", form).val(data.contentWidth).change();
                }
                if (typeof data.columnGap != 'undefined') {
                    $("[name='column_gap']", form).val(data.columnGap).change();
                }

                $("[name='css_id']", form).val(data.cssID);
                $("[name='css_class']", form).val(data.cssClass);

                ['desktop', 'tablet', 'mobile'].forEach(screen => {
                    if (isset(()=>data.hidden[screen])){
                        $(`[name='hide_${screen}']`, form).prop('checked', !!(data.hidden[screen]));
                    }
                });

                $("[name='reverse_columns_mobile']", form).prop('checked', !!(data.reverseColumnsMobile));
            }
        },

        savePage: function (el) {
            var base = this;
            $('.bd-save-page').click(function (e) {
                e.preventDefault();
                var loader = $('.builder__content .gmz-loader');
                loader.show();
                var settings = [],
                    rowWrapper = $('#builder-render .__row-wrapper');
                if (rowWrapper.length) {
                    rowWrapper.each(function () {
                        var row = $(this);
                        var temp = [];
                        row.find('.__column').each(function () {
                            var col = $(this);
                            var elementSettings = [];
                            col.find('.__block').each(function () {
                                elementSettings.push({
                                    'settings': $(this).find('[data-settings]').attr('data-settings'),
                                    'params': $(this).data('params')
                                });
                            });
                            temp.push({
                                column: col.data('columns'),
                                elements: elementSettings
                            });
                        });
                        settings.push({
                            settings: row.find('.__row').attr('data-settings'),
                            columns: temp
                        });
                    });
                }

                var t = $(this),
                    action = t.data('action'),
                    pageID = t.data('page-id');

                var data = [];

                data.push({
                    name: 'page_id',
                    value: pageID
                }, {
                    name: '_token',
                    value: $('meta[name="csrf-token"]').attr('content')
                });

                data.push({
                    name: 'settings',
                    value: JSON.stringify(settings)
                });

                $.post(action, data, function (respon) {
                    if (typeof respon == 'object') {
                        base.toast(respon);
                    }
                    loader.fadeOut();
                }, 'json');
            })
        },

        initMultiLanguages: function (el) {
            var base = this;
            if ($('#gmz-language-action').length) {
                $('.form.form-translation').each(function () {
                    var form = $(this);

                    var code = $('.item.active', form).data('code');

                    form.on('click', '.item', function () {
                        code = $(this).data('code');
                        $('.item', form).removeClass('active');
                        $('.item[data-code="' + code + '"]', form).addClass('active');

                        $('[data-lang]', form).addClass('hidden');
                        $('[data-lang="' + code + '"]', form).removeClass('hidden');

                        //For editor
                        if ($('.gmz-editor', form).length) {
                            var editor_id = $('.gmz-editor', form).first().attr('id');
                            var editor_name = editor_id.substr(0, editor_id.length - 2);
                            $('textarea#' + editor_name + code).addClass('gmz-editor');

                            if (!$('#' + editor_name + code + '_ifr').length) {
                                if (typeof tinymce === 'object') {
                                    tinymce.init({
                                        selector: 'textarea#' + editor_name + code,
                                        width: '100%',
                                        height: 350,
                                        nowrap: true
                                    });
                                }
                            }

                            $('.gmz-editor', form).each(function () {
                                var editor_id = $(this).attr('id');
                                var editor_code = editor_id.substr(editor_id.length - 2, 2);
                                if (editor_code === code) {
                                    $('#' + editor_id + '_ifr').closest('.tox').show();
                                } else {
                                    $('#' + editor_id + '_ifr').closest('.tox').hide();
                                }
                            });
                        }

                        //Reload text by language
                        var currentForm = $(this).closest('form');
                        $('.has-translation[data-lang="' + code + '"]', currentForm).each(function () {
                            var me = $(this);
                            if (me.attr('type') === 'text') {
                                base._formChange(currentForm, me.attr('name'), me.val(), me.attr('type'));
                            } else if (me.prop("tagName") === 'TEXTAREA') {
                                base._formChange(currentForm, me.attr('name'), me.val(), 'textarea');
                            }
                        });
                    });
                });
            }
        },

        initGlobal: function () {
            var base = this;
            if ($('#gmz-language-action').length) {
                base.initMultiLanguages();
            }
        },

        _formChange: function (wrapper, el, text, type) {
            var id = wrapper.data('id'),
                contentWrapper = $('#builder-render');

            var nameElement = wrapper.find('input[name="id"]').val();

            var parentEl = wrapper.find('input[name="id"]').val() + '_' + wrapper.find('input[name="time"]').val();

            var currentLang = '';
            if (wrapper.find('#gmz-language-action').length) {
                currentLang = wrapper.find('#gmz-language-action .item.active').data('code');
                if (currentLang !== '' && (typeof el != 'undefined')) {
                    if (el.indexOf('_' + currentLang) !== -1) {
                        el = el.replace('_' + currentLang, '');
                    }

                    wrapper.find('input[name="lang"]').val(currentLang);
                }
            }

            var data = wrapper.serializeArray();
            var dataSettings = wrapper.serializeObject();

            wrapper.find('.gmz-field-has-translation').each(function () {
                var nameInput = $(this).find('.has-translation').first().attr('name');
                var originNameInput = nameInput.substring(0, nameInput.length - 3);
                dataSettings[originNameInput] = [];
                var transText = '';
                $(this).find('.has-translation').each(function () {
                    var lang = $(this).data('lang');
                    transText += '[:' + lang + ']' + $(this).val();
                    dataSettings[originNameInput][$(this).data('lang')] = $(this).val();
                    delete dataSettings[$(this).attr('name')];
                });
                transText += '[:]';
                dataSettings[originNameInput] = transText;
            });

            var block = $('.__block.block-selected');
            block.find('[data-settings]').attr('data-settings', JSON.stringify(dataSettings));

            if (type === 'text' || type === 'textarea' || type === 'number') {
                var field = block.find('[data-fields="' + el + '"]');
                var field_type = field.data('attr');
                if (field_type === 'space') {
                    var valTemp = parseInt(text);
                    field.css({
                        height: valTemp + 'px',
                        padding: '0px'
                    });
                } else {
                    field.html(text);
                }
            } else {
                data.push({
                    name: '_token',
                    value: $('meta[name="csrf-token"]').attr('content')
                });

                $.post(wrapper.attr('action'), data, function (respon) {
                    if (typeof respon == 'object') {
                        if (respon.status) {
                            if ((typeof el != 'undefined') && el.indexOf('[]') !== -1) {
                                el = el.replace('[]', '');
                            }

                            var htmlRespon = $(respon.html);
                            var dataSettings = htmlRespon.data('settings');
                            $(respon.element).find('[data-settings]').attr('data-settings', JSON.stringify(dataSettings));
                            contentWrapper.find(respon.element + ' [data-fields]').each(function () {
                                var me = $(this),
                                    fields = me.data('fields');

                                if (fields.indexOf(',') !== -1) {
                                    var fieldArr = fields.split(',');
                                } else {
                                    var fieldArr = [fields];
                                }

                                if (fieldArr.includes(el)) {
                                    var htmlEl = htmlRespon.find('[data-fields="' + fields + '"]');
                                    if (htmlEl.length) {
                                        me.html(htmlRespon.find('[data-fields="' + fields + '"]').html());
                                    } else {
                                        me.html('');
                                    }
                                }


                            });

                            //Add css/js
                            if (typeof respon.css !== 'undefined') {
                                for (var i = 0; i < respon.css.length; i++) {
                                    var style = document.createElement('link');
                                    style.rel = 'stylesheet';
                                    style.type = 'text/css';
                                    style.href = respon.css[i]['url'];
                                    document.getElementsByTagName('head')[0].appendChild(style);
                                }
                            }

                            var script_arr = [];
                            if (typeof respon.js !== 'undefined') {
                                for (var i = 0; i < respon.js.length; i++) {
                                    script_arr.push(respon.js[i]['url']);
                                }
                            }
                            if (script_arr.length) {
                                $.getMultiScripts(script_arr).done(function () {
                                    $(document).trigger("builder/" + nameElement);
                                });
                            }
                        }
                    }
                }, 'json');
            }
        },

        initformChange: function () {
            var base = this;

            $(document).on('change', '.bd-form-settings input[type="text"]', function () {
                if ($(this).hasClass('gmz-color-picker')) {
                    base._formChange($(this).closest('form'), $(this).attr('name'), $(this).val(), 'text');
                }
            });

            $(document).on('keyup', '.bd-form-settings input[type="text"]', function () {
                base._formChange($(this).closest('form'), $(this).attr('name'), $(this).val(), 'text');
            });

            $(document).on('keyup', '.bd-form-settings textarea', function () {
                base._formChange($(this).closest('form'), $(this).attr('name'), $(this).val(), 'text');
            });

            $(document).on('change', '.bd-form-settings input[type="checkbox"]', function () {
                if (!$(this).hasClass('for-switcher')) {
                    base._formChange($(this).closest('form'), $(this).attr('name'), $(this).val(), 'checkbox');
                }
            });

            $(document).on('input', '.bd-form-settings input[type="number"]', function () {
                base._formChange($(this).closest('form'), $(this).attr('name'), $(this).val(), 'number');
            });

            $(document).on('change', '.bd-form-settings input[type="hidden"]', function () {
                base._formChange($(this).closest('form'), $(this).attr('name'), $(this).val(), 'hidden');
            });

            $(document).on('change', '.bd-form-settings select', function () {
                base._formChange($(this).closest('form'), $(this).attr('name'), $(this).val(), 'select');
            });
        },

        initBlocks: function () {
            var base = this;
            $(document).ready(function () {
                setTimeout(function () {
                    var blockRender = $('.block-render');
                    if (blockRender.length) {
                        $('.gmz-loader', blockRender).show();
                        var data = {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        };
                        $.post(blockRender.data('action'), data, function (respon) {
                            if (typeof respon == 'object') {
                                blockRender.html(respon.blocks);
                                base.initDragable();
                                $('.gmz-loader', blockRender).fadeOut();
                            }
                        }, 'json');
                    }
                }, 500);
            });
        },

        initDragable: function () {
            var base = this;
            if ($.fn.draggable) {
                $(".__block").draggable({
                    //appendTo: "body",
                    revert: "invalid",
                    stack: ".__block",
                    helper: 'clone'
                });

                $(".__column-inner").droppable({
                    tolerance: "intersect",
                    accept: ".__block",
                    activeClass: "ui-state-default",
                    hoverClass: "ui-state-hover",
                    drop: function (event, ui) {
                        var droppable = $(this);
                        var draggable = ui.draggable;
                        var drag = $('.__column-inner').has(ui.draggable).length ? draggable : draggable.clone().draggable({
                            revert: "invalid",
                            stack: ".__block",
                            helper: 'clone'
                        });

                        if (!drag.hasClass('__block-in-render')) {
                            drag.addClass('__block-in-render');

                            $('#builder-render .__block').removeClass('block-selected');
                            drag.addClass('block-selected');

                            var data = {
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                params: drag.data('params')
                            };

                            $.post($('.block-wrapper').data('action'), data, function (respon) {
                                if (typeof respon == 'object') {
                                    var dragClass = drag.attr('class');
                                    drag.find('.__block__inner').remove();
                                    droppable.find('span').remove();
                                    drag.html(respon.preview);
                                    drag.appendTo(droppable);

                                    //Add css/js
                                    if (typeof respon.css !== 'undefined') {
                                        for (var i = 0; i < respon.css.length; i++) {
                                            var style = document.createElement('link');
                                            style.rel = 'stylesheet';
                                            style.type = 'text/css';
                                            style.href = respon.css[i]['url'];
                                            document.getElementsByTagName('head')[0].appendChild(style);
                                        }
                                    }

                                    var script_arr = [];
                                    if (typeof respon.js !== 'undefined') {
                                        for (var i = 0; i < respon.js.length; i++) {
                                            script_arr.push(respon.js[i]['url']);
                                        }
                                    }
                                    if (script_arr.length) {
                                        $.getMultiScripts(script_arr).done(function () {
                                            window.GmzOption.initDatePicker();
                                            window.GmzOption.initColorPicker();
                                        });
                                    }

                                    $('.block-render').hide();
                                    $('.row-settings').hide();
                                    $('.block-settings').html(respon.editor).show();
                                    base.initMultiLanguages();
                                    window.GmzOption.initFlagTranslation();
                                    window.GmzOption.initSortGallery();
                                    window.GmzOption.initSelect2();
                                    window.GmzOption.initUploadFontIcon();
                                    window.GmzOption._initUploadInputChanged();
                                }
                            }, 'json');
                        } else {
                            $('#builder-render .__block').removeClass('block-selected');
                            drag.addClass('block-selected');

                            drag.find('.__block__inner').remove();
                            droppable.find('span').remove();
                            drag.appendTo(droppable);

                            $('.block-render').hide();
                            $('.row-settings').hide();
                            base.initMultiLanguages();
                        }

                        $('.__block.block-selected').trigger('click');

                        setTimeout(function () {
                            base._initScanBlock();
                        }, 500);
                    }
                });
            }
        },

        _initScanBlock: function () {
            $('.builder__render .__row .__column .__column-inner').each(function () {
                if ($(this).find('.__block').length) {
                    $(this).addClass('has-block');
                } else {
                    $(this).removeClass('has-block');
                    if (!$(this).find('.far.fa-plus').length) {
                        $(this).append('<span><i class="far fa-plus"></i></span>');
                    }
                }
            });
        },

        initSortable: function () {
            if ($('#builder-render').length) {
                var options1 = {
                    handle: 'div.move',
                    items: 'div.__row-wrapper',
                    listType: 'div'
                };

                $('#builder-render').nestedSortable(options1);
                $('#builder-render').disableSelection();

                $(".builder__render .__row").sortable({
                    connectWith: ".connectedSortable"
                });

                $(".builder__render .__row").disableSelection();
            }
        },

        initButtons: function () {
            var base = this;
            $('.gmz-add-row').on('click', function () {
                $('.builder__add-row .__layout').show();
            });
            $('.builder__add-row .__layout .close').on('click', function () {
                $('.builder__add-row .__layout').hide();
            });
            $('.builder__add-row .__layout ul li').on('click', function () {
                var indexLayout = $(this).index();
                var rowID = Math.random().toString(36).substring(7);
                var classRow = 'gmz-' + rowID;
                var cloneLayout = $('#layout-wrapper #layout-' + indexLayout).clone().removeClass('layout-hidden').addClass(classRow).attr('data-id', rowID);
                $('#builder-render').append(cloneLayout);
                base.initSortable();
                base.initDragable();
                $('.builder__add-row .__layout .close').trigger('click');
                $('.block-render').show();
                $('.row-settings').hide();
                $('.block-settings').hide();
                $('.gmz-' + rowID + ' .__row').attr('data-settings', JSON.stringify({sectionID: rowID}));
            });
            $('#builder-render').on('click', '.delete', function () {
                var conf = confirm('Are you sure want to do it?');
                if (conf) {
                    $(this).closest('.__row-wrapper').remove();
                    $('.block-render').show();
                    $('.row-settings').hide();
                    $('.block-settings').hide();
                }
            });
            $('#builder-render').on('click', '.edit', function () {
                var parent = $(this).closest('.__row-wrapper'),
                    row = parent.find('.__row');

                $('.doing-settings').removeClass('doing-settings');
                row.addClass('doing-settings');

                var data = {
                    _token: $('meta[name="csrf-token"]').attr('content')
                };

                $.post($('.row-settings').data('action'), data, function (respon) {
                    if (typeof respon == 'object') {
                        $('.block-render').hide();
                        $('.block-settings').hide();
                        $('.row-settings').html(respon.editor).show();
                        base.initRowSettings();
                    }
                }, 'json');
            });
            $('#builder-render').on('click', '.add-element', function () {
                $('.block-render').show();
                $('.row-settings').hide();
                $('.block-settings').hide();
            });
            $('#builder-render').on('click', '.element-remove', function () {
                var conf = confirm('Are you sure want to do it?');
                if (conf) {
                    $(this).parent().parent().remove();
                    $('.block-render').show();
                    $('.row-settings').hide();
                    $('.block-settings').hide();
                    base._initScanBlock();
                }
            });
            $('#builder-render').on('click', '.__block [data-settings]', function (e) {
                var blockEL = $(this).closest('.__block');
                $('#builder-render .__block').removeClass('block-selected');
                blockEL.addClass('block-selected');
                var data = {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    params: blockEL.attr('data-params'),
                    settings: $(this).attr('data-settings')
                };

                $.post($('.block-wrapper').data('action-edit'), data, function (respon) {
                    if (typeof respon == 'object') {
                        //Add css/js
                        if (typeof respon.css !== 'undefined') {
                            for (var i = 0; i < respon.css.length; i++) {
                                var style = document.createElement('link');
                                style.rel = 'stylesheet';
                                style.type = 'text/css';
                                style.href = respon.css[i]['url'];
                                document.getElementsByTagName('head')[0].appendChild(style);
                            }
                        }

                        var script_arr = [];
                        if (typeof respon.js !== 'undefined') {
                            for (var i = 0; i < respon.js.length; i++) {
                                script_arr.push(respon.js[i]['url']);
                            }
                        }
                        if (script_arr.length) {
                            $.getMultiScripts(script_arr).done(function () {
                                window.GmzOption.initDatePicker();
                                window.GmzOption.initColorPicker();
                            });
                        }

                        $('.block-render').hide();
                        $('.row-settings').hide();
                        $('.block-settings').html(respon.editor).show();
                        base.initMultiLanguages();
                        window.GmzOption.initIconPicker();
                        window.GmzOption.initListItems();
                        window.GmzOption.initFlagTranslation();
                        window.GmzOption.initSortGallery();
                        window.GmzOption.initSelect2();
                        window.GmzOption.initUploadFontIcon();
                        window.GmzOption._initUploadInputChanged();

                    }
                }, 'json');
            });
            $('#builder-render').on('click', '.__column-inner:not(.has-block)', function () {
                $('.block-render').show();
                $('.row-settings').hide();
                $('.block-settings').hide();
            });
        },

        toast: function (data) {
            var toastOptions = {
                timeOut: 1500,
                closeButton: true
            };
            if (!data.status) {
                toastr.error(data.message, '', toastOptions);
            } else {
                toastr.success(data.message, '', toastOptions);
            }
        },
    };

    GmzBuilder.init();
})(jQuery);
//common functionalities for all the javascript featueres
var Survey = {}; // common variable used in all the files of the backend

(function () {

    Survey = {

        Utils: {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

            toggleClass: function (element, className) {

                if (element.classList) {
                    element.classList.toggle(className);
                } else {
                    var classes = element.className.split(' ');
                    var existingIndex = classes.indexOf(className);

                    if (existingIndex >= 0)
                        classes.splice(existingIndex, 1);
                    else
                        classes.push(className);

                    element.className = classes.join(' ');
                }
            },

            /**
             * Get Closest Matching By Selector
             * @param {*} elem
             * @param {*} selector
             */
            getClosest: function (elem, selector) {
                for ( ; elem && elem !== document; elem = elem.parentNode ) {
                    if ( elem.matches( selector ) ) return elem;
                }
                return null;
            },

            addClass: function (element, className) {

                if (element.classList)
                    element.classList.add(className);
                else
                    element.className += ' ' + className;
            },

            removeClass: function (el, className) {

                if (el.classList)
                    el.classList.remove(className);
                else
                    el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
            },

            ajaxrequest: function (url, method, data, csrf, callback) {

                var request = new XMLHttpRequest();
                var loadingIcon = jQuery(".loading");

                if (window.XMLHttpRequest) {
                    // code for modern browsers
                    request = new XMLHttpRequest();
                } else {
                    // code for old IE browsers
                    request = new ActiveXObject("Microsoft.XMLHTTP");
                }
                request.open(method, url, true);

                request.onloadstart = function () {
                    loadingIcon.show();
                };
                request.onloadend = function () {
                    loadingIcon.hide();
                };
                request.setRequestHeader('X-CSRF-TOKEN', csrf);
                request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                if ("post" === method.toLowerCase() || "patch" === method.toLowerCase()) {
                    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
                    data = this.jsontoformdata(data);
                }

                // when request is in the ready state change the details or perform success function
                request.onreadystatechange = function () {
                    if (request.readyState === this.DONE) {
                        // Everything is good, the response was received.
                        request.onload = callback.success(request);
                    }
                };
                request.onerror = callback.error;
                request.send(data);
            },

            setCSRF: function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': this.csrf
                    }
                });
            },

            dtAnchorToForm: function ($parent) {
                $('td:last', $parent).addClass('btn-td');
                $('[data-method]', $parent).append(function () {
                    if (!$(this).find('form').length > 0) {
                        var method = this.getAttribute('data-method'),
                            formName = this.getAttribute('data-form-name') || '';

                        if (method == 'delete') {
                            return "\n<form action='" + $(this).attr('href') + "' method='POST' name='delete_item' style='display:none'>\n" +
                                "<input type='hidden' name='_method' value='" + $(this).attr('data-method') + "'>\n" +
                                "<input type='hidden' name='_token' value='" + $('meta[name="csrf-token"]').attr('content') + "'>\n" +
                                '</form>\n';
                        } else {
                            return "\n<form action='" + $(this).attr('href') + "' method='"+method+"' " + (formName ? "name='"+ formName +"'" : '') + " style='display:none'>\n" +
                                "<input type='hidden' name='_token' value='" + $('meta[name="csrf-token"]').attr('content') + "'>\n" +
                                '</form>\n';
                        }
                    } else { return '' }
                })
                    .attr('href', '#')
                    .attr('style', 'cursor:pointer;');
            },
        },

        JQValidation: {
            /**
            * Handle Validation Errors
            * @param {*} xhr
            * @returns bool
            */
            handleErrors: function(xhr)
            {
                var context     = this,
                    errorClass  = 'error';

                // remove validation error messages
                jQuery('.error').remove();

                if (xhr.status == 422) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        var name = $("input[name='" + key + "']");

                        if (key.indexOf(".") != -1) {
                            var arr = key.split(".");
                            name = $("input[name='" + arr[0] + "[]']:eq(" + arr[1] + ")");
                        }

                        // append validation errors
                        if (name.length > 1) {
                            name.parent().append('<div class=" ' + errorClass + '">' + value[0] + '</div>');
                        }
                        else {
                            name.parent().append('<div class="' + errorClass + '">' + value[0] + '</div>');
                        }
                    });

                    return false;
                }

                if (xhr.status == 403) {

                    context.handleSwalError(xhr.responseJSON.error.message);

                    return false;
                }

                if(xhr.status == 302)
                {
                    context.handleSwalError('Your active session has been expired to process this request.', true);

                    return false;
                }
            },

            handleValidationErrors: function(errors, customContainer = undefined)
            {
                var context     = this,
                    container   = (customContainer) ? customContainer : context.getErrorContainer(),
                    fragment    = new DocumentFragment(),
                    ol          = document.createElement('ol'),
                    closeBtn    = document.createElement('button'),
                    span        = document.createElement('span');

                closeBtn.setAttribute('type', 'button');
                closeBtn.setAttribute('data-dismiss', 'alert');
                closeBtn.setAttribute('aria-label', 'Close');
                closeBtn.classList.add("close");

                span.setAttribute('aria-hidden', 'true');
                span.innerHTML = '&times;';
                closeBtn.appendChild(span);

                fragment.appendChild(closeBtn);

                for (let key in errors)
                {
                    errors[key].forEach(function(value, index, all)
                    {
                        var li = document.createElement('li');
                        li.appendChild(document.createTextNode(value));
                        ol.appendChild(li);
                    });
                }

                fragment.appendChild(ol);

                container.appendChild(fragment);
                container.classList.remove("hidden");
            },

            getErrorContainer: function()
            {
                var context = this;

                if (context.errorContainer == undefined)
                {
                    context.errorContainer = document.getElementById('error_container');
                    context.addResetHandler(context.errorContainer);
                }

                if (!context.errorContainer)
                {
                    throw new Error("Error Container not found.");
                }

                return context.errorContainer;
            },

            resetValidationErrors: function(customContainer = undefined)
            {
                var context     = this,
                    container   = (customContainer) ? customContainer : context.getErrorContainer();

                container.innerHTML = "";
                container.classList.add("hidden");
            },

            addResetHandler: function(element)
            {
                var context = this;

                element.addEventListener('click', function(event)
                {
                    event.stopPropagation();
                    event.preventDefault();

                    if (event.target.closest('button.close'))
                    {
                        context.resetValidationErrors(element);
                    }
                });
            },

            getErrorPlacement: function()
            {
                return function(error, element)
                {
                    var target = element.attr('er-target');

                    error.addClass('invalid-feedback');

                    if (target)
                    {
                        switch(target)
                        {
                            case "after":
                                element.after(error);
                                break;
                            default:
                                var $target = element.closest(target);
                                if ($target.length !== 0) {
                                    $target.append(error);
                                } else {
                                    element.closest('.form-group').append(error);
                                }
                            break;
                        }
                    }
                    else
                    {
                        element.closest('.form-group').append(error);
                    }
                };
            },
        },
    };

})();
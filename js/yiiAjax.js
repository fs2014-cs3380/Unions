yiiFix = {
    ajaxSubmit : {
        beforeSend : function(form){
            return function(xhr,opt){
                form = $(form);
                $._data(form[0], 'events').submit[0].handler();
                var he = form.data('hasError');
                form.removeData('hasError');
                return he===false;
            }
        },
        afterValidate : function(form, data, hasError) {
            $(form).data('hasError', hasError);
            return true;
        }
    }
};
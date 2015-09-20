var ScriptRunner = {
    namespace: {},
    fire: function(func, funcname, args) {
        funcname = (funcname === undefined) ? 'init' : funcname;
        if (func !== '' && this.namespace[func] && typeof this.namespace[func][funcname] === 'function') {
            this.namespace[func][funcname](args);
        }
    },
    loadEvents: function() {
        ScriptRunner.fire('common');

        $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
            ScriptRunner.fire(classnm);
        });
    }
};

import Vue from 'vue';

Vue.directive('ajax', {

    bind() {
        this.el.addEventListener('submit', this.onFormSubmit.bind(this));
    },

    onFormSubmit(e) {
        e.preventDefault();
        var formData = new FormData(document.querySelector('form'))
        console.log(formData);
        this.vm
            .$http[this.getRequestType()](this.el.action, formData)
            .then(this.onComplete.bind(this));
    },

    getRequestType() {
        var method = this.el.querySelector('input[name="_method"]');

        return (method ? method.value : this.el.method).toLowerCase();
    },

    onComplete() {
        //Do stuff (send a flash message)
    }
});

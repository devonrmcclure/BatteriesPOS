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
            // If there is a hidden form field that has the api_token, it *should* work fine.
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

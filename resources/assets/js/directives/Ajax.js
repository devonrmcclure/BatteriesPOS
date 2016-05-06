import Vue from 'vue';

Vue.directive('ajax', {
    bind() {
        this.el.addEventListener('submit', this.onFormSubmit.bind(this));
    },

    update(value) {

    },

    onFormSubmit(e) {
        e.preventDefault();

        this.vm
            .$http[this.getRequestType()](this.el.action)
            .then(this.onComplete.bind(this));
    },

    getRequestType() {
        var method = this.el.querySelector('input[name="_method"]');

        return (method ? method.value : this.el.method).toLowerCase();
    },

    onComplete() {
        alert('Complete');
    }
});

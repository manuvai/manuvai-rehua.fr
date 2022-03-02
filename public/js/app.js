$(() => {

    new Vue({
        'el': '[data-app="contact"]',
        data: {
            name: '',
            email: '',
            message: '',
            errors: {
                name: '',
                email: '',
                message: '',
            },
            form_states: {
                message_sent: false,
                message_sending: false,
            }
        },
        methods: {
            submitContactForm(e = false) {
                if (e) {
                    e.preventDefault();
                }
                let _app = this;
                $(e.target).ajaxSubmit({
                    url: $(e.target).attr('action'),
                    type: $(e.target).attr('method'),
                    dataType: 'json',
                    beforeSend() {
                        _app.errors = [];
                        _app.form_states.message_sending = true;
                    },
                    success(data) {
                        _app.form_states.message_sent = true;

                    },
                    error(data) {
                        _app.errors = data.responseJSON.errors;
                    },
                    complete() {
                        _app.form_states.message_sending = false;

                    }
                })
            }
        }
    })
})

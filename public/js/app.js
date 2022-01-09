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
                messagef: '',
            },
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
                    success(data) {
                        console.log(data)

                    },
                    error(data) {
                        _app.errors = data.responseJSON.errors;
                    }
                })
            }
        }
    })
})

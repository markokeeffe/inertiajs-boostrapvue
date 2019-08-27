import _ from 'lodash'

export default {
    data() {
        return {
            sending: false,
            route: '',
            formData: {},
        }
    },
    methods: {
        formGroupState(field) {
            return !_.isEmpty(this.formGroupErrors(field)) ? 'invalid' : null
        },
        formGroupErrors(field) {
            return _.join(_.get(this.$page.errors, field, []), ', ')
        },
        submit() {
            this.sending = true
            this.$inertia.post(this.$laroute.route(this.route), this.formData)
                .then(() => this.sending = false)
        },
    },
}

<template>
    <SharedLayout>
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Reset Password</div>

                        <div class="card-body">
                            <b-form @submit.prevent="submit">

                                <b-form-row>
                                    <b-col cols="10">

                                        <b-form-group
                                            id="email"
                                            label="E-Mail Address"
                                            label-for="email_input"
                                            label-cols="5"
                                            label-align="right"
                                            :state="formGroupState('email')"
                                            :invalid-feedback="formGroupErrors('email')"
                                        >
                                            <b-form-input
                                                id="email_input"
                                                v-model="formData.email"
                                                type="email"
                                                required
                                                autofocus
                                            ></b-form-input>
                                        </b-form-group>

                                        <b-form-group
                                            id="password"
                                            label="Password"
                                            label-for="password_input"
                                            label-cols="5"
                                            label-align="right"
                                            :state="formGroupState('password')"
                                            :invalid-feedback="formGroupErrors('password')"
                                        >
                                            <b-form-input
                                                id="password_input"
                                                v-model="formData.password"
                                                type="password"
                                                required
                                                autofocus
                                            ></b-form-input>
                                        </b-form-group>

                                        <b-form-group
                                            id="password_confirmation"
                                            label="Password Confirmation"
                                            label-for="password_confirmation_input"
                                            label-cols="5"
                                            label-align="right"
                                            :state="formGroupState('password_confirmation')"
                                            :invalid-feedback="formGroupErrors('password_confirmation')"
                                        >
                                            <b-form-input
                                                id="password_confirmation_input"
                                                v-model="formData.password_confirmation"
                                                type="password"
                                                required
                                                autofocus
                                            ></b-form-input>
                                        </b-form-group>

                                        <b-form-row>
                                            <b-col offset="5">
                                                <b-button variant="primary" type="submit" :disabled="sending">
                                                    Reset Password
                                                </b-button>
                                            </b-col>
                                        </b-form-row>

                                    </b-col>
                                </b-form-row>

                            </b-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </SharedLayout>
</template>

<script>
    import FormMixin from '@/mixins/FormMixin'

    export default {
        name: 'AuthResetPassword',
        mixins: [FormMixin],
        props: {
            token: String,
            email: String,
        },
        data() {
            return {
                route: '/password/reset',
                formData: {
                    token: this.token,
                    email: this.email,
                    password: '',
                    password_confirmation: '',
                },
            }
        },
    }
</script>

<template>
    <SharedLayout>
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Login</div>

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

                                        <b-form-row class="mb-4">
                                            <b-col cols="6" offset="5">
                                                <b-form-checkbox
                                                    id="remember"
                                                    v-model="formData.remember"
                                                    name="remember"
                                                >
                                                    Remember Me
                                                </b-form-checkbox>
                                            </b-col>
                                        </b-form-row>

                                        <b-form-row>
                                            <b-col offset="5">
                                                <b-button variant="primary" type="submit" :disabled="sending">
                                                    Login
                                                </b-button>

                                                <a class="btn btn-link" :href="$laroute.route('password.request')">
                                                    Forgot Your Password?
                                                </a>
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
        name: 'AuthLogin',
        mixins: [FormMixin],
        data() {
            return {
                route: '/login',
                formData: {
                    email: '',
                    password: '',
                    remember: true,
                },
            }
        },
    }
</script>

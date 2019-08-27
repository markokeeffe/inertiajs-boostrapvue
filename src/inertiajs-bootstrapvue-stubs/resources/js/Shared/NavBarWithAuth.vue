<template>
    <div>
        <b-navbar toggleable="md" type="dark" variant="primary">
            <b-container>
                <b-navbar-brand href="/">Inertia.js & BootstrapVue</b-navbar-brand>

                <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

                <b-collapse id="nav-collapse" is-nav>
                    <b-navbar-nav>
                        <li class="nav-item">
                            <inertia-link class="nav-link" href="/">
                                Home
                            </inertia-link>
                        </li>
                    </b-navbar-nav>

                    <!-- Right aligned nav items -->
                    <b-navbar-nav class="ml-auto">
                        <b-nav-item right v-if="!$page.auth.user" router-tag="inertia-link" href="/login">
                            Login
                        </b-nav-item>

                        <b-nav-item-dropdown right v-if="$page.auth.user">
                            <!-- Using 'button-content' slot -->
                            <template slot="button-content"><em>{{ $page.auth.user.name }}</em></template>

                            <b-dropdown-item @click="logOut">Sign Out</b-dropdown-item>
                        </b-nav-item-dropdown>
                    </b-navbar-nav>
                </b-collapse>
            </b-container>
        </b-navbar>
    </div>
</template>

<script>
    import { InertiaLink } from '@inertiajs/inertia-vue'

    export default {
        name: 'NavBar',
        components: {
            InertiaLink,
        },
        methods: {
            logOut() {
                this.$inertia.post('/logout')
            },
        },
    }
</script>

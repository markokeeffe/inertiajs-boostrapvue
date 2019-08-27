<template>
    <div>
        <b-navbar toggleable="md" type="dark" variant="primary">
            <b-container>
                <b-navbar-brand href="/">Inertia.js & BootstrapVue</b-navbar-brand>

                <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

                <b-collapse id="nav-collapse" is-nav>
                    <li class="nav-item">
                        <inertia-link class="nav-link" href="/">
                            Home
                        </inertia-link>
                    </li>
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
    }
</script>

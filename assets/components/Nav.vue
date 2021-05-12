<template>
    <div>
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <img src="/assets/img/OueriseBlanc.png"  alt="logo" class="logo">
                <a href="/" class="navbar-brand">
                    <h1>Ouerise</h1>
                </a>
                <form class="d-flex input-group w-auto">
                    <input type="search" class="form-control" placeholder="Recherche" aria-label="Search" />
                    <button class="btn btn-outline button" type="button" data-mdb-ripple-color="dark">
                        Recherche
                    </button>
                </form>
            </div>
        </nav>
    </div>
</template>

<script>
    export default {
        name: "Nav",
        data() { return {} },

        mounted() {},

        methods: {},
    };
</script>

<style></style>



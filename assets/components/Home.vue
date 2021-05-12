<template>
    <div>
        <section class="container">
            <div class="row">
                <div class="p-5 rectangle" v-for="location in locations">
                    <div class="texte">
                        <div class="col-12 d-flex">
                            <div class="col-9">
                                <a :href="'/lieu/' + location.id " class="nav-link">
                                    <h3>{{ location.name }}</h3>
                                </a>
                                <p class="p-3">{{ location.description }}</p>
                            </div>
                            <div class="col-3">
                                <a :href="'/lieu/'+ location.id ">
                                    <img class="img-fluid dim ms-4"
                                         :src="'/assets/img/' + location.img "
                                         alt="Image du lieu"
                                    />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>

export default {
    name: "Home",

    data() { return { locations: [] }; },

    created() { this.fetchInfos() },

    methods: {
        fetchInfos() {
            fetch("/index_json")
                .then(res => res.json())
                .then(res => {
                    this.locations = res.datas
                })
        }
    },
};

</script>

<style></style>

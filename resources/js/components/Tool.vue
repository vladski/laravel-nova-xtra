<template>
    <loading-view :loading="initialLoading">
        <div v-html="content" style="min-height: 150px;"></div>
    </loading-view>
</template>

<script>
export default {
    props: ['slug'],
    data: () => ({
        initialLoading: true,
        loading: true,
        content: '',
        query: {},
    }),
    watch: {
        slug: function (newSlug, oldSlug) {
            if (newSlug != oldSlug) {
                this.initializeComponent()
            }
        },
        '$route.query': function (newQuery) {
            this.initializeComponent()
        }
    },
    created() {
        //
        //console.log('created');
        //this.query = this.$route.query
    },
    destroyed() {
        //
    },
    mounted() {
        this.initializeComponent()
        // console.log('mounted', Nova.xtra);
    },
    methods: {
        async initializeComponent() {
            await this.getPageContent()
            this.initialLoading = false
        },
        getPageContent() {
            this.content = ''
            return Nova.request()
                .get('/nova-vendor/vladski/nova-xtra/page/' + this.slug, {params: this.$route.query} )
                .then((response) => {
                    this.content = response.data
                    this.loading = false
                })
                .catch(error => {
                    if (error.response.status >= 500) {
                        Nova.$emit('error', error.response.data.message)
                        return
                    }

                    if (error.response.status === 404 && this.initialLoading) {
                        this.$router.push({ name: '404' })
                        return
                    }

                    if (error.response.status === 403) {
                        this.$router.push({ name: '403' })
                        return
                    }

                    Nova.error(this.__('This page no longer exists'))
                })
        },
    }
}
</script>

<style>
/* Scoped Styles */
</style>

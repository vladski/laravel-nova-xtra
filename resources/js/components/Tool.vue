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
    }),
    watch: {
        slug: function (newSlug, oldSlug) {
            if (newSlug != oldSlug) {
                this.initializeComponent()
            }
        },
    },
    created() {
        //
        //console.log('created');
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
            return Nova.request().get('/nova-vendor/vladski/nova-xtra/page/' + this.slug)
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

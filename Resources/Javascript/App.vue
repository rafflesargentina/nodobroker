<template>
  <div id="app">
    <div class="site-wrap">
      <PageHeader />
      <RouterView />
      <PageFooter v-if="false !== $route.meta.footer" />
    </div>
    <vue-snotify />
  </div>
</template>

<script>
import AOS from "aos"

export default {
    name: "App",

    created() {
        AOS.init({
            duration: 800,
            easing: "slide",
            once: true
        })
    },

    mounted() {
        return this.loaderPage()
    },

    methods: {
        loaderPage() {
            return window.$(".site-loader").fadeOut("slow")
        }
    },
}
</script>

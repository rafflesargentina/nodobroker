<style>
.fade-enter-active, .fade-leave-active {
  transition: opacity .25s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>

<template>
  <div class="main account bg-light">
    <aside
      id="sidebar"
      class="sidebar sidebar--dark collapsed"
    >
      <a
        class="sidebar__toggler sidebar__toggler--dark"
        href="#"
        role="button"
        @click="toggle"
      >
        <span class="icon-bars" />
      </a>
      <nav class="sidebar-nav">
        <h4 class="sidebar-nav-header">
          Admin
        </h4>
        <ul class="sidebar-nav__list">
          <li class="sidebar-nav__item sidebar-nav__item--dark">
            <RouterLink 
              :to="{ name: 'AdminProjectsIndex' }"
              class="sidebar-nav__link sidebar-nav__link--dark"
            >
              Proyectos
            </RouterLink>
          </li>
          <li class="sidebar-nav__item sidebar-nav__item--dark">
            <RouterLink
              :to="{ name: 'AdminBrokersIndex' }"
              class="sidebar-nav__link sidebar-nav__link--dark"
            >
              Brokers
            </RouterLink>
          </li>
        </ul>
      </nav>
    </aside>
    <div
      id="main-inner"
      class="main-inner"
    >
      <Transition 
        name="fade" 
        mode="out-in"
      >
        <KeepAlive>
          <RouterView />
        </KeepAlive>
      </Transition>
    </div>
  </div>
</template>

<script>

export default {
    mounted() {
        window.$(".site-navbar").removeClass("mt-4").addClass("position-relative bg-dark")
    },

    beforeDestroy() {
        window.$(".site-navbar").removeClass("position-relative bg-dark").addClass("mt-4")
    },

    methods: {
        toggle() {
            window.$("#sidebar").toggleClass("collapsed")
            window.$("#main-inner").toggleClass("pushed")
        }
    }
}
</script>

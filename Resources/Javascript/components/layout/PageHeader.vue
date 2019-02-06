<template>
  <div>
    <div
      class="site-mobile-menu"
      style="display:none;right:330px;"
    >
      <div class="site-mobile-menu-header">
        <div
          class="site-mobile-menu-close mt-3"
          @click="hideMobileMenu"
        >
          <span class="icon-close2 js-menu-toggle" />
        </div>
      </div>
      <div class="site-mobile-menu-body" />
    </div>

    <div class="site-navbar mt-4">
      <div class="container-fluid py-1">
        <div class="row align-items-center">
          <div class="col-8 col-lg-3">
            <h3 class="pl-5 mb-0 text-nowrap">
              <RouterLink
                :to="{ name: 'Home' }"
                class="text-white mb-0"
              >
                <strong>
                  NODO<span class="text-danger">
                    BROKER
                  </span>
                </strong>
              </RouterLink>
            </h3>
          </div>

          <div class="col-2 col-lg-6 text-center text-nowrap">
            <nav
              class="site-navigation pr-5"
              role="navigation"
            >
              <ul class="site-menu js-clone-nav d-none d-lg-inline-block">
                <li class="active">
                  <RouterLink :to="{ name: 'Home' }">
                    Home
                  </RouterLink>
                </li>
                <li>
                  <RouterLink :to="{ name: 'About' }">
                    Nosotros
                  </RouterLink>
                </li>
                <li>
                  <RouterLink :to="{ name: 'Developers' }">
                    Developers
                  </RouterLink>
                </li>
                <li>
                  <RouterLink :to="{ name: 'Brokers' }">
                    Brokers
                  </RouterLink>
                </li>
                <li>
                  <RouterLink :to="{ name: 'Contact' }">
                    Contacto
                  </RouterLink>
                </li>
              </ul>
            </nav>
          </div>
          <div class="col-2 col-lg-3  py-3 text-center">
            <nav
              class="site-navigation"
              role="navigation"
            >
              <a
                class="d-inline-block d-lg-none js-menu-toggle site-menu-toggle text-white"
                @click="showMobileMenu"
              >
                <span class="icon-menu h3" />
              </a>
              <ul class="site-menu js-clone-nav d-none d-lg-inline-block">
                <li>
                  <RouterLink
                    v-if="!isAuthenticated"
                    :to="{ name: 'Login' }"
                  >
                    Login
                  </RouterLink>
                  <RouterLink
                    v-if="isAuthenticated && isAdmin"
                    :to="{ name: 'Admin' }"
                  >
                    Admin
                  </RouterLink>
                  <RouterLink
                    v-if="isAuthenticated"
                    :to="{ name: 'Logout' }"
                  >
                    Cerrar sesión
                  </RouterLink>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { authComputed } from "@/store/helpers"
import { projectsComputed } from "../../store/helpers"

export default {
    name: "PageHeader",

    computed: {
        ...projectsComputed,
        ...authComputed,
    },

    mounted() {
        return this.siteMenuClone()
    },

    methods: {
        hideMobileMenu() {
            return window.$(".site-mobile-menu").hide()
        },

        showMobileMenu() {
            return window.$(".site-mobile-menu").show()
        },

        siteMenuClone() {
            window.$(".js-clone-nav").each(function() {
                var $this = window.$(this)
                $this.clone().attr("class", "site-nav-wrap").appendTo(".site-mobile-menu-body")
            })

            setTimeout(function() {
			
                var counter = 0
                window.$(".site-mobile-menu .has-children").each(function(){
                    var $this = window.$(this)
        
                    $this.prepend("<span class=\"arrow-collapse collapsed\">")

                    $this.find(".arrow-collapse").attr({
                        "data-toggle" : "collapse",
                        "data-target" : "#collapseItem" + counter,
                    })

                    $this.find("> ul").attr({
                        "class" : "collapse",
                        "id" : "collapseItem" + counter,
                    })

                    counter++

                })

            }, 1000)

            window.$("body").on("click", ".arrow-collapse", function(e) {
                var $this = window.$(this)
                if ( $this.closest("li").find(".collapse").hasClass("show") ) {
                    $this.removeClass("active")
                } else {
                    $this.addClass("active")
                }
                e.preventDefault()  
      
            })

        }
    }
}
</script>

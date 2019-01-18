<template>
  <div>
    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle" />
        </div>
      </div>
      <div class="site-mobile-menu-body" />
    </div> <!-- .site-mobile-menu -->

    <div class="site-navbar mt-4">
      <div class="container py-1">
        <div class="row align-items-center">
          <div class="col-8 col-md-8 col-lg-4">
            <h1 class="mb-0">
              <router-link
                :to="{ name: 'Home' }"
                class="text-white h2 mb-0"
              >
                <strong>
                  NODO<span class="text-danger">
                    BROKER
                  </span>
                </strong>
              </router-link>
            </h1>
          </div>
          <div class="col-4 col-md-4 col-lg-8">
            <nav
              class="site-navigation text-right text-md-right"
              role="navigation"
            >
              <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3">
                <a
                  href="#"
                  class="site-menu-toggle js-menu-toggle text-white"
                >
                  <span class="icon-menu h3" />
                </a>
              </div>

              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="active">
                  <router-link :to="{ name: 'Home' }">
                    Home
                  </router-link>
                </li>
                <li>
                  <router-link :to="{ name: 'About' }">
                    Nosotros
                  </router-link>
                </li>
                <li>
                  <router-link :to="{ name: 'Developers' }">
                    Developers
                  </router-link>
                </li>
                <li>
                  <router-link :to="{ name: 'Brokers' }">
                    Brokers
                  </router-link>
                </li>
                <li>
                  <router-link :to="{ name: 'Contact' }">
                    Contacto
                  </router-link>
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
import { projectsComputed } from "../../store/helpers"

export default {
    name: "PageHeader",

    computed: {
        ...projectsComputed
    },

    mounted() {
        return this.siteMenuClone()
    },

    methods: {
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

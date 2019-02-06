<template>
  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="mb-5">
            <h3 class="footer-heading mb-4">
              Contacto
            </h3>
            <ul class="list-unstyled text-white">
              <li><span class="icon-room pr-2" />Buenos Aires, Argentina</li>
              <li><span class="icon-phone pr-2" />+54 11 2093-1137</li>
              <li>
                <span class="icon-envelope pr-2" /><a
                  class="text-white"
                  href="mailto:info@nodobroker.com"
                >
                  info@nodobroker.com
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 mb-5 mb-lg-0">
          <div class="row mb-5">
            <div class="col-md-12">
              <h3 class="footer-heading mb-4">
                NODO BROKER
              </h3>
            </div>
            <div class="col-md-6 col-lg-6">
              <ul class="list-unstyled">
                <li>
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
                  <router-link :to="{ name: 'Contact' }">
                    Contacto
                  </router-link>
                </li>
              </ul>
            </div>
            <div class="col-md-6 col-lg-6">
              <ul class="list-unstyled">
                <li>
                  <RouterLink
                    v-if="!isAuthenticated"
                    :to="{ name: 'Login' }"
                  >
                    Login
                  </RouterLink>
                  <RouterLink
                    v-if="isAuthenticated"
                    :to="{ name: 'Admin' }"
                  >
                    Admin
                  </RouterLink>
                </li>
                <li>
                  <a href="#">
                    Términos legales
                  </a>
                </li>
                <li>
                  <a href="#">
                    Política de privacidad
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-lg-4 mb-5 mb-lg-0">
          <h3 class="footer-heading mb-4">
            SOBRE NODO BROKER
          </h3>

          <p class="text-white">
            NODO BROKER es la primera plataforma de la región con foco en el armado de los canales de comercialización directa para asistir a los desarrollistas o promotores inmobiliarios a vender sus proyectos en distintas etapas.  ampliando su canal de ventas entre todos los brokers previamente acreditados. Esta plataforma esta abierta a todo desarrollo que desee divulgar sus negocios o inversiones, con el apoyo de la tecnología y el marketing en real estate.
          </p>

          <div>
            <a
              href="#"
              class="pl-0 pr-3"
            >
              <span class="icon-facebook" />
            </a>
            <a
              href="#"
              class="pl-3 pr-3"
            >
              <span class="icon-twitter" />
            </a>
            <a
              href="#"
              class="pl-3 pr-3"
            >
              <span class="icon-instagram" />
            </a>
            <a
              href="#"
              class="pl-3 pr-3"
            >
              <span class="icon-linkedin" />
            </a>
          </div>
        </div>
      </div>
      <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
          <p>&copy; 2018-2019 Nodo Broker. Todos los derechos reservados.</p>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
import { authComputed } from "@/store/helpers"

export default {
    name: "PageFooter",

    computed: {
        ...authComputed
    }
}
</script>

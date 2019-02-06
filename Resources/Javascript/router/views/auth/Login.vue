<template>
  <div
    class="main auth bg-light"
  >
    <div class="auth-inner">
      <h4 class="main-header">
        Ingresá a tu cuenta
      </h4>
      <p>
        Para conseguir acceso complete el siguiente formulario aquí: <a href="mailto:admin@nodobroker.com">
          admin@nodobroker.com
        </a>
      </p>
      <main class="card">
        <section class="card-body">
          <LoginForm
            :action="'/login'"
            :method="'post'"
          />
        </section>
      </main>
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
    }
}
</script>

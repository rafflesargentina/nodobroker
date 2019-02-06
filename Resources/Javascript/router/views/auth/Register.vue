<template>
  <div
    class="main auth bg-light"
  >
    <div class="auth-inner">
      <h4 class="main-header">
        Registrate
      </h4>
      <main class="card">
        <section class="card-body">
          <RegisterForm
            :action="'/register'"
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

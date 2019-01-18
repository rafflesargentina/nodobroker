<template>
  <div>
    <div
      class="site-blocks-cover inner-page-cover overlay"
      style="background-image: url(/images/hero_bg_2.jpg);"
      data-aos="fade"
      data-stellar-background-ratio="0.5"
    >
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">
              CONTACTO
            </h1>
          </div>
        </div>
      </div>
    </div>
    

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8 mb-5">
            <form
              :class="[validated ? 'needs-validation' : 'needs-validation']"
              action="/contact"
              class="p-5 bg-white border"
              method="POST"
              novalidate
              @submit.prevent="submitForm"
              @keydown="form.errors.clear($event.target.name)"
            >
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label
                    class="font-weight-bold"
                    for="name"
                  >
                    Nombre completo
                  </label>
                  <input
                    id="name"
                    v-model="form.name"
                    :class="{ 'is-invalid': form.errors.has('name') }"
                    type="text"
                    class="form-control"
                    placeholder="Nombre completo"
                  >
                  <span
                    v-if="form.errors.has('name')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('name')" />
                  </span>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label
                    class="font-weight-bold"
                    for="email"
                  >
                    Email
                  </label>
                  <input
                    id="email"
                    v-model="form.email"
                    :class="{ 'is-invalid': form.errors.has('email') }"
                    type="email"
                    class="form-control"
                    placeholder="Email"
                  >
                  <span
                    v-if="form.errors.has('email')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('email')" />
                  </span>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label
                    class="font-weight-bold"
                    for="subject"
                  >
                    Asunto
                  </label>
                  <input
                    id="subject"
                    v-model="form.subject"
                    :class="{ 'is-invalid': form.errors.has('subject') }"
                    type="text"
                    class="form-control"
                    placeholder="Asunto"
                  >
                  <span
                    v-if="form.errors.has('subject')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('subject')" />
                  </span>
                </div>
              </div>
              

              <div class="row form-group">
                <div class="col-md-12">
                  <label
                    class="font-weight-bold"
                    for="message"
                  >
                    Mensaje
                  </label> 
                  <textarea
                    id="message"
                    v-model="form.message"
                    :class="{ 'is-invalid': form.errors.has('message') }"
                    name="message"
                    cols="30"
                    rows="5"
                    class="form-control"
                    placeholder="Escríbanos"
                  />
                  <span
                    v-if="form.errors.has('message')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('message')" />
                  </span>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input
                    type="submit"
                    value="Enviar mensaje"
                    class="btn btn-primary  py-2 px-4 rounded-0"
                  >
                </div>
              </div>
            </form>
          </div>

          <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class="h6 text-black mb-3 text-uppercase">
                Información de contacto
              </h3>
              <p class="mb-0 font-weight-bold">
                Dirección
              </p>
              <p class="mb-4">
                Honduras 5550, Palermo, Bs As, Argentina.
              </p>

              <p class="mb-0 font-weight-bold">
                Teléfono 
              </p>
              <p class="mb-4">
                <a href="phone:+55 9 11 0022-2200">
                  +55 9 11 0022-2200
                </a>
              </p>

              <p class="mb-0 font-weight-bold">
                Email
              </p>
              <p class="mb-0">
                <a href="mailto:info@nodobroker.com">
                  info@nodobroker.com
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Form from "@/utilities/Form"

let fields = {
    email: "",
    message: "",
    name: "",
    subject: "",
}

export default {
    data() {
        return {
            form: new Form(fields),
            submitted: false
        }
    },

    computed: {
        validated() {
            return this.form.errors.any()
        }
    },

    methods: {
        submitForm() {
            this.submitted = true

            this.$snotify.async("Procesando...", ()=> new Promise((resolve, reject) => {
                this.form.post("/contact")
                    .then(response => {
                        resolve({
                            body: "Tue mensaje fue enviado correctamente.",
                            config: {
                                closeOnClick: true,
                                showProgressBar: true,
                                timeout: 5000
                            }
                        })

                        return this.$router.push({ path: response.redirect })
                    })
                    .catch(error => {
                        this.submitted = false

                        let message = error.status > 422 ? error.data.message : "Ups..."

                        return reject({
                            body: message,
                            config: {
                                closeOnClick: true,
                                showProgressBar: true,
                                timeout: 2000
                            }
                        })
                    })
            })
            )
        },
    },
}
</script>

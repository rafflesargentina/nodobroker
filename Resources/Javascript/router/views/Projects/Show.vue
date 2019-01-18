<template>
  <div>
    <carousel
      :per-page="1"
    >
      <slide
        v-for="photo in oneProject.unfeatured_photos"
        :key="photo.id"
      >
        <div
          class="site-blocks-cover overlay"
          :style="'background-image: url(' + photo.url + ');'"
        >
          <div class="container">
            <div class="row align-items-center justify-content-center text-center text-white">
              <div class="col-md-10">
                <h3 class="mb-2">
                  {{ oneProject.location }}
                </h3>
                <h1 class="display-3">
                  {{ oneProject.name }}
                </h1>
              </div>
            </div>
          </div>
        </div>
      </slide>
    </carousel>

    <div class="site-section site-section-sm">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <carousel :per-page="1">
              <slide
                v-for="photo in oneProject.unfeatured_photos"
                :key="photo.id"
                :per-page="1"
              >
                <img
                  :src="photo.url"
                  alt="Image"
                  class="img-fluid"
                >
              </slide>
            </carousel>
            <div class="bg-white property-body border-bottom border-left border-right">
              <ul
                id="project-tabs"
                class="nav nav-tabs nav-justified mb-4"
                role="tablist"
              >
                <li class="nav-item">
                  <a
                    id="description-tab"
                    aria-controls="description"
                    aria-selected="true"
                    class="nav-link active"
                    data-toggle="tab"
                    href="#description"
                  >
                    Proyecto
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    id="place-tab"
                    aria-controls="place"
                    aria-selected="false"
                    class="nav-link"
                    data-toggle="tab"
                    href="#place"
                  >
                    Lugar
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    id="investment-tab"
                    aria-controls="investment"
                    aria-selected="false"
                    class="nav-link"
                    data-toggle="tab"
                    href="#investment"
                  >
                    Inversión
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    id="resume-tab"
                    aria-controls="resume"
                    aria-selected="false"
                    class="nav-link"
                    data-toggle="tab"
                    href="#resume"
                  >
                    Detalle
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    id="entertainment-tab"
                    aria-controls="entertainment"
                    aria-selected="false"
                    class="nav-link"
                    data-toggle="tab"
                    href="#entertainment"
                  >
                    Entretenimiento
                  </a>
                </li>
              </ul>

              <div
                id="project-tabs-content"
                class="tab-content"
              >
                <div
                  id="description"
                  class="tab-pane fade show active"
                  role="tabpanel"
                  aria-labelledby="description-tab"
                  v-html="oneProject.description"
                />
                <div
                  id="place"
                  class="tab-pane fade"
                  role="tabpanel"
                  aria-labelledby="place-tab"
                  v-html="oneProject.place"
                />
                <div
                  id="investment"
                  class="tab-pane fade"
                  role="tabpanel"
                  aria-labelledby="investment-tab"
                  v-html="oneProject.investment"
                />
                <div
                  id="resume"
                  class="tab-pane fade"
                  role="tabpanel"
                  aria-labelledby="investment-tab"
                  v-html="oneProject.resume"
                />
                <div
                  id="entertainment"
                  class="tab-pane fade"
                  role="tabpanel"
                  aria-labelledby="investment-tab"
                  v-html="oneProject.entertainment"
                />
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="bg-white widget border rounded">
              <h3 class="h4 text-black widget-title mb-3">
                Contáctenos
              </h3>
              <form
                :class="[validated ? 'needs-validation' : 'needs-validation']"
                action="/contact"
                class="form-contact-agent"
                method="POST"
                novalidate
                @submit.prevent="submitForm"
                @keydown="form.errors.clear($event.target.name)"
              >
                <div class="form-group">
                  <label for="name">
                    Nombre completo
                  </label>
                  <input
                    id="name"
                    v-model="form.name"
                    :class="{ 'is-invalid': form.errors.has('name') }"
                    type="text"
                    class="form-control"
                  >
                  <span
                    v-if="form.errors.has('name')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('name')" />
                  </span>
                </div>
                <div class="form-group">
                  <label for="email">
                    Email
                  </label>
                  <input
                    id="email"
                    v-model="form.email"
                    :class="{ 'is-invalid': form.errors.has('email') }"
                    type="email"
                    class="form-control"
                  >
                  <span
                    v-if="form.errors.has('email')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('email')" />
                  </span>
                </div>
                <div class="form-group">
                  <label for="phone">
                    Teléfono
                  </label>
                  <input
                    id="phone"
                    v-model="form.phone"
                    :class="{ 'is-invalid': form.errors.has('phone') }"
                    type="text"
                    class="form-control"
                  >
                  <span
                    v-if="form.errors.has('phone')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('phone')" />
                  </span>
                </div>
                <div class="form-group">
                  <input
                    id="phone"
                    type="submit"
                    class="btn btn-primary"
                    value="Contactar"
                  >
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { projectsComputed, projectsMethods } from "../../../store/helpers"
import Form from "@/utilities/Form"

let fields = {
    email: "",
    message: "Mensaje enviado desde [" + window.location.href + "]",
    name: "",
    phone: "",
}

export default {
    data() {
        return {
            form: new Form(fields),
            submitted: false
        }
    },

    computed: {
        ...projectsComputed,

        validated() {
            return this.form.errors.any()
        }
    },

    watch: {
        "$route" (value) {
            if (value.name === "ProjectsShow") {
                return this.fetchOneProject(value.params.id)
            }
        }
    },

    created() {
        var id = this.$route.params.id
        this.fetchOneProject(id)
    },

    methods: {
        ...projectsMethods,

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

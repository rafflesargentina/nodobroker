<style lang="scss">
.vue-dropzone {
  height: 100%;
}
</style>

<template>
  <div>
    <form 
      :class="[validated ? 'needs-validation' : 'needs-validation']"
      :action="action"
      :method="method"
      novalidate
      @submit.prevent="submitForm" 
      @keydown="form.errors.clear($event.target.name)"
    >
      <ul
        id="broker-pills"
        class="nav nav-pills mb-3"
        role="tablist"
      >
        <li class="nav-item">
          <a
            id="main-tab"
            aria-controls="main"
            aria-selected="true"
            class="nav-link active"
            data-toggle="tab"
            href="#main"
          >
            Principal
          </a>
        </li>
        <li class="nav-item">
          <a
            id="assigned-projects-tab"
            aria-controls="assigned-projects"
            aria-selected="false"
            class="nav-link"
            data-toggle="tab"
            href="#assigned-projects"
          >
            Proyectos asignados
          </a>
        </li>
      </ul>

      <div class="card">
        <div
          id="broker-pills-content"
          class="border-left border-right tab-content"
        >
          <div
            id="main"
            class="card-body tab-pane fade show active"
            role="tabpanel"
            aria-labelledby="main-tab"
          >
            <div class="row">
              <div class="col-sm-6 form-group">
                <label for="first_name">
                  Nombre *
                </label>
                <input
                  v-model="form.first_name"
                  :class="{ 'is-invalid': form.errors.has('first_name') }"
                  class="form-control"
                  name="first_name"
                  placeholder="Nombre"
                  type="text"
                >
                <span
                  v-if="form.errors.has('first_name')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="form.errors.get('first_name')" />
                </span>
              </div>

              <div class="col-sm-6 form-group">
                <label for="last_name">
                  Apellido
                </label>
                <input
                  v-model="form.last_name"
                  :class="{ 'is-invalid': form.errors.has('last_name') }"
                  class="form-control"
                  name="last_name"
                  placeholder="Nombre"
                  type="text"
                >
                <span
                  v-if="form.errors.has('last_name')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="form.errors.get('last_name')" />
                </span>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-12">
                <div class="form-group">
                  <label for="email">
                    Email *
                  </label>
                  <input
                    v-model="form.email"
                    :class="{ 'is-invalid': form.errors.has('email') }"
                    class="form-control"
                    name="email"
                    placeholder="Email"
                    type="email"
                    @keyup="form.slug = updateSlug($event.target.value)"
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
                  <label for="slug">
                    Identificador amistoso
                  </label>
                  <input
                    v-model="form.slug"
                    v-slugify
                    :class="{ 'is-invalid': form.errors.has('slug') }"
                    class="form-control"
                    name="slug"
                    placeholder="Identificador amistoso"
                    type="text"
                  >
                  <span
                    v-if="form.errors.has('slug')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('slug')" />
                  </span>
                </div>
              </div>
            </div>
          </div>
  
          <div
            id="assigned-projects"
            class="card-header tab-pane fade"
            role="tabpanel"
            aria-labelledby="assigned-projects-tab"
          >
            <h5>Proyectos asignados</h5>
            <vue-tags-input
              v-model="projectTag"
              :add-only-from-autocomplete="true"
              :autocomplete-items="mapTags(allProjects)"
              :class="{ 'is-invalid': form.errors.has('roles') }"
              :tags="projectTags"
              @tags-changed="newTags => projectTags = newTags"
            />
          </div>
      
          <div class="card-footer text-right">
            <RouterLink
              :to="{ name: 'AdminBrokersIndex' }"
              class="btn btn-outline-primary mr-2"
            >
              <span class="fa fa-arrow-left pr-2" />Volver
            </RouterLink>
            <button
              :disabled="submitted"
              class="btn btn-primary"
              type="submit"
            >
              <span class="fa fa-check pr-2" />Guardar
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { projectsComputed, brokersComputed } from "../../store/helpers"
import { mapTags, previewDzThumbnailFromFile, slugify } from "@/utilities/helpers"
import store from "@/store"
import Form from "@/utilities/Form"
import VueTagsInput from "@johmun/vue-tags-input"

const token = JSON.parse(sessionStorage.getItem("auth.token") || localStorage.getItem("auth.token"))

export default {
    components: {
        VueTagsInput
    },

    props: {
        action: {
            type: String,
            required: true
        },

        method: {
            type: String,
            required: true
        }
    },

    data() {
        return {
            form: {},
            projectTag: "",
            projectTags: [],
            submitted: false
        }
    },

    computed: {
        ...projectsComputed,
        ...brokersComputed,

        validated() {
            return this.form.errors.any()
        }
    },

    created() {
        this.submitted = false
        this.form = new Form(this.oneBroker)
        this.projectTags = mapTags(this.oneBroker.projects)

        store.watch((state, getters) => state.brokers.one, (value)=> {
            this.form = new Form(value)
            this.projectTags = mapTags(this.oneBroker.projects)
        })
    },

    methods: {
        mapTags,
 
        submitForm() {
            this.submitted = true
            this.form.projects = this.projectTags

            this.form[this.method](this.action)
                .then(response => {
                    let id = response.data[0].id
                    this.$snotify.success("El registro nº " + id + " fue guardado correctamente.")
                    this.$router.push({ name: "AdminBrokersIndex" })

                    return this.submitted = false
                }).catch(error => {
                    if (error.status > 422) {
                        this.$snotify.error("Ocurrió un error con el siguiente mensaje: " + error.data.message)
                    }
                })
        },

        updateSlug(value) {
            return this.form.slug = slugify(value)
        }
    }
}
</script>

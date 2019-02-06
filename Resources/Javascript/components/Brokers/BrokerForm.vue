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

                <div class="row">
                  <div class="col-md-6 form-group">
                    <label for="password">
                      Contraseña
                    </label>
                    <input
                      v-model="form.password"
                      :class="{ 'is-invalid': form.errors.has('password') }"
                      class="form-control"
                      name="password"
                      placeholder="Contraseña"
                      type="password"
                    >
                    <span
                      v-if="form.errors.has('password')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="form.errors.get('password')" />
                    </span>
                  </div>
                  <div class="col-md-6 form-group">
                    <label for="password_confirmation">
                      Confirmación de contraseña
                    </label>
                    <input
                      v-model="form.password_confirmation"
                      :class="{ 'is-invalid': form.errors.has('password_confirmation') }"
                      class="form-control"
                      name="password_confirmation"
                      placeholder="Confirmación de contraseña"
                      type="password"
                    >
                    <span
                      v-if="form.errors.has('password_confirmation')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="form.errors.get('password_confirmation')" />
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
  
          <div
            id="assigned-projects"
            class="card-body tab-pane fade"
            role="tabpanel"
            aria-labelledby="assigned-projects-tab"
          >
            <h5>Proyectos asignados</h5>
            <quick-search
              ref="quickSearch"
              :items="allProjects"
            />

            <div v-if="$refs.quickSearch">
              <dynamic-table
                v-if="$refs.quickSearch.filteredItems.length > 0"
                :columns="columns"
                :items="$refs.quickSearch.filteredItems"
                :per-page="12"
                :sort-direction="'desc'"
                :sort-key="'updated_at'"
              >
                <th
                  slot="th"
                  class="th--acciones"
                >
                  Asignación
                </th>
                <td
                  slot="td"
                  slot-scope="item"
                >
                  <input
                    v-model="assignedProjects"
                    type="checkbox"
                    class="form-check-input"
                    :checked="isProjectAssigned(item.id)"
                    :value="item.id"
                  >
                  <label
                    class="form-check-label"
                    for="assignedProjects"
                  >
                    Asignado
                  </label>
                </td>
              </dynamic-table>
      
              <div v-if="$refs.quickSearch.filteredItems.length === 0">
                <div class="card-body">
                  <p class="mb-0">
                    No hay resultados para mostrar.
                  </p>
                </div>
              </div>
            </div>
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
import { intersection } from "lodash"
import { projectsComputed, brokersComputed } from "../../store/helpers"
import { previewDzThumbnailFromFile, slugify } from "@/utilities/helpers"
import Form from "@/utilities/Form"

const token = JSON.parse(sessionStorage.getItem("auth.token") || localStorage.getItem("auth.token"))

export default {
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
            assignedProjects: [],
            columns: {
                id: "Id.",
                name: "Nombre",
            },
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
        this.assignedProjects = this.oneBroker.projects.map(item => item.id)

        this.$store.watch((state, getters) => state.brokers.one, (value)=> {
            this.form = new Form(value)
            this.assignedProjects = value.projects.map(item => item.id)
        })
    },

    methods: {
        isProjectAssigned(projectId) {
            return this.allProjects[projectId] !== undefined
        },

        submitForm() {
            this.submitted = true

            var projects = []
            this.assignedProjects.forEach(item => projects.push({ id: item }))
            this.form.projects = projects

            this.form[this.method](this.action)
                .then(response => {
                    let id = response.data[0].id
                    this.$snotify.success("El registro nº " + id + " fue guardado correctamente.")
                    this.$router.push({ name: "AdminBrokersIndex" })

                    return this.submitted = false
                }).catch(error => {
                    if (error.status > 422) {
                        this.$snotify.error("Ocurrió un error con el siguiente mensaje: " + error.data.message)

                        return this.submitted = false
                    }
                })
        },

        updateSlug(value) {
            return this.form.slug = slugify(value)
        }
    }
}
</script>

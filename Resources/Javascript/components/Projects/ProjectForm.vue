<template>
  <form 
    :action="action"
    :class="[validated ? 'needs-validation' : 'needs-validation']"
    :method="method"
    novalidate
    @submit.prevent="submitForm"
    @keydown="form.errors.clear($event.target.name)"
  >
    <ul
      id="projectPills"
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
          id="description-tab"
          aria-controls="description"
          aria-selected="true"
          class="nav-link"
          data-toggle="tab"
          href="#description"
        >
          Descripción
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
          id="featured-photo-tab"
          aria-controls="featured-photo"
          aria-selected="false"
          class="nav-link"
          data-toggle="tab"
          href="#featured-photo"
        >
          Foto destacada
        </a>
      </li>
      <li class="nav-item">
        <a
          id="photos-gallery-tab"
          aria-controls="photos-gallery"
          aria-selected="false"
          class="nav-link"
          data-toggle="tab"
          href="#photos-gallery"
        >
          Galería de fotos
        </a>
      </li>
    </ul>

    <div class="card">
      <div
        id="project-pills-content"
        class="border-left border-right tab-content"
      >
        <div
          id="main"
          class="card-body tab-pane fade show active"
          role="tabpanel"
          aria-labelledby="main-tab"
        >
          <h5
            class="mb-2"
          >
            Principal
          </h5>
          <div class="form-group">
            <label for="name">
              Nombre *
            </label>
            <input
              v-model="form.name"
              :class="{ 'is-invalid': form.errors.has('name') }"
              class="form-control"
              name="name"
              placeholder="Nombre"
              required
              type="text"
              @keyup="form.slug = updateSlug($event.target.value)"
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
            <label for="slug">
              Identificador amistoso *
            </label>
            <input
              v-model="form.slug"
              v-slugify
              :class="{ 'is-invalid': form.errors.has('slug') }"
              class="form-control"
              name="slug"
              placeholder="Identificador amistoso"
              required
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
            <div class="col-md-4 form-group">
              <label for="city">
                Ciudad *
              </label>
              <input
                v-model="form.city"
                :class="{ 'is-invalid': form.errors.has('city') }"
                class="form-control"
                name="city"
                placeholder="Ciudad"
                required
                type="text"
              >
              <span
                v-if="form.errors.has('city')"
                class="invalid-feedback"
                role="alert"
              >
                <strong v-text="form.errors.get('city')" />
              </span>
            </div>

            <div class="col-md-4 form-group">
              <label for="state">
                Provincia
              </label>
              <input
                v-model="form.state"
                :class="{ 'is-invalid': form.errors.has('state') }"
                class="form-control"
                name="state"
                placeholder="Estado"
                type="text"
              >
              <span
                v-if="form.errors.has('state')"
                class="invalid-feedback"
                role="alert"
              >
                <strong v-text="form.errors.get('state')" />
              </span>
            </div>
  
            <div class="col-md-4 form-group">
              <label for="country">
                País
              </label>
              <input
                v-model="form.country"
                :class="{ 'is-invalid': form.errors.has('country') }"
                class="form-control"
                name="country"
                placeholder="País"
                type="text"
              >
              <span
                v-if="form.errors.has('country')"
                class="invalid-feedback"
                role="alert"
              >
                <strong v-text="form.errors.get('country')" />
              </span>
            </div>
          </div>

          <div class="form-group">
            <label for="total_area">
              Superficie total *
            </label>
            <input
              v-model="form.total_area"
              :class="{ 'is-invalid': form.errors.has('total_area') }"
              class="form-control"
              name="total_area"
              placeholder="Superficie total"
              required
              type="number"
            >
            <span
              v-if="form.errors.has('total_area')"
              class="invalid-feedback"
              role="alert"
            >
              <strong v-text="form.errors.get('total_area')" />
            </span>
          </div>
        </div>

        <div
          id="description"
          class="card-header tab-pane fade show"
          role="tabpanel"
          aria-labelledby="description-tab"
        >
          <h5 class="mb-2">
            Descripción
          </h5>
          <div class="form-group">
            <label
              class="sr-only"
              for="description"
            >
              Producto
            </label>
            <VueEditor
              v-model="form.description"
              :class="{ 'is-invalid': form.errors.has('description') }"
              class="form-control bg-white"
              name="description"
              placeholder="Descripción"
              style="height:auto;"
            />
            <span
              v-if="form.errors.has('description')"
              class="invalid-feedback"
              role="alert"
            >
              <strong v-text="form.errors.get('description')" />
            </span>
          </div>
        </div>

        <div
          id="place"
          class="card-header tab-pane fade show"
          role="tabpanel"
          aria-labelledby="place-tab"
        >
          <h5 class="mb-2">
            Lugar
          </h5>
          <div class="form-group">
            <label
              class="sr-only"
              for="place"
            >
              Lugar
            </label>
            <VueEditor
              v-model="form.place"
              :class="{ 'is-invalid': form.errors.has('place') }"
              class="bg-white form-control"
              name="place"
              placeholder="Lugar"
              style="height:auto;"
            />
            <span
              v-if="form.errors.has('place')"
              class="invalid-feedback"
              role="alert"
            >
              <strong v-text="form.errors.get('place')" />
            </span>
          </div>
        </div>

        <div
          id="investment"
          class="card-header tab-pane fade show"
          role="tabpanel"
          aria-labelledby="investment-tab"
        >
          <h5 class="mb-2">
            Inversión
          </h5>
          <div class="form-group">
            <label
              class="sr-only"
              for="investment"
            >
              Inversión
            </label>
            <VueEditor
              v-model="form.investment"
              :class="{ 'is-invalid': form.errors.has('investment') }"
              class="bg-white form-control"
              name="investment"
              placeholder="Inversión"
              style="height:auto;"
            />
            <span
              v-if="form.errors.has('investment')"
              class="invalid-feedback"
              role="alert"
            >
              <strong v-text="form.errors.get('investment')" />
            </span>
          </div>
        </div>

        <div
          id="resume"
          class="card-header tab-pane fade show"
          role="tabpanel"
          aria-labelledby="resume-tab"
        >
          <h5 class="mb-2">
            Detalle
          </h5>
          <div class="form-group">
            <label
              class="sr-only"
              for="resume"
            >
              Detalle
            </label>
            <VueEditor
              v-model="form.resume"
              :class="{ 'is-invalid': form.errors.has('resume') }"
              class="bg-white form-control"
              name="resume"
              placeholder="Detalle"
              style="height:auto;"
            />
            <span
              v-if="form.errors.has('resume')"
              class="invalid-feedback"
              role="alert"
            >
              <strong v-text="form.errors.get('resume')" />
            </span>
          </div>
        </div>

        <div
          id="entertainment"
          class="card-header tab-pane fade show"
          role="tabpanel"
          aria-labelledby="entertainment-tab"
        >
          <h5 class="mb-2">
            Entretenimiento
          </h5>
          <div class="form-group">
            <label
              class="sr-only"
              for="entertainment"
            >
              Entretenimiento
            </label>
            <VueEditor
              v-model="form.entertainment"
              :class="{ 'is-invalid': form.errors.has('entertainment') }"
              class="bg-white form-control"
              name="entertainment"
              placeholder="Entretenimiento"
              style="height:auto;"
            />
            <span
              v-if="form.errors.has('entertainment')"
              class="invalid-feedback"
              role="alert"
            >
              <strong v-text="form.errors.get('entertainment')" />
            </span>
          </div>
        </div>

        <div
          id="featured-photo"
          class="card-header tab-pane fade show"
          role="tabpanel"
          aria-labelledby="featured-photo-tab"
        >
          <h5 class="mb-2">
            Foto destacada
          </h5>
          <VueDropzone
            id="dzFeaturedPhoto"
            ref="dzFeaturedPhoto"
            :options="dzFeaturedPhotoOptions"
            @vdropzone-error="dzFeaturedPhotoFail"
            @vdropzone-files-added="dzFeaturedPhotoAddOrRemoveFiles"
            @vdropzone-removed-file="dzFeaturedPhotoRemoveFile"
            @vdropzone-processing="dzFeaturedPhotoSetUrl"
            @vdropzone-success-multiple="dzFeaturedPhotoSucceed"
          />
        </div>

        <div
          id="photos-gallery"
          class="card-header tab-pane fade show"
          role="tabpanel"
          aria-labelledby="photos-gallery-tab"
        >
          <h5 class="mb-2">
            Galería de fotos
          </h5>
          <VueDropzone
            id="dzUnfeaturedPhotos"
            ref="dzUnfeaturedPhotos"
            :options="dzUnfeaturedPhotosOptions"
            @vdropzone-error="dzUnfeaturedPhotosFail"
            @vdropzone-files-added="dzUnfeaturedPhotosAddOrRemoveFiles"
            @vdropzone-removed-file="dzUnfeaturedPhotosRemoveFile"
            @vdropzone-processing="dzUnfeaturedPhotosSetUrl"
            @vdropzone-success-multiple="dzUnfeaturedPhotosSucceed"
          />
        </div>
      </div> 

      <div class="card-footer text-right">
        <router-link 
          :to="{ name: 'AdminProjectsIndex' }" 
          class="btn btn-outline-primary mr-2"
        >
          <span class="fa fa-arrow-left pr-2" />Volver
        </router-link>
        <button
          :disabled="submitted"
          class="btn btn-primary"
          type="submit"
        >
          <span class="fa fa-check pr-2" />Guardar
        </button>
      </div>
    </div>
  </form>
</template>

<script>
import { VueEditor } from "vue2-editor"
import { getSavedState, mapDzMockFile, previewDzThumbnailFromFile } from "@/utilities/helpers"
import { projectsComputed } from "../../store/helpers"
import { photosMethods } from "@/store/helpers"
import { slugify } from "@/utilities/helpers"
import vue2Dropzone from "vue2-dropzone"
import Form from "@/utilities/Form"

const token = getSavedState("auth.token")
const csrfToken = document.head.querySelector("meta[name=\"csrf-token\"]").content

export default {

    name: "ProjectForm",

    components: {
        VueDropzone: vue2Dropzone,
        VueEditor
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
            center: {},
            dzFeaturedPhotoHasAcceptedFiles: false,
            dzFeaturedPhotoHasError: false,
            dzFeaturedPhotoOptions: {
                addRemoveLinks: true,
                autoProcessQueue: false,
                dictDefaultMessage: "<i class='fa fa-cloud-upload'></i><br/>Hacé click o arrastrá una foto hacía acá",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                    "Authorization": "Bearer " + token
                },
                maxFiles: 1,
                maxFilesize: 0.4,
                method: "put",
                paramName: "featured_photo",
                uploadMultiple: true,
                url: "/api/projects",
            },
            dzUnfeaturedPhotosHasAcceptedFiles: false,
            dzUnfeaturedPhotosHasError: false,
            dzUnfeaturedPhotosOptions: {
                addRemoveLinks: true,
                autoProcessQueue: false,
                dictDefaultMessage: "<i class='fa fa-cloud-upload'></i><br/>Hacé click o arrastrá una o más fotos hacía acá",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                    "Authorization": "Bearer " + token
                },
                maxFiles: 8,
                maxFilesize: 0.4,
                method: "put",
                parallelUploads: 8,
                paramName: "unfeatured_photos",
                uploadMultiple: true,
                url: "/api/projects",
            },
            form: {},
            marker: {},
            submitted: false,
            tab: "main",
            url: "/api/projects",
        }
    },

    computed: {
        ...projectsComputed,

        dzFeaturedPhoto() {
            return this.$refs.dzFeaturedPhoto
        },

        dzUnfeaturedPhotos() {
            return this.$refs.dzUnfeaturedPhotos
        },

        validated() {
            return this.form.errors.any()
        }
    },

    created() {
        this.form = new Form(this.oneProject),

        this.$store.watch(state => state.projects.one, (value)=> {
            this.form = new Form(value)

            this.dzFeaturedPhotoCancel()
            this.dzUnfeaturedPhotosCancel()

        })
    },

    methods: {
        ...photosMethods, 

        dzFeaturedPhotoAddOrRemoveFiles() {
            return this.dzFeaturedPhotoHasAcceptedFiles = this.dzFeaturedPhoto.getAcceptedFiles().length > 0
        },

        dzFeaturedPhotoCancel() {
            if (this.dzFeaturedPhoto.getQueuedFiles().length > 0) {
                this.dzFeaturedPhoto.removeAllFiles()
                return this.dzFeaturedPhotoMounted()
            }

            if (this.dzFeaturedPhoto.getAcceptedFiles().length === 0) {
                return this.dzFeaturedPhotoMounted()
            }

            return
        },

        dzFeaturedPhotoRemoveFile(file) {
            console.log(file)
            //if (file.id) {
            //this.deleteOnePhoto(file.id)
            //}

            this.dzFeaturedPhotoAddOrRemoveFiles()
        },

        dzFeaturedPhotoFail() {
            return this.dzFeaturedPhotoHasError = true
        },

        dzFeaturedPhotoMounted() {
            if (this.oneProject.featured_photo) {
                return previewDzThumbnailFromFile(this.dzFeaturedPhoto.dropzone, mapDzMockFile(this.oneProject.featured_photo))
            }
        },

        dzFeaturedPhotoProcessQueue() {
            if (this.dzFeaturedPhoto) {
                this.dzFeaturedPhotoHasError = false
                return Promise.resolve(this.dzFeaturedPhoto.processQueue())
            }
        },

        dzFeaturedPhotoSetUrl() {
            if (this.dzFeaturedPhoto) {
                return this.dzFeaturedPhoto.setOption("url", this.url)
            }
        },

        dzFeaturedPhotoSucceed(file, response) {
            return Promise.resolve([file, response])
        },

        dzUnfeaturedPhotosAddOrRemoveFiles() {
            return this.dzUnfeaturedPhotosHasAcceptedFiles = this.dzUnfeaturedPhotos.getAcceptedFiles().length > 0
        },

        dzUnfeaturedPhotosCancel() {
            if (this.dzUnfeaturedPhotos.getQueuedFiles().length > 0) {
                this.dzUnfeaturedPhotos.removeAllFiles()
                return this.dzUnfeaturedPhotosMounted()
            }

            if (this.dzUnfeaturedPhotos.getAcceptedFiles().length === 0) {
                return this.dzUnfeaturedPhotosMounted()
            }

            return
        },

        dzUnfeaturedPhotosFail() {
            return this.dzUnfeaturedPhotosHasError = true
        },

        dzUnfeaturedPhotosMounted() {
            var unfeaturedPhotos = this.oneProject.unfeatured_photos
            if (unfeaturedPhotos) {
                return unfeaturedPhotos.forEach(unfeaturedPhoto => {
                    return previewDzThumbnailFromFile(this.dzUnfeaturedPhotos.dropzone, mapDzMockFile(unfeaturedPhoto))
                })
            }
        },

        dzUnfeaturedPhotosProcessQueue() {
            if (this.dzUnfeaturedPhotos) {
                this.dzUnfeaturedPhotosHasError = false
                return Promise.resolve(this.dzUnfeaturedPhotos.processQueue())
            }
        },

        dzUnfeaturedPhotosRemoveFile(file) {
            console.log(file)
            //if (file.id) {
            //this.deleteOnePhoto(file.id)
            //}

            this.dzUnfeaturedPhotosAddOrRemoveFiles()
        },

        dzUnfeaturedPhotosSetUrl() {
            if (this.dzUnfeaturedPhotos) {
                return this.dzUnfeaturedPhotos.setOption("url", this.url)
            }
        },

        dzUnfeaturedPhotosSucceed(file, response) {
            return Promise.resolve([file, response])
        },

        submitForm() {
            this.submitted = true

            this.form.featured_photo = {}
            this.form.unfeatured_photos = []

            var id
            this.form[this.method](this.action)
                .then(response => {
                    id = response.data[0].id
                    this.url = "/api/projects/" + id
                    return this.dzFeaturedPhotoProcessQueue()
                })
                .then(() => {
                    return this.dzUnfeaturedPhotosProcessQueue()
                })
                .then(() => {
                    this.$snotify.success("El registro nº " + id + " fue guardado correctamente.")
                    this.$router.push({ name: "AdminProjectsIndex" })
                    return this.submitted = false
                }).catch(error => {
                    if (error.status > 422) {
                        this.$snotify.error("Ocurrió un error con el siguiente mensaje: " + error.data.message)
                    }

                    return this.submitted = false
                })
        },

        updateSlug(value) {
            return this.form.slug = slugify(value)
        }
    }
}
</script>

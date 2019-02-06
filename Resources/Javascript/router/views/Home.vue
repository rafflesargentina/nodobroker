<template>
  <div>
    <carousel :per-page="1">
      <slide>
        <div 
          class="site-blocks-cover overlay"
          data-aos="fade"
          style="background-image: url(/images/hero_bg_1.jpg);"
        >
          <div class="container">
            <div class="row align-items-center justify-content-center text-center text-white">
              <div class="col-md-10">
                <span class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded">
                  Ofertas
                </span>
                <h1 class="display-4 mb-4">
                  EL PRIMER PORTAL DE VENTAS ONLINE PARA PROYECTOS INMOBILIARIOS
                </h1>
                <p>
                  <a
                    href="#"
                    class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2"
                  >
                    Ver Más
                  </a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </slide>

      <slide>
        <div
          class="site-blocks-cover overlay"
          data-aos="fade"
          style="background-image: url(/images/hero_bg_2.jpg);"
        >
          <div class="container">
            <div class="row align-items-center justify-content-center text-center text-white">
              <div class="col-md-10">
                <span class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded">
                  Ofertas
                </span>
                <h1 class="display-4 mb-4">
                  EL PRIMER PORTAL DE COMERCIALIZACIÓN ONLINE
                </h1>
                <p>
                  <a
                    href="#"
                    class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2"
                  >
                    Ver Más
                  </a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </slide>
    </carousel>

    <div
      v-if="projectsFeatured.length > 0 && !isAuthenticated"
      class="site-section site-section-sm bg-light"
    >
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 text-center">
            <div class="site-section-title mb-5">
              <h2>Proyectos Destacados</h2>
            </div>
          </div>
        </div>
        <ProjectsListView
          :items="projectsFeatured"
        />
      </div>
    </div>

    <div class="site-section site-section-sm pb-0">
      <div class="container">
        <div class="row">
          <form
            class="form-search col-md-12"
            style="margin-top: -100px;"
            @submit.prevent="filterViews"
          >
            <div class="row  align-items-end">
              <div class="col-md-3">
                <label for="project_type_id">
                  Tipo de Inmueble
                </label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down" />
                  <select
                    id="project_type_id"
                    v-model="project_type_id"
                    name="project_type_id"
                    class="form-control d-block rounded-0"
                  >
                    <option
                      selected
                      value="0"
                    >
                      Tipo de Inmueble
                    </option>
                    <option
                      v-for="tag in projectTypesMappedTags"
                      :key="tag.id"
                      :value="tag.id"
                    >
                      {{ tag.text }}
                    </option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <label for="offer_type_id">
                  Tipo de Oferta
                </label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down" />
                  <select
                    id="offer_type_id"
                    v-model="offer_type_id"
                    name="offer_type_id"
                    class="form-control d-block rounded-0"
                  >
                    <option
                      selected
                      value="0"
                    >
                      Tipo de Oferta
                    </option>
                    <option
                      v-for="tag in offerTypesMappedTags"
                      :key="tag.id"
                      :value="tag.id"
                    >
                      {{ tag.text }}
                    </option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <label for="city">
                  Ciudad
                </label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down" />
                  <select
                    id="city"
                    v-model="city"
                    name="city"
                    class="form-control d-block rounded-0"
                  >
                    <option
                      selected
                      value="0"
                    >
                      Ciudad
                    </option>
                    <option
                      v-for="tag in projectsMappedCityTags"
                      :key="tag.id"
                      :value="tag.id"
                    >
                      {{ tag.text }}
                    </option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <input
                  type="submit"
                  class="btn btn-success text-white btn-block rounded-0"
                  value="Buscar"
                >
              </div>
            </div>
          </form>
        </div>  

        <div class="row">
          <div class="col-md-12">
            <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
              <div class="ml-auto d-flex align-items-center">
                <div>
                  <a
                    :class="{ active: view === 'all' }"
                    class="view-list px-3 border-right"
                    @click="resetViewFilters(), updateViews('all')"
                  >
                    Todos 
                  </a>
                  <a
                    :class="{ active: view === 'featured' }"
                    class="view-list px-3 border-right"
                    @click="resetViewFilters(), updateViews('featured')"
                  >
                    Destacados
                  </a>
                  <a
                    :class="{ active: view === 'unfeatured' }"
                    class="view-list px-3"
                    @click="resetViewFilters(), updateViews('unfeatured')"
                  >
                    No destacados
                  </a>
                </div>

                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down" />
                  <select
                    class="form-control form-control-sm d-block rounded-0"
                    @change="sortViews($event.target.value)"
                  >
                    <option value="0">
                      Orden
                    </option>
                    <option value="price_desc">
                      Mayor precio
                    </option>
                    <option value="price_asc">
                      Menor precio
                    </option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm bg-light">
      <div class="container">
        <ProjectsModuleView
          :items="items || allProjects"
        />
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 text-center">
            <div class="site-section-title mb-5">
              <h2>¿Por qué elegirnos?</h2>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div
              class="service text-center"
            >
              <span class="icon flaticon-house" />
              <h2 class="service-heading">
                Lugares recomendados
              </h2>
              <p>Cada uno de los lugares presentados fue elegido por varias razones. La principal, esta en el entorno adecuado para valorar tu inversion.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div
              class="service text-center"
            >
              <span class="icon flaticon-sold" />
              <h2 class="service-heading">
                Mejores precios
              </h2>
              <p>Te acercamos las mejores promociones para que puedas comprar tu lote con la financiación directa para lograr tus sueños.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div
              class="service text-center"
            >
              <span class="icon flaticon-camera" />
              <h2 class="service-heading">
                Meeting poing
              </h2>
              <p>Toda la documentación estará a tu alcance de manera segura, con acceso directo al desarrollista una vez que confirmes interés por comprar.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { sortBy } from "lodash"
import { offerTypesComputed, offerTypesMethods, projectsComputed, projectTypesComputed, projectsMethods, projectTypesMethods } from "../../store/helpers"
import { authComputed } from "@/store/helpers"

export default {
    data() {
        return {
            alreadyCreated: false,
            city: 0,
            items: [],
            offer_type_id: 0,
            project_type_id: 0,
            view: "all",
        }
    },

    computed: {
        ...offerTypesComputed,
        ...projectsComputed,
        ...projectTypesComputed,
        ...authComputed,
    },

    watch: {
        "$route" (value) {
            if (value.name === "Home" && this.alreadyCreated === true) {
                return this.prepare()
            }
        }
    },

    created() {
        return this.prepare().then(() => this.alreadyCreated = true)
    },

    methods: {
        ...offerTypesMethods,
        ...projectsMethods,
        ...projectTypesMethods,

        filterViews() {
            var city = this.city,
                offerTypeId = this.offer_type_id,
                projectTypeId = this.project_type_id

            function filterByCity(item) {
                if (city != 0) return item.city == city
                return true
            } 

            function filterByOfferType(item) {
                if (offerTypeId != 0) return item.offer_types.filter(i => i.id === offerTypeId).length > 0
                return true
            }

            function filterByProjectType(item) {
                if (projectTypeId != 0) return item.project_type_id == projectTypeId
                return true
            }

            this.updateViews(this.view)

            return this.items = this.items
                .filter(item => filterByCity(item))
                .filter(item => filterByOfferType(item))
                .filter(item => filterByProjectType(item))
        },

        prepare() {
            var allProjects = this.fetchAllProjects()
            var allProjectTypes = this.fetchAllProjectTypes()
            var allOfferTypes = this.fetchAllOfferTypes()

            return Promise.all([allProjects, allProjectTypes, allOfferTypes])
                .then(values => this.items = values[0], this.prepared = true)
        },

        resetViewFilters() {
            return this.city = 0,
            this.offer_type_id = 0,
            this.project_type_id = 0
        },

        sortViews(key) {
            switch (key) {
            case "price_asc":
                this.items = sortBy(this.items, item => item.base_price)
                break
            case "price_desc":
                this.items = sortBy(this.items, item => item.base_price).reverse()
                break
            }
        },

        updateViews(view) {
            switch(view) {
            case "all":
                this.view = "all"
                this.items = this.allProjects
                break
            case "featured":
                this.view = "featured"
                this.items = this.projectsFeatured
                break
            case "unfeatured":
                this.view = "unfeatured"
                this.items = this.projectsNonFeatured
                break
            }
        }
    },
}
</script>

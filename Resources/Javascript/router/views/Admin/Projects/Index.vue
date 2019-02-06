<template>
  <div>
    <h4 class="mb-3">
      Proyectos
    </h4>

    <div class="card">
      <div class="card-header bg-white">
        <div class="row">
          <div class="col-md-5">
            <quick-search
              ref="quickSearch"
              :items="allProjects"
            />
          </div>
          <div class="col-md-3 offset-md-4">
            <router-link
              class="btn btn-block btn-primary text-white"
              :to="{ name: 'AdminProjectsCreate' }"
            >
              <span class="fa fa-plus pr-2" />Nuevo Proyecto
            </router-link>
          </div>
        </div>
      </div>
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
            Acciones
          </th>
          <td 
            slot="td" 
            slot-scope="item"
          >
            <router-link 
              :to="{ name: 'AdminProjectsEdit', params: { id: item.id } }" 
              class="mr-2"
            >
              <span class="fa fa-pencil pr-1" />Editar
            </router-link>
            <a 
              href="#" 
              @click="destroyRecordConfirmation('/api/projects/' + item.id, item.id)"
            >
              <span class="fa fa-trash pr-1" />Borrar
            </a>
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
  </div>
</template>

<script>
import { projectsComputed, projectsMethods } from "../../../../store/helpers"

export default {
    data() {
        return {
            alreadyCreated: false,
            columns: {
                id: "Id.",
                name: "Nombre",
                location: "Ubicación",
                created_at: "Creación",
                updated_at: "Actualización"
            }
        }
    },

    computed: {
        ...projectsComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "AdminProjectsIndex" && this.alreadyCreated === true) {
                return this.prepare(),
                this.$refs.quickSearch.search = ""
            }
        }
    },

    created() {
        return this.prepare().then(() => this.alreadyCreated = true)
    },

    methods: {
        ...projectsMethods,

        prepare() {
            return this.$store.dispatch("projects/fetchAllProjects")
        }
    }
}
</script>

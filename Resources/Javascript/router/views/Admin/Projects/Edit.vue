<template>
  <div>
    <h4 class="mb-3">
      Editar Inversión: {{ shortenTitle(oneProject.name) }}
    </h4>
    <ProjectForm
      :action="'/api/projects/' + $route.params.id"
      :method="'put'"
    />
  </div>
</template>

<script>
import { projectsComputed } from "../../../../store/helpers"
import { strLimit } from "@/utilities/helpers"

export default {
    data() {
        return {
            prepared: false,
        }
    },

    computed: {
        ...projectsComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "AdminProjectsEdit") {
                return this.prepare()
            }
        }
    },

    created() {
        return this.prepare()
    },

    methods: {
        shortenTitle(value) {
            return strLimit(value)
        },

        prepare() {
            return this.$store.dispatch("projects/fetchOneProject", this.$route.params.id).then(() => this.prepared = true)
        }
    },
}
</script>

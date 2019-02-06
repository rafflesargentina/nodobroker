<template>
  <div>
    <h4 class="mb-3">
      Editar Inversión: {{ strLimit(oneProject.name) }}
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
            alreadyCreated: false,
        }
    },

    computed: {
        ...projectsComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "AdminProjectsEdit" && this.alreadyCreated === true) {
                return this.prepare()
            }
        }
    },

    created() {
        return this.prepare().then(() => this.alreadyCreated = true)
    },

    methods: {
        prepare() {
            return this.$store.dispatch("projects/fetchOneProject", this.$route.params.id)
        },

        strLimit,
    },
}
</script>

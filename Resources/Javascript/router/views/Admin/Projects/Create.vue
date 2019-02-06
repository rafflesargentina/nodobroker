<template>
  <div>
    <h4 class="mb-3">
      Nuevo Proyecto
    </h4>
    <ProjectForm
      :action="'/api/projects'"
      :method="'post'"
    />
  </div>
</template>

<script>
export default {
    data() {
        return {
            alreadyCreated: false,
        }
    },

    watch: {
        "$router" (value) {
            if (value.name === "AdminProjectsCreate" && this.alreadyCreated === true) {
                return this.prepare()
            }
        }
    },
    created() {
        return this.prepare().then(() => this.alreadyCreated = true)
    },

    methods: {
        prepare() {
            return this.$store.dispatch("projects/reset")
        }
    }
}
</script>

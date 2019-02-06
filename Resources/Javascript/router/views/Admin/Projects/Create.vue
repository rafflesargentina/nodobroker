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

export default {
    created() {
        return this.$store.dispatch("projects/reset")
    },

    watch: {
        "$router" (value) {
            if (value.name === "ProjectsCreate") {
                this.$store.dispatch("projects/reset")
            }
        }
    }
}

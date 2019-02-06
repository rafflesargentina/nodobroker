<template>
  <div>
    <h4 class="mb-3">
      Nuevo Broker
    </h4>
    <BrokerForm 
      :method="'post'" 
      :action="'/api/brokers'"
    />
  </div>
</template>

<script>
export default {
    created() {
        return this.$store.dispatch("brokers/reset")
    }
}
</script>

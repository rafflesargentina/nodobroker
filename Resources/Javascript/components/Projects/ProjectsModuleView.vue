<template>
  <div
    v-if="items.length > 0"
    class="row mb-5"
  >
    <div
      v-for="item in items"
      :key="item.id"
      class="col-md-6 col-lg-4 mb-4"
    >
      <div class="property-entry h-100">
        <a
          href="#"
          class="property-thumbnail"
        >
          <div
            v-if="item.offer_types.length > 0"
            class="offer-type-wrap"
          >
            <span
              v-for="offerType in item.offer_types"
              :key="offerType.id"
              :class="offerType.color"
              class="offer-type"
            >
              {{ offerType.name }}
            </span>
          </div>
          <img
            v-if="item.featured_photo"
            :src="item.featured_photo.url"
            alt="Image"
            class="img-fluid"
          >
        </a>
        <div class="p-4 property-body">
          <a
            href="#"
            class="property-favorite"
          >
            <span class="icon-heart-o" />
          </a>
          <h2 class="property-title">
            <router-link :to="{ name: 'ProjectsShow', params: { id: item.id }}">
              {{ item.name }}
            </router-link>
          </h2>
          <span class="property-location d-block mb-3">
            <span class="property-icon icon-room" /> {{ item.location }}
          </span>
          <strong class="property-price text-primary mb-3 d-block text-success">
            {{ item.base_price }}
          </strong>
          <ul class="property-specs-wrap mb-3 mb-lg-0">
            <li>
              <span class="property-specs">
                Sup. total 
              </span>
              <span class="property-specs-number">
                {{ item.total_area }}<sup>mt2</sup>
              </span>
            </li>
            <li v-if="item.water === '1'">
              <span class="property-specs">
                Agua
              </span>
              <span class="property-specs-number">
                <span class="icon-check" />
              </span>
            </li>
            <li v-if="item.gas === '1'">
              <span class="property-specs">
                Gas
              </span>
              <span class="property-specs-number">
                <span class="icon-check" />
              </span>
            </li>
            <li v-if="item.light === '1'">
              <span class="property-specs">
                Luz
              </span>
              <span class="property-specs-number">
                <span class="icon-check" />
              </span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name: "ProjectsModuleView",

    props: {
        items: {
            default: ()=> [],
            required: true,
            type: Array
        }
    }
}
</script>

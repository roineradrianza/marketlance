<template>
  <div class="card text-center shadow-2xl">
    <figure class="px-10 pt-10">
      <img :src="gig.featured_image" class="rounded-xl" />
    </figure>
    <div class="card-body">
      <h2 class="card-title">{{ gig.title }}</h2>

      <div class="justify-center card-actions">
        <Link
          class="btn btn-outline btn-white"
          :href="route('username.gig.show', [gig.user.username, gig.slug])"
        >
          ${{ parseFloat(gig.packages[0].price).toFixed(2) }}
        </Link>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import { StarIcon } from "@heroicons/vue/solid";

export default defineComponent({
  components: {
    Link,
    StarIcon,
  },

  props: {
    gig: Object,
  },
});
</script>

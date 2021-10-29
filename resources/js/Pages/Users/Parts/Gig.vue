<template>
<Link :href="route('username.gig.show', [gig.user.username, gig.slug])">
  <div class="card shadow-lg">
    <figure>
      <img :src="gig.featured_image" />
    </figure>
    <div class="p-3">
      <div class="card-title">{{ gig.title }}</div>
    </div>
  </div>
</Link>
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
<template>
  <div class="card border p-2">
      <div class="card-title">title</div>
      <p class="uppercase text-sm mb-4">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate
        voluptates veniam saepe. Distinctio dicta tempora, assumenda culpa ipsam
        magni hic perspiciatis molestiae, esse natus cumque accusantium, dolorem
        dignissimos dolor eaque.
      </p>
      <div class="justify-center card-actions">
        <button class="btn btn-outline text-md">Continue</button>
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
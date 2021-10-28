<template>
  <div class="flex flex-wrap">
    <div class="w-full">
      <h4 class="card-title">Description</h4>
      <p>
        {{ meta.bio }}
      </p>
      <div class="divider"></div>

      <h4 class="card-title">Languages</h4>
      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque
        laboriosam ex at et laborum eaque velit similique amet? Eius cupiditate
        qui nobis aut quas voluptates, expedita beatae corrupti voluptatem eum!
      </p>
      <div class="divider"></div>

      <h4 class="card-title">Skills</h4>
      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque
        laboriosam ex at et laborum eaque velit similique amet? Eius cupiditate
        qui nobis aut quas voluptates, expedita beatae corrupti voluptatem eum!
      </p>
      <div class="divider"></div>

      <h4 class="card-title">Education</h4>
      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque
        laboriosam ex at et laborum eaque velit similique amet? Eius cupiditate
        qui nobis aut quas voluptates, expedita beatae corrupti voluptatem eum!
      </p>
      <div class="divider"></div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import { ClockIcon, RefreshIcon } from "@heroicons/vue/solid";

export default defineComponent({
  components: {
    ClockIcon,
    RefreshIcon,
  },
  props: {
    user: Object,
  },
  data() {
    return {
      meta: {},
    };
  },
  created() {
    this.user.metas.forEach(e => {
      this.meta[e.meta_name] = e.meta_val
    });
  },
});
</script>

<template>
  <div class="flex flex-wrap">
    <div class="w-full">
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

});
</script>

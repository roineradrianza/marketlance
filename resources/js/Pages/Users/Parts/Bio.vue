<template>
  <div class="flex flex-wrap">
    <div class="w-full">
      <h4 class="card-title">Description</h4>
      <p>
        {{ meta.bio }}
      </p>
      <div class="divider"></div>

      <h4 class="card-title">Languages</h4>
      <p v-for="language, i in user.languages" :key="i">
        {{ language.name }} - {{ language.level }}
      </p>
      <div class="divider"></div>

      <h4 class="card-title">Skills</h4>
      <button class="btn btn-sm btn-outline no-animation mr-2 mt-3" v-for="skill, i in user.skills" :key="i">
        {{ skill.name }}
      </button> 
      <div class="divider"></div>

      <h4 class="card-title">Education</h4>
      <div class="card bg-base-100 shadow-lg mb-3" v-for="education, i in user.educations" :key="i">
        <div class="card-body">
          <p class="text-lg">{{ education.title }} - {{ education.title_name }}</p>
          <p>
            {{ education.university }}, {{ education.country }}, {{ education.graduation }}
          </p>
        </div>
      </div>
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
